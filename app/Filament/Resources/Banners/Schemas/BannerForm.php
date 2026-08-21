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
                \Filament\Forms\Components\Hidden::make('url')
                    ->default('#'),
                \Filament\Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('banner')
                    ->required(),
                \Filament\Forms\Components\Select::make('posisi')
                    ->options([
                        'kanan' => 'Sidebar Kanan',
                        'kiri' => 'Sidebar Kiri',
                        'tengah' => 'Tengah (Konten)',
                    ])
                    ->default('kanan')
                    ->required(),
                \Filament\Forms\Components\Toggle::make('is_popup')
                    ->label('Jadikan Welcome Popup (Hanya 1 yang akan tampil)')
                    ->default(false),
                \Filament\Forms\Components\Hidden::make('tgl_posting')
                    ->default(now()->format('Y-m-d')),
            ]);
    }
}
