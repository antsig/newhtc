<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Informasi Umum')
                            ->schema([
                                TextInput::make('judul')
                                    ->required()
                                    ->columnSpanFull(),
                                TextInput::make('sub_judul')
                                    ->columnSpanFull(),
                                TextInput::make('judul_seo')
                                    ->required()
                                    ->columnSpanFull(),
                                Select::make('id_kategori')
                                    ->relationship('kategori', 'nama_kategori')
                                    ->required(),
                                RichEditor::make('isi_berita')
                                    ->required()
                                    ->fileAttachmentsDirectory('berita_attachments')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Media')
                            ->schema([
                                FileUpload::make('gambar')
                                    ->image(),
                                Textarea::make('keterangan_gambar')
                                    ->columnSpanFull(),
                                TextInput::make('youtube'),
                            ]),
                        Tabs\Tab::make('Pengaturan & Meta')
                            ->schema([
                                Select::make('headline')
                                    ->options(['Y' => 'Y', 'N' => 'N'])
                                    ->default('Y')
                                    ->required(),
                                Select::make('aktif')
                                    ->options(['Y' => 'Y', 'N' => 'N'])
                                    ->default('Y')
                                    ->required(),
                                Select::make('utama')
                                    ->options(['Y' => 'Y', 'N' => 'N'])
                                    ->default('Y')
                                    ->required(),
                                Select::make('status')
                                    ->options(['Y' => 'Y', 'N' => 'N'])
                                    ->default('Y')
                                    ->required(),
                                TextInput::make('tag'),
                                TextInput::make('username')
                                    ->default(auth()->user()?->email ?? 'admin')
                                    ->required(),
                                DatePicker::make('tanggal')
                                    ->default(now())
                                    ->required(),
                                TimePicker::make('jam')
                                    ->default(now())
                                    ->required(),
                                TextInput::make('hari')
                                    ->default(now()->locale('id')->dayName)
                                    ->required(),
                                TextInput::make('dibaca')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ])->columns(2),
                    ])->columnSpanFull()
            ]);
    }
}
