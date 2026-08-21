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
            $identitas = \Illuminate\Support\Facades\Cache::remember('admin_identitas', 3600, function() {
                return \App\Models\Identitas::first();
            });
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
            ->font('Inter', provider: \Filament\FontProviders\LocalFontProvider::class)
            ->brandName($identitas?->nama_website ?? 'HTC Pajak Administrator')
            ->brandLogo(fn () => view('filament.logo'))
            ->favicon($identitas?->favicon ? asset('storage/' . $identitas->favicon) : null)
            ->profile()
            ->sidebarFullyCollapsibleOnDesktop()
            ->maxContentWidth('full')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // Removed AccountWidget to maximize custom widgets
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
                    body.fi-body { background: linear-gradient(135deg, #074174 0%, #04315a 100%) !important; }
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
                    /* Minimalist Sidebar Gap (Treeview vs Normal) */
                    ul.fi-sidebar-nav-groups {
                        gap: 0.25rem !important;
                    }
                    .fi-sidebar-group {
                        margin-top: 0 !important;
                    }
                    .fi-sidebar-group .fi-sidebar-group-items {
                        gap: 0.25rem !important;
                    }
                    /* Increase height of RichEditor (Summernote) */
                    trix-editor, .trix-editor, .fi-fo-rich-editor .trix-content {
                        min-height: 15rem !important;
                    }
                </style>
            ')
        );

        \Filament\Support\Facades\FilamentView::registerRenderHook(
            \Filament\View\PanelsRenderHook::USER_MENU_BEFORE,
            fn (): string => \Illuminate\Support\Facades\Blade::render('
                <div style="display: flex; align-items: center; gap: 12px; margin-right: 12px;">
                    <a href="{{ filament()->getProfileUrl() }}" title="Profil" style="display: flex; align-items: center; gap: 6px; font-size: 14px; font-weight: 600; color: rgba(255,255,255,0.9); background: rgba(255,255,255,0.1); padding: 6px 12px; border-radius: 6px; text-decoration: none;">
                        <x-heroicon-o-user style="width: 18px; height: 18px;" />
                        <span class="hidden md:inline">Profil</span>
                    </a>
                    <form action="{{ filament()->getLogoutUrl() }}" method="post" style="margin: 0; padding: 0;">
                        @csrf
                        <button type="submit" title="Keluar" style="display: flex; align-items: center; gap: 6px; font-size: 14px; font-weight: 600; color: rgba(255,255,255,0.9); background: rgba(255,255,255,0.1); padding: 6px 12px; border-radius: 6px; border: none; cursor: pointer;">
                            <x-heroicon-o-arrow-right-on-rectangle style="width: 18px; height: 18px;" />
                            <span class="hidden md:inline">Keluar</span>
                        </button>
                    </form>
                </div>
            ')
        );
    }
}
