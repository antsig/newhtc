<?php

namespace App\Filament\Resources\Albums\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AlbumsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jdl_album')
                    ->searchable(),
                TextColumn::make('album_seo')
                    ->searchable(),
                TextColumn::make('gbr_album')
                    ->searchable(),
                TextColumn::make('aktif')
                    ->badge(),
                TextColumn::make('hits_album')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tgl_posting')
                    ->date()
                    ->sortable(),
                TextColumn::make('jam')
                    ->time()
                    ->sortable(),
                TextColumn::make('hari')
                    ->searchable(),
                TextColumn::make('username')
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
