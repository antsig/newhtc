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
            $identitas = \Illuminate\Support\Facades\Cache::rememberForever('global_identitas', function () {
                return \App\Models\Identitas::first();
            });

            $global_menus = \Illuminate\Support\Facades\Cache::rememberForever('global_menus', function () {
                return \App\Models\Menu::where('id_parent', 0)
                    ->where('aktif', 'Ya')
                    ->orderBy('urutan', 'asc')
                    ->with(['children' => function($q) {
                        $q->where('aktif', 'Ya')->orderBy('urutan', 'asc');
                    }])
                    ->get();
            });

            $global_banners_kanan = \Illuminate\Support\Facades\Cache::rememberForever('global_banners_kanan', function () {
                return \App\Models\Banner::where('posisi', 'kanan')->orderBy('id_banner', 'desc')->get();
            });

            $global_banners_kiri = \Illuminate\Support\Facades\Cache::rememberForever('global_banners_kiri', function () {
                return \App\Models\Banner::where('posisi', 'kiri')->orderBy('id_banner', 'desc')->get();
            });

            $welcome_popup = \Illuminate\Support\Facades\Cache::rememberForever('welcome_popup', function () {
                return \App\Models\Banner::where('is_popup', true)->first();
            });

            $view->with('identitas', $identitas);
            $view->with('global_menus', $global_menus);
            $view->with('global_banners_kanan', $global_banners_kanan);
            $view->with('global_banners_kiri', $global_banners_kiri);
            $view->with('welcome_popup', $welcome_popup);
        });
    }
}
