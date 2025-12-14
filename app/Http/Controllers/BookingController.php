<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function showBookingForm(Request $request)
    {
        $services = Service::all();
        $selectedServiceId = $request->get('service_id');
        return view('book', compact('services', 'selectedServiceId'));
    }

    /**
     * Fetch available time slots for a given date
     */
    public function getAvailableTimeSlots(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
        ]);

        $date = Carbon::parse($request->date)->format('Y-m-d');
        
        // Get or create time slots for this date
        $timeSlots = TimeSlot::where('date', $date)->get();
        
        // If no slots exist, create default ones
        if ($timeSlots->isEmpty()) {
            $times = ['16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
            foreach ($times as $time) {
                TimeSlot::create([
                    'date' => $date,
                    'time' => $time,
                    'is_available' => true,
                    'max_bookings' => 1,
                ]);
            }
            $timeSlots = TimeSlot::where('date', $date)->get();
        }

        // Get bookings count for each slot
        $availableSlots = [];
        foreach ($timeSlots as $slot) {
            $bookingsCount = Booking::whereDate('booking_time', $date)
                ->where('time_slot', $slot->time)
                ->count();
            
            $isAvailable = $slot->is_available && ($bookingsCount < $slot->max_bookings);
            
            $availableSlots[] = [
                'time' => $slot->time,
                'available' => $isAvailable,
                'bookings_count' => $bookingsCount,
                'max_bookings' => $slot->max_bookings,
            ];
        }

        return response()->json($availableSlots);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'service' => 'required|exists:services,id',
            'date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|in:16:00,17:00,18:00,19:00,20:00,21:00',
        ]);

        // Check if time slot is available
        $date = Carbon::parse($request->date);
        $timeSlot = \App\Models\TimeSlot::where('date', $date->format('Y-m-d'))
            ->where('time', $request->time_slot)
            ->first();

        if (!$timeSlot || !$timeSlot->is_available) {
            return redirect()->back()->withErrors(['time_slot' => 'Dit tijd slot is niet beschikbaar.'])->withInput();
        }

        // Check if max bookings reached
        $bookingsCount = Booking::whereDate('booking_time', $date->format('Y-m-d'))
            ->where('time_slot', $request->time_slot)
            ->count();

        if ($bookingsCount >= $timeSlot->max_bookings) {
            return redirect()->back()->withErrors(['time_slot' => 'Dit tijd slot is vol.'])->withInput();
        }

        // Create booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service,
            'booking_time' => $date->setTimeFromTimeString($request->time_slot),
            'time_slot' => $request->time_slot,
            'customer_name' => $request->firstname,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
        ]);

        // Send confirmation email
        $details = [
            'name' => $request->firstname,
            'date' => $date->format('d-m-Y'),
            'time' => $request->time_slot,
            'service' => $booking->service->name ?? 'N/A',
        ];

        Mail::to($request->email)->send(new BookingConfirmation($details));

        return redirect()->route('home')->with('success', 'Bedankt voor uw reservering, u krijgt via mail uw bevestiging.');
    }

    // Admin CRUD methods
    public function index()
    {
        $bookings = Booking::with(['service', 'user'])
            ->orderBy('booking_time', 'desc')
            ->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.bookings.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'booking_time' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|in:16:00,17:00,18:00,19:00,20:00,21:00',
        ]);

        // Check time slot availability
        $date = Carbon::parse($request->booking_time);
        $timeSlot = TimeSlot::where('date', $date->format('Y-m-d'))
            ->where('time', $request->time_slot)
            ->first();

        if (!$timeSlot || !$timeSlot->is_available) {
            return redirect()->back()
                ->withErrors(['time_slot' => 'Dit tijd slot is niet beschikbaar.'])
                ->withInput();
        }

        // Check if max bookings reached
        $bookingsCount = Booking::whereDate('booking_time', $date->format('Y-m-d'))
            ->where('time_slot', $request->time_slot)
            ->count();

        if ($bookingsCount >= $timeSlot->max_bookings) {
            return redirect()->back()
                ->withErrors(['time_slot' => 'Dit tijd slot is vol.'])
                ->withInput();
        }

        Booking::create([
            'user_id' => auth()->id() ?? null,
            'service_id' => $request->service_id,
            'booking_time' => $date->setTimeFromTimeString($request->time_slot),
            'time_slot' => $request->time_slot,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Boeking aangemaakt!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $services = Service::all();
        return view('admin.bookings.edit', compact('booking', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'booking_time' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|in:16:00,17:00,18:00,19:00,20:00,21:00',
        ]);

        $booking = Booking::findOrFail($id);
        $date = Carbon::parse($request->booking_time);

        // Check time slot availability (only if time slot changed)
        if ($booking->time_slot !== $request->time_slot || $booking->booking_time->format('Y-m-d') !== $date->format('Y-m-d')) {
            $timeSlot = TimeSlot::where('date', $date->format('Y-m-d'))
                ->where('time', $request->time_slot)
                ->first();

            if (!$timeSlot || !$timeSlot->is_available) {
                return redirect()->back()
                    ->withErrors(['time_slot' => 'Dit tijd slot is niet beschikbaar.'])
                    ->withInput();
            }

            // Check if max bookings reached (exclude current booking)
            $bookingsCount = Booking::whereDate('booking_time', $date->format('Y-m-d'))
                ->where('time_slot', $request->time_slot)
                ->where('id', '!=', $id)
                ->count();

            if ($bookingsCount >= $timeSlot->max_bookings) {
                return redirect()->back()
                    ->withErrors(['time_slot' => 'Dit tijd slot is vol.'])
                    ->withInput();
            }
        }

        $booking->update([
            'service_id' => $request->service_id,
            'booking_time' => $date->setTimeFromTimeString($request->time_slot),
            'time_slot' => $request->time_slot,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Boeking bijgewerkt!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Boeking verwijderd!');
    }

    public function showCalendar()
    {
        return view('calendar');
    }

    public function fetchEvents()
    {
        $events = \App\Models\Event::all();
        return response()->json($events);
    }

    public function storeEvent(Request $request)
    {
        $event = \App\Models\Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        Mail::to($request->email)->send(new BookingConfirmation($request->title));

        return response()->json($event);
    }
}
