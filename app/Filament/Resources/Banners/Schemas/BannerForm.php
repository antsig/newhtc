<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                TextInput::make('url')
                    ->url()
                    ->required(),
                TextInput::make('gambar')
                    ->required(),
                DatePicker::make('tgl_posting')
                    ->required(),
            ]);
    }
}
