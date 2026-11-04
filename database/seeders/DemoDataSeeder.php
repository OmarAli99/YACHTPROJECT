<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. إضافة باقات الرحلات الأساسية
        $packages = [
            [
                'title'       => 'رحلة الغروب الملكية (Sunset Cruise)',
                'price'       => 3500.00,
                'duration'    => 'ساعتان إبحار',
                'description' => 'عش أجمل لحظات الغروب على ضفاف النيل مع نسيم المساء الساحر وأضواء القاهرة المتلألئة.',
                'features'    => [
                    'ساعتان إبحار في قلب النيل',
                    'مشروبات ترحيبية وعصائر فريش',
                    'ساوند سيستم عالي الجودة Bluetooth',
                    'طاقم بحري محترف لخدمتكم',
                    'جلسة خارجية مكشوفة VIP',
                ],
                'is_featured' => true,
                'is_active'   => true,
                'sort_order'  => 1,
            ],
            [
                'title'       => 'عشاء رومانسي VIP لشخصين',
                'price'       => 4800.00,
                'duration'    => 'ساعتان ونصف',
                'description' => 'تجربة استثنائية للاحتفال بذكرى زواج أو مناسبة خاصة في أجواء من الرومانسية والهدوء التام.',
                'features'    => [
                    'خصوصية تامة للشخصين على اليخت',
                    'عشاء فاخر لشخصين مع الشموع',
                    'تزيين طاولة العشاء بالورود',
                    'موسيقى هادئة مخصصة',
                    'ضيافة وحلوى خاصة',
                ],
                'is_featured' => false,
                'is_active'   => true,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'احتفال أعياد الميلاد والخطوبة',
                'price'       => 7500.00,
                'duration'    => '3 ساعات ونصف',
                'description' => 'احتفل مع العائلة والأصدقاء بأروع الذكريات مع تجهيزات احتفالية متكاملة وخصوصية كاملة.',
                'features'    => [
                    'استيعاب حتى 15 فرداً براحة تامة',
                    'ديكور احتفالي وبالونات مجهزة',
                    'نظام صوتي وإضاءة احتفالية',
                    'مكان مخصص للبوفيه والكيك',
                    'طاقم مساعدة لتنظيم الحفلة',
                ],
                'is_featured' => false,
                'is_active'   => true,
                'sort_order'  => 3,
            ],
        ];

        foreach ($packages as $pkg) {
            Package::updateOrCreate(['title' => $pkg['title']], $pkg);
        }

        // 2. إضافة حجوزات واقعية للعرض في لوحة التحكم
        $demoBookings = [
            [
                'customer_name'    => 'أحمد محمود القاضي',
                'customer_phone'   => '01012345678',
                'trip_date'        => Carbon::today()->addDays(2),
                'trip_time'        => 'afternoon',
                'occasion'         => 'birthday',
                'guests_count'     => 10,
                'total_price'      => 7500.00,
                'paid_amount'      => 3000.00,
                'remaining_amount' => 4500.00,
                'status'           => 'confirmed',
                'notes'            => 'تجهيز ديكور بالونات زرقاء وذهبية لعيد ميلاد.',
            ],
            [
                'customer_name'    => 'م. طارق العوضي',
                'customer_phone'   => '01198765432',
                'trip_date'        => Carbon::today()->addDays(4),
                'trip_time'        => 'night',
                'occasion'         => 'romantic_dinner',
                'guests_count'     => 2,
                'total_price'      => 4800.00,
                'paid_amount'      => 4800.00,
                'remaining_amount' => 0.00,
                'status'           => 'confirmed',
                'notes'            => 'عشاء ذكرى زواج، يرجى التنسيق على تشغيل موسيقى جاز.',
            ],
            [
                'customer_name'    => 'د. سارة إبراهيم',
                'customer_phone'   => '01234567890',
                'trip_date'        => Carbon::today()->addDays(5),
                'trip_time'        => 'afternoon',
                'occasion'         => 'private_cruise',
                'guests_count'     => 4,
                'total_price'      => 3500.00,
                'paid_amount'      => 0.00,
                'remaining_amount' => 3500.00,
                'status'           => 'pending',
                'notes'            => 'طلب حجز من الموقع - بانتظار اتصال لتأكيد موعد الغروب.',
            ],
            [
                'customer_name'    => 'عمر مصطفى الشريف',
                'customer_phone'   => '01511223344',
                'trip_date'        => Carbon::today()->subDays(3),
                'trip_time'        => 'morning',
                'occasion'         => 'photoshoot',
                'guests_count'     => 3,
                'total_price'      => 4000.00,
                'paid_amount'      => 4000.00,
                'remaining_amount' => 0.00,
                'status'           => 'confirmed',
                'notes'            => 'جلسة تصوير صباحية ناجحة.',
            ],
        ];

        foreach ($demoBookings as $bk) {
            Booking::updateOrCreate(
                [
                    'customer_name'  => $bk['customer_name'],
                    'customer_phone' => $bk['customer_phone'],
                ],
                $bk
            );
        }
    }
}
