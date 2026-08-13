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
                    ->numeric()
                    ->sortable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('sub_judul')
                    ->searchable(),
                TextColumn::make('youtube')
                    ->searchable(),
                TextColumn::make('judul_seo')
                    ->searchable(),
                TextColumn::make('headline')
                    ->badge(),
                TextColumn::make('aktif')
                    ->badge(),
                TextColumn::make('utama')
                    ->badge(),
                TextColumn::make('hari')
                    ->searchable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('jam')
                    ->time()
                    ->sortable(),
                TextColumn::make('gambar')
                    ->searchable(),
                TextColumn::make('dibaca')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tag')
                    ->searchable(),
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
            ]);
    }
}
