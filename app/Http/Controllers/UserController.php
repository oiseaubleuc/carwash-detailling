<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Toon alle gebruikers
    public function index()
    {
        $users = User::all();
        return view('admin.users.dashboard', compact('users'));
    }

    // Toon het formulier voor het aanmaken van een nieuwe gebruiker
    public function create()
    {
        return view('admin.users.create');
    }

    // Sla een nieuwe gebruiker op
    public function store(Request $request)
    {
        // Validatie van de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Maak de gebruiker aan
        User::create([
            'name' => $request->name, // Gebruik de naam van de gebruiker
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Optioneel
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt!');
    }

    // Toon het formulier om een gebruiker te bewerken
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Werk een bestaande gebruiker bij
    public function update(Request $request, $id)
    {
        // Validatie van de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Wachtwoord is optioneel bij bijwerken
        ]);

        // Vind de gebruiker
        $user = User::findOrFail($id);

        // Werk de gebruiker bij
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->is_admin = $request->is_admin ?? $user->is_admin; // Optioneel
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt!');
    }

    // Verwijder een gebruiker
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd!');
    }

    // Toon het inlogformulier
    public function login()
    {
        return view('auth.login'); // Zorg ervoor dat je een login view hebt
    }

    // Authenticeer de gebruiker
    public function authenticate(Request $request)
    {
        // Valideer de inloggegevens
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Probeer in te loggen
        if (Auth::attempt($request->only('email', 'password'))) {
            // Als inloggen lukt, redirect naar de dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Je bent ingelogd!');
        }

        // Als de gebruiker niet bestaat, maak een nieuwe gebruiker aan
        $user = User::create([
            'name' => 'Nieuwe Gebruiker', // Standaardnaam; je kunt dit ook aanpassen
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Standaard is_admin op false
        ]);

        // Log de nieuwe gebruiker in
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Je bent aangemeld en een nieuwe account is aangemaakt!');
    }

    // Logout de gebruiker
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Je bent uitgelogd!');
    }
    // Voeg deze methode toe aan je UserController
    public function dashboard()
    {
        $userCount = User::count(); // Telt het aantal gebruikers
        $bookingCount = Booking::count(); // Telt het aantal boekingen (vervang met je daadwerkelijke model)
        $serviceCount = Service::count(); // Telt het aantal diensten (vervang met je daadwerkelijke model)

        return view('admin.dashboard', compact('userCount', 'bookingCount', 'serviceCount'));
    }

}
