<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;


// Homepagina
Route::get('/', function () {
    return view('home');
})->name('home');

// Dienstenpagina
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Over Ons
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contactpagina
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Boekingspagina
Route::get('/book', [BookingController::class, 'showBookingForm'])->name('book');
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');

// Login routes
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Admin routes met middleware 'auth' en 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Services
    Route::resource('services', ServiceController::class);

    // Bookings
    Route::resource('bookings', BookingController::class);
});


Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');



Route::post('/send-booking-confirmation', [MailController::class, 'sendBookingConfirmation']);
Route::get('/book', [BookingController::class, 'showBookingForm'])->name('book');
Route::post('/booking/submit', [BookingController::class, 'confirmBooking'])->name('booking.confirm');



Route::get('/calendar', [BookingController::class, 'showCalendar'])->name('calendar');
Route::get('/events', [BookingController::class, 'fetchEvents']);
Route::post('/events', [BookingController::class, 'storeEvent']);
