<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation; // Zorg ervoor dat je deze Mailable hebt gemaakt

class MailController extends Controller
{
    public function sendBookingConfirmation(Request $request)
    {
        // Valideer de aanvraag
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            // Voeg andere validatieregels toe indien nodig
        ]);

        // Verzend de bevestigingsmail
        Mail::to($request->email)->send(new BookingConfirmation($request->name));

        return response()->json(['message' => 'Bevestigingsmail verzonden!'], 200);
    }
}
