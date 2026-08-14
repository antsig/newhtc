<?php

namespace App\Filament\Resources\Pelatihans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PelatihansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Thumbnail')
                    ->square(),
                TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->description(fn (App\Models\Pelatihan $record): string => $record->slug ?? ''),
                TextColumn::make('kategori')->sortable()->searchable(),
                TextColumn::make('jadwal')->date()->sortable(),
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
            ]);
    }
}
