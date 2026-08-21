<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class VisitorStatsOverview extends BaseWidget
{
    protected static ?int $sort = 3;
    protected ?string $pollingInterval = null;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $stats = \Illuminate\Support\Facades\Cache::remember('visitor_stats_overview', 300, function () {
            $today = Carbon::today();
            $startOfWeek = Carbon::now()->startOfWeek();
            $startOfMonth = Carbon::now()->startOfMonth();

            return [
                'today' => VisitorStat::whereDate('date', $today)->sum('hits') ?? 0,
                'week' => VisitorStat::where('date', '>=', $startOfWeek)->sum('hits') ?? 0,
                'month' => VisitorStat::where('date', '>=', $startOfMonth)->sum('hits') ?? 0,
                'total' => VisitorStat::sum('hits') ?? 0,
            ];
        });

        return [
            Stat::make('Kunjungan Hari Ini', $stats['today'])
                ->description('Total kunjungan hari ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('success'),
            Stat::make('Kunjungan Minggu Ini', $stats['week'])
                ->description('Total kunjungan minggu ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
            Stat::make('Kunjungan Bulan Ini', $stats['month'])
                ->description('Total kunjungan bulan ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
            Stat::make('Total Kunjungan', $stats['total'])
                ->description('Seluruh waktu')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('gray'),
        ];
    }
}
