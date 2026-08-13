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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            static $identitas = null;
            static $global_menus = null;

            if ($identitas === null) {
                $identitas = \App\Models\Identitas::first();
            }
            if ($global_menus === null) {
                $global_menus = \App\Models\Menu::where('aktif', 'Ya')->orderBy('urutan', 'asc')->get();
            }

            $view->with('identitas', $identitas);
            $view->with('global_menus', $global_menus);
        });
    }
}
