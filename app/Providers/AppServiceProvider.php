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
            $view->with('identitas', \App\Models\Identitas::first());
            $view->with('global_menus', \App\Models\Menu::where('aktif', 'Ya')->orderBy('urutan', 'asc')->get());
        });
    }
}
