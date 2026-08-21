<?php

namespace App\Filament\Resources\Beritas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BeritasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_kategori')
                    ->label('Kategori')
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\ImageColumn::make('gambar')->disk('public')
                    ->label('Gambar / Thumbnail')
                    ->square(),
                TextColumn::make('judul')
                    ->label('Judul Berita')
                    ->searchable()
                    ->description(fn (\App\Models\Berita $record): string => ($record->judul_seo ?? '') . ' | ' . ($record->tanggal ?? '') . ' | ' . ($record->dibaca ?? '0') . ' views | Tags: ' . ($record->tag ?? '')),
                TextColumn::make('youtube')
                    ->label('ID Youtube')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('headline')
                    ->badge(),
                TextColumn::make('aktif')
                    ->badge(),
                TextColumn::make('utama')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
