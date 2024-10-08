<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; // Als je mail wilt gebruiken, voeg de Mail facades toe
use App\Mail\ContactForm; // Zorg ervoor dat je de mail class hebt gemaakt

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Valideer de gegevens
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Verzend het contactformulier via mail (optioneel)
        // Mail::to('admin@example.com')->send(new ContactForm($request->all()));

        return redirect()->route('home')->with('success', 'Bericht verzonden!');
    }
}
