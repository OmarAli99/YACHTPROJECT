<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // مشاركة بيانات الإعدادات مع ملفات الواجهة الأمامية فقط
        View::composer(['master', 'index', 'front.*'], function ($view) {
            $view->with('footersettings', Setting::first());
            $view->with('settings', \App\Models\SiteSetting::first());
        });
    }
}
