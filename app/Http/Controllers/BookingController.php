<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

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
        Booking::create($data);

        // 3. الرجوع برسالة نجاح
        return back()->with('success', 'تم استلام طلب حجزك بنجاح! سنتواصل معك قريباً.');
    }
}