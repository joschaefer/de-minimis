<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Str::macro('currency', fn ($value) => number_format($value, 2) . ' ' . config('app.currency'));
    }
}
