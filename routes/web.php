<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;

// Homepagina
Route::get('/', function () {return view('home');  })->name('home');

// Dienstenpagina
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Over Ons
Route::get('/about', function () {return view('about');})->name('about');

// Contactpagina
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


// Boekingen
Route::get('/booking/create/{service_id}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirmation/{id}', [BookingController::class, 'confirmation'])->name('confirmation');
