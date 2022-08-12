<?php

namespace App\Providers;

use App\Rubric;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            /*
            echo '<div style="background: #171719; color: #2cad2c; padding: 4px 6px; font-size: 12px;">';
            print_r($query->sql);
            echo '</div>';
            */
            Log::channel('sqllogs')->info($query->sql);
        });

        view()->composer('layouts.footer', function($view) {
           $view->with('rubrics', Rubric::all());
        });
    }
}
