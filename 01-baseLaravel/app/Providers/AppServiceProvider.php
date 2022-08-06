<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            //dump($query->sql, $query->bindings);
            echo '<div style="background: #171719; color: #2cad2c; padding: 4px 6px; font-size: 12px;">';
            print_r($query->sql);
            echo '</div>';
        });
    }
}
