<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_kategori')
                    ->required(),
                TextInput::make('kategori_seo')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                Select::make('aktif')
                    ->options(['Y' => 'Y', 'N' => 'N'])
                    ->default('Y')
                    ->required(),
                TextInput::make('sidebar'),
                TextInput::make('gambar_utama'),
            ]);
    }
}
