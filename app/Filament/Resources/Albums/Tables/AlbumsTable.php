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
                Filament\Tables\Columns\ImageColumn::make('gbr_album')
                    ->label('Sampul')
                    ->square(),
                TextColumn::make('jdl_album')
                    ->label('Judul Album')
                    ->searchable()
                    ->description(fn (App\Models\Album $record): string => $record->album_seo ?? ''),
                TextColumn::make('aktif')
                    ->badge(),
                TextColumn::make('tgl_posting')
                    ->label('Tgl Posting & Hits')
                    ->date()
                    ->sortable()
                    ->description(fn (App\Models\Album $record): string => $record->hits_album . ' views'),
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
