<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class MailController extends Controller
{
    public function sendBookingConfirmation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
        ]);

        Mail::to($request->email)->send(new BookingConfirmation($request->name));

        return response()->json(['message' => 'Bevestigingsmail verzonden!'], 200);
    }
}
