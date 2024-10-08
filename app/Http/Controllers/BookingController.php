<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;

class BookingController extends Controller
{
    // Methode om de diensten te tonen
    public function index()
    {
        // Haal alle diensten op
        $services = Service::all();

        // Geef de diensten door aan de view
        return view('services', compact('services'));
    }

    // Methode om een boekingsformulier weer te geven
    public function create($service_id)
    {
        // Zoek de specifieke dienst op
        $service = Service::findOrFail($service_id);

        // Geef de dienst door aan de boekingsview
        return view('bookings.book', compact('service'));
    }

    // Methode om de boeking op te slaan
    public function store(Request $request)
    {
        // Valideer de gegevens
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'remarks' => 'nullable|string',
        ]);

        // Maak een nieuwe boeking aan
        $booking = Booking::create([
            'service_id' => $request->service_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'date' => $request->date,
            'time' => $request->time,
            'remarks' => $request->remarks,
        ]);

        // Redirect naar de bevestigingspagina met de booking ID
        return redirect()->route('confirmation', ['id' => $booking->id]);
    }

    // Methode om de bevestiging van de boeking weer te geven
    public function confirmation($id)
    {
        // Zoek de boeking op met de opgegeven ID
        $booking = Booking::findOrFail($id);
        $service = Service::findOrFail($booking->service_id);

        // Geef de boeking en de dienst door aan de bevestigingsview
        return view('bookings.confirmation', compact('booking', 'service'));
    }
}
