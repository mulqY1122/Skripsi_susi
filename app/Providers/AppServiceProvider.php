<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Set locale PHP untuk tanggal
        setlocale(LC_TIME, 'id_ID.UTF-8');

        // Set locale untuk Carbon (pakai Bahasa Indonesia)
        Carbon::setLocale('id');
    }
}
