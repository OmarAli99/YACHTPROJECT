<?php

namespace App\Filament\Admin\Widgets;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s'; // يحدّث الأرقام كل 15 ثانية تلقائياً

    protected function getStats(): array
    {
        return [
           Stat::make('إجمالي الحجوزات', Booking::count())
                ->description('العدد الكلي للطلبات')
                ->descriptionIcon('heroicon-m-hand-thumb-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),

            Stat::make('حجوزات قيد الانتظار', Booking::where('status', 'pending')->count())
                ->description('تحتاج مراجعة')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('الحجوزات المؤكدة', Booking::where('status', 'confirmed')->count())
                ->description('تمت الموافقة عليها')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
        ];
    }
}
