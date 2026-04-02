<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
        /*
        |--------------------------------------------------------------------------
        | LOAD ROUTES API & WEB (FIX BIAR API KEBACA)
        |--------------------------------------------------------------------------
        */
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        /*
        |--------------------------------------------------------------------------
        | VIEW COMPOSER (PUNYA KAMU)
        |--------------------------------------------------------------------------
        */
        View::composer('layouts.adminassets.sidebar', function ($view) {
            $tahunList = [];

            $start = 2020;
            $end   = 2026;

            for ($i = $start; $i < $end; $i++) {
                $tahunList[] = "$i/" . ($i + 1);
            }

            $view->with('tahunList', $tahunList);
        });
    }
}
