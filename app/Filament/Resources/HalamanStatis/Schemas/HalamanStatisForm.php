<?php

namespace App\Filament\Resources\HalamanStatis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Schemas\Schema;

class HalamanStatisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Konten Halaman')
                            ->schema([
                                TextInput::make('judul')
                                    ->required(),
                                TextInput::make('judul_seo')
                                    ->required(),
                                RichEditor::make('isi_halaman')
                                    ->required()
                                    ->fileAttachmentsDirectory('halaman_attachments')
                                    ->columnSpanFull(),
                                FileUpload::make('gambar')
                                    ->image()
                                    ->directory('halaman')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Publishing Info')
                            ->schema([
                                TextInput::make('username')
                                    ->default(auth()->user()?->email ?? 'admin')
                                    ->required(),
                                TextInput::make('dibaca')
                                    ->required()
                                    ->numeric()
                                    ->default(0),
                                DatePicker::make('tgl_posting')
                                    ->default(now())
                                    ->required(),
                                TimePicker::make('jam')
                                    ->default(now())
                                    ->required(),
                                TextInput::make('hari')
                                    ->default(now()->locale('id')->dayName)
                                    ->required(),
                            ])->columns(2),
                    ])->columnSpanFull()
            ]);
    }
}
