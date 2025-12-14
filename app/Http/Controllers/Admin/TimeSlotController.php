<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->get('date', Carbon::today()->format('Y-m-d'));
        $selectedDate = Carbon::parse($date);
        
        // Get all time slots for the selected date
        $timeSlots = TimeSlot::where('date', $selectedDate->format('Y-m-d'))
            ->orderBy('time')
            ->get();
        
        // If no slots exist for this date, create default slots (16:00-21:00)
        if ($timeSlots->isEmpty()) {
            $this->createDefaultSlots($selectedDate);
            $timeSlots = TimeSlot::where('date', $selectedDate->format('Y-m-d'))
                ->orderBy('time')
                ->get();
        }
        
        // Get bookings count for each slot
        foreach ($timeSlots as $slot) {
            $slot->bookings_count = Booking::whereDate('booking_time', $selectedDate->format('Y-m-d'))
                ->where('time_slot', $slot->time)
                ->count();
        }
        
        return view('admin.time-slots.index', compact('timeSlots', 'selectedDate'));
    }

    /**
     * Create default time slots for a date (16:00-21:00)
     */
    private function createDefaultSlots(Carbon $date)
    {
        $times = ['16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
        
        foreach ($times as $time) {
            TimeSlot::firstOrCreate(
                [
                    'date' => $date->format('Y-m-d'),
                    'time' => $time,
                ],
                [
                    'is_available' => true,
                    'max_bookings' => 1,
                ]
            );
        }
    }

    /**
     * Update time slot availability
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'is_available' => 'sometimes|boolean',
            'max_bookings' => 'sometimes|integer|min:1',
        ]);

        $timeSlot = TimeSlot::findOrFail($id);
        $timeSlot->update($request->only(['is_available', 'max_bookings']));

        return redirect()->back()->with('success', 'Tijd slot bijgewerkt!');
    }

    /**
     * Bulk update time slots for a date
     */
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'slots' => 'required|array',
        ]);

        $date = Carbon::parse($request->date)->format('Y-m-d');
        
        foreach ($request->slots as $time => $data) {
            TimeSlot::updateOrCreate(
                [
                    'date' => $date,
                    'time' => $time,
                ],
                [
                    'is_available' => isset($data['is_available']) ? 1 : 0,
                    'max_bookings' => $data['max_bookings'] ?? 1,
                ]
            );
        }

        return redirect()->back()->with('success', 'Tijd slots bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $timeSlot = TimeSlot::findOrFail($id);
        $timeSlot->delete();

        return redirect()->back()->with('success', 'Tijd slot verwijderd!');
    }
}
