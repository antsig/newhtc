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
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($set, ?string $state) => $set('kategori_seo', \Illuminate\Support\Str::slug($state))),
                TextInput::make('kategori_seo')
                    ->required()
                    ->readOnly(),
                TextInput::make('username')
                    ->required(),
                Select::make('aktif')
                    ->options(['Y' => 'Y', 'N' => 'N'])
                    ->default('Y')
                    ->required(),
                TextInput::make('sidebar')
                    ->label('Sidebar Khusus')
                    ->helperText('Kosongkan jika ingin menggunakan sidebar default.')
                    ->placeholder('Contoh: sidebar_berita'),
                \Filament\Forms\Components\FileUpload::make('gambar_utama')
                    ->image()
                    ->directory('kategori')
                    ->label('Gambar Utama Kategori'),
            ]);
    }
}
