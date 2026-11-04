<?php

use App\Http\Controllers\BookingController;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $settings = SiteSetting::first(); 
    $testimonials = \App\Models\Testimonial::where('is_active', true)->latest()->get();
    $packages = \App\Models\Package::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    return view('index', compact('settings', 'testimonials', 'packages'));
});

Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');