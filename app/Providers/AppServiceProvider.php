<?php

namespace App\Providers;

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
        // Compartir variables de notificaciones con todas las vistas
        view()->composer('layouts.layoutpriv.topbar', function ($view) {
            $licenciasPorVencer = \App\Models\Licencia::where('fecha_vencimiento', '>', \Carbon\Carbon::now())
                                                      ->where('fecha_vencimiento', '<=', \Carbon\Carbon::now()->addDays(30))
                                                      ->where('estado', 1)
                                                      ->limit(5)
                                                      ->get();
            
            $view->with('licenciasPorVencer', $licenciasPorVencer);
        });
    }
}
