<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class PopularBerita extends BaseWidget
{
    protected static ?int $sort = 5;
    protected ?string $pollingInterval = null;
    protected static ?string $heading = 'Berita Terpopuler';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Berita::query()->orderBy('dibaca', 'desc')->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Berita')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('dibaca')
                    ->label('Dilihat')
                    ->numeric()
                    ->sortable()
                    ->icon('heroicon-m-eye'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal Publikasi')
                    ->date()
                    ->sortable(),
            ]);
    }
}
