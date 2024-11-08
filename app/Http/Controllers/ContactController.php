<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; // Als je mail wilt gebruiken, voeg de Mail facades toe
use App\Mail\ContactForm;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        return redirect()->route('home')->with('success', 'Bericht verzonden!');
    }
}
