<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function showBookingForm()
    {
        return view('book'); // Zorg ervoor dat dit overeenkomt met de naam van je view
    }
    public function submit(Request $request)
    {
        // Hier verwerk je de boeking (bijvoorbeeld opslaan in de database)

        // Redirect naar de homepagina met een sessiebericht
        return redirect()->route('home')->with('success', 'Bedankt voor uw reservering, u krijgt via mail uw bevestiging.');
    }
}
