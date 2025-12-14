<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\TimeSlotController;


Route::get('/', function () {
    $services = \App\Models\Service::all();
    return view('home', compact('services'));
})->name('home');


Route::get('/services', [ServiceController::class, 'publicIndex'])->name('services');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('/book', [BookingController::class, 'showBookingForm'])->name('book');
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');
Route::get('/api/available-slots', [BookingController::class, 'getAvailableTimeSlots'])->name('api.available-slots');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Redirect /admin to dashboard or login
Route::get('/admin', function () {
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login')->with('error', 'Je moet ingelogd zijn als admin om toegang te krijgen.');
})->name('admin');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    // Users management
    Route::resource('users', UserController::class);
    
    // Services management
    Route::resource('services', ServiceController::class);
    
    // Bookings management
    Route::resource('bookings', BookingController::class);
    
    // Time slots management
    Route::get('/time-slots', [TimeSlotController::class, 'index'])->name('time-slots.index');
    Route::put('/time-slots/{id}', [TimeSlotController::class, 'update'])->name('time-slots.update');
    Route::post('/time-slots/bulk-update', [TimeSlotController::class, 'bulkUpdate'])->name('time-slots.bulk-update');
    Route::delete('/time-slots/{id}', [TimeSlotController::class, 'destroy'])->name('time-slots.destroy');
});



Route::post('/send-booking-confirmation', [MailController::class, 'sendBookingConfirmation']);



Route::get('/calendar', [BookingController::class, 'showCalendar'])->name('calendar');
Route::get('/events', [BookingController::class, 'fetchEvents']);
Route::post('/events', [BookingController::class, 'storeEvent']);
