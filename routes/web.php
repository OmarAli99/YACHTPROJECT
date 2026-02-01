<?php

use App\Http\Controllers\BookingController;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $settings = SiteSetting::first(); 
    $testimonials = \App\Models\Testimonial::where('is_active', true)->latest()->get();
    return view('index', compact('settings','testimonials'));
});

Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');