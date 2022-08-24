<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Str::macro('currency', function ($value) {
            if (App::currentLocale() === 'de') {
                return number_format($value, 2, ',', '.') . ' ' . config('app.currency');
            }

            return number_format($value, 2) . ' ' . config('app.currency');
        });
    }
}
