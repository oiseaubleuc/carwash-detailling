<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        return view('book');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'service' => 'required|string',
        ]);

        $details = [
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'services' => $request->input('service'),
        ];

        Mail::to($request->email)->send(new BookingConfirmation($details));

        return redirect()->route('home')->with('success', 'Bedankt voor uw reservering, u krijgt via mail uw bevestiging.');
    }


    public function showCalendar()
    {
        return view('calendar');
    }

    public function fetchEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function storeEvent(Request $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        Mail::to($request->email)->send(new BookingConfirmation($request->title));

        return response()->json($event);
    }


}
