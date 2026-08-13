<?php

namespace App\Filament\Resources\HalamanStatis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HalamanStatisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('judul_seo')
                    ->searchable(),
                TextColumn::make('tgl_posting')
                    ->date()
                    ->sortable(),
                TextColumn::make('gambar')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('dibaca')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jam')
                    ->time()
                    ->sortable(),
                TextColumn::make('hari')
                    ->searchable(),
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
