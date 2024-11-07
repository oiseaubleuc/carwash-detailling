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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard')->with('success', 'Je bent ingelogd!');
        }

        return redirect()->back()->with('error', 'Ongeldige inloggegevens.');
    }

    // Logout de gebruiker
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Je bent uitgelogd!');
    }

    // Dashboard
    public function dashboard()
    {
        $userCount = User::count();
        $bookingCount = Booking::count();
        $serviceCount = Service::count();

        return view('admin.dashboard', compact('userCount', 'bookingCount', 'serviceCount'));
    }
}
