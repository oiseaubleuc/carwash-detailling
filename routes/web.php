<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;


// Homepagina
Route::get('/', function () {
return view('home');
})->name('home');

// Dienstenpagina
Route::get('/services', [ServiceController::class, 'index'])->name('services');
//Route::get('services', [ServiceController::class, 'index'])->name('services.index');


// Over Ons
Route::get('/about', function () {
return view('about');
})->name('about');

// Contactpagina
Route::get('/contact', function () {
return view('contact');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');



Route::get('/book', [BookingController::class, 'showBookingForm'])->name('book');


// In routes/web.php
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');

Route::get('/', function () {return view('home');})->name('home');



//Packages
Route::get('/packages', function () {
    return view('packages');
})->name('packages');



//admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('bookings', BookingController::class);
});



// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [userController::class, 'dashboard'])->name('admin.dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Services
    Route::resource('services', ServiceController::class);

    // Bookings
    Route::get('bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
});





// Login routes
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Admin dashboard route (optioneel, indien je een admin dashboard hebt)
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');


Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');


// Groep routes voor admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Routes voor gebruikers
    Route::resource('users', UserController::class);

    // Routes voor boekingen
    Route::resource('bookings', BookingController::class);

    // Routes voor diensten
    Route::resource('services', ServiceController::class);
});



Route::get('/packages', [ServiceController::class, 'index'])->name('packages.index');
Route::get('/packages/{id}', [ServiceController::class, 'show'])->name('packages.show');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
