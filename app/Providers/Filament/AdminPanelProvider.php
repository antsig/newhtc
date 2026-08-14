<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $identitas = null;
        try {
            $identitas = \App\Models\Identitas::first();
        } catch (\Throwable $e) {
            // ignore
        }

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::hex('#074174'), // HTC Blue
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->font('Poppins')
            ->brandName($identitas?->nama_website ?? 'HTC Pajak Administrator')
            ->brandLogo($identitas?->logo ? asset('storage/' . $identitas->logo) : null)
            ->favicon($identitas?->favicon ? asset('storage/' . $identitas->favicon) : null)
            ->profile()
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
    public function boot(): void
    {
        \Filament\Support\Facades\FilamentView::registerRenderHook(
            \Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
            fn (): string => \Illuminate\Support\Facades\Blade::render('
                <style>
                    body.fi-body { background: url("https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80") center center/cover no-repeat fixed !important; }
                    .fi-simple-main { background-color: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(10px); border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 20px;}
                </style>
            ')
        );

        // Inject custom CSS to make the admin panel look more premium (like AdminLTE with blue accent)
        \Filament\Support\Facades\FilamentView::registerRenderHook(
            \Filament\View\PanelsRenderHook::HEAD_END,
            fn (): string => \Illuminate\Support\Facades\Blade::render('
                <style>
                    /* Custom Topbar */
                    .fi-topbar {
                        background-color: #074174 !important;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    }
                    .fi-topbar .fi-topbar-item-label, 
                    .fi-topbar button, 
                    .fi-topbar a,
                    .fi-topbar svg,
                    .fi-topbar span {
                        color: #ffffff !important;
                    }
                    /* Ensure dropdowns inside topbar are normal */
                    .fi-dropdown-panel * {
                        color: inherit !important;
                    }
                    .fi-dropdown-panel svg {
                        color: #4b5563 !important;
                    }
                    
                    /* Custom Sidebar enhancements */
                    .fi-sidebar {
                        background-color: #f8fafc !important;
                        border-right: 1px solid #e2e8f0;
                    }
                    .fi-sidebar-item-active {
                        background-color: #e0f2fe !important;
                        border-right: 4px solid #074174;
                        border-radius: 0 !important;
                    }
                    .fi-sidebar-item-active .fi-sidebar-item-label,
                    .fi-sidebar-item-active svg {
                        color: #074174 !important;
                        font-weight: bold;
                    }
                </style>
            ')
        );
    }
}
