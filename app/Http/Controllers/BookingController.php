<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Notifications\NewBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // 1. التأكد من البيانات
        $data = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'trip_date'      => 'required|date',
            'trip_time'      => 'required|string',
            'notes'          => 'nullable|string',
        ]);

        // 2. حفظ في الداتابيز
       $booking = Booking::create($data);

        Notification::route('mail', 'omaralieid91@gmail.com')
                ->notify(new NewBookingNotification($booking));

        // 3. الرجوع برسالة نجاح
        return back()->with('success', 'تم استلام طلب حجزك بنجاح! سنتواصل معك قريباً.');
    }
}