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
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin') ? (bool)$request->is_admin : false,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        $user = User::findOrFail($id);
        
        // Prevent user from removing their own admin status
        if ($user->id === auth()->id() && $request->has('is_admin') && !$request->is_admin) {
            return redirect()->back()
                ->withErrors(['is_admin' => 'Je kunt je eigen admin status niet verwijderen.'])
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('is_admin')) {
            $user->is_admin = (bool)$request->is_admin;
        }
        
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd!');
    }

    public function login()
    {
        return view('auth.login');
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Je bent uitgelogd!');
    }

    public function dashboard()
    {
        $userCount = User::count();
        $bookingCount = Booking::count();
        $serviceCount = Service::count();
        
        // Additional statistics
        $todayBookings = Booking::whereDate('booking_time', today())->count();
        $thisWeekBookings = Booking::whereBetween('booking_time', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $thisMonthBookings = Booking::whereMonth('booking_time', now()->month)
            ->whereYear('booking_time', now()->year)
            ->count();
        $upcomingBookings = Booking::where('booking_time', '>=', now())
            ->orderBy('booking_time', 'asc')
            ->limit(5)
            ->with(['service'])
            ->get();
        $pendingBookings = Booking::where('booking_time', '>=', now())->count();

        return view('admin.dashboard', compact(
            'userCount', 
            'bookingCount', 
            'serviceCount',
            'todayBookings',
            'thisWeekBookings',
            'thisMonthBookings',
            'upcomingBookings',
            'pendingBookings'
        ));
    }
}
