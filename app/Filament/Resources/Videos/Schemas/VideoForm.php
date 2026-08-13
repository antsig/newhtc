<?php

namespace App\Filament\Resources\Videos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('youtube_url')
                    ->url()
                    ->required(),
                TextInput::make('keterangan'),
                Toggle::make('aktif')
                    ->required(),
            ]);
    }
}
