<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\VisitorStat;
use App\Models\Pelatihan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;
    protected ?string $pollingInterval = null;
    
    protected function getStats(): array
    {
        $stats = \Illuminate\Support\Facades\Cache::remember('stats_overview', 300, function () {
            return [
                'visitor' => VisitorStat::sum('hits') ?? 0,
                'berita' => Berita::count(),
                'pelatihan' => Pelatihan::count(),
            ];
        });

        return [
            Stat::make('Total Pengunjung', $stats['visitor'])
                ->description('Total hits seluruh halaman')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Berita', $stats['berita'])
                ->description('Artikel dan berita yang dipublikasi')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary'),
            Stat::make('Total Pelatihan', $stats['pelatihan'])
                ->description('Program pelatihan tersedia')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('info'),
        ];
    }
}
