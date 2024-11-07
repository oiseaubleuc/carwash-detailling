<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation; // Zorg ervoor dat deze Mailable bestaat

class BookingController extends Controller
{
    public function showBookingForm()
    {
        return view('book'); // Zorg ervoor dat dit overeenkomt met de naam van je view
    }

    public function submit(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'service' => 'required|string',
            // Voeg hier meer validaties toe als nodig
        ]);

        // Verzamel de details voor de bevestigingsmail
        $details = [
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'services' => $request->input('service'),
        ];

        // Stuur de bevestigingsmail
        Mail::to($request->email)->send(new BookingConfirmation($details));

        // Redirect naar de homepagina met een sessiebericht
        return redirect()->route('home')->with('success', 'Bedankt voor uw reservering, u krijgt via mail uw bevestiging.');
    }


}
