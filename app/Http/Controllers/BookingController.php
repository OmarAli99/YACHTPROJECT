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
            'occasion'       => 'nullable|string|max:255',
            'guests_count'   => 'nullable|integer|min:1|max:50',
            'notes'          => 'nullable|string',
        ]);

        // القيمة الافتراضية لعدد الأفراد لو لم يُحدد
        if (empty($data['guests_count'])) {
            $data['guests_count'] = 2;
        }

        // 2. حفظ في الداتابيز
        $booking = Booking::create($data);

        try {
            Notification::route('mail', 'omaralieid91@gmail.com')
                ->notify(new NewBookingNotification($booking));
        } catch (\Throwable $e) {
            // في حال عدم توفر اتصال بالإنترنت أو عدم ضبط إعدادات الميل لا تتوقف العملية
            logger()->error('Failed to send booking notification: ' . $e->getMessage());
        }

        // 3. الرجوع برسالة نجاح
        return back()->with('success', 'تم استلام طلب حجزك الملكي بنجاح! سنتواصل معك قريباً لتأكيد الموعد ⚓');
    }
}