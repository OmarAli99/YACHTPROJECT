<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    public static function canView(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    protected function getStats(): array
    {
        // 1. رحلات هذا الشهر
        $monthlyBookings = Booking::whereMonth('trip_date', now()->month)
            ->whereYear('trip_date', now()->year)
            ->count();

        // 2. الحجوزات بانتظار التأكيد (Pending)
        $pendingBookings = Booking::where('status', 'pending')->count();

        // 3. إجمالي الإيرادات من الحجوزات المؤكدة
        $totalRevenue = Booking::where('status', 'confirmed')->sum('total_price');

        // 4. إجمالي العربين المحصلة فعلياً
        $totalPaid = Booking::where('status', 'confirmed')->sum('paid_amount');

        return [
            Stat::make('رحلات هذا الشهر', number_format($monthlyBookings))
                ->description(now()->translatedFormat('F Y'))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('primary'),

            Stat::make('بانتظار التأكيد', number_format($pendingBookings))
                ->description('طلبات تحتاج مراجعة واتصال')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingBookings > 0 ? 'warning' : 'gray'),

            Stat::make('إجمالي الإيرادات المؤكدة', number_format($totalRevenue) . ' ج.م')
                ->description('عوائد الرحلات المؤكدة')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('العربين المحصلة', number_format($totalPaid) . ' ج.م')
                ->description('المبالغ المستلمة فعلياً')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('info'),
        ];
    }
}
