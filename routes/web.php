<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/services', [ServiceController::class, 'index'])->name('services');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('/book', [BookingController::class, 'showBookingForm'])->name('book');
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');


    Route::resource('users', UserController::class);


    Route::resource('services', ServiceController::class);


    Route::resource('bookings', BookingController::class);
});


Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');



Route::post('/send-booking-confirmation', [MailController::class, 'sendBookingConfirmation']);
Route::get('/book', [BookingController::class, 'showBookingForm'])->name('book');
Route::post('/booking/submit', [BookingController::class, 'confirmBooking'])->name('booking.confirm');



Route::get('/calendar', [BookingController::class, 'showCalendar'])->name('calendar');
Route::get('/events', [BookingController::class, 'fetchEvents']);
Route::post('/events', [BookingController::class, 'storeEvent']);
