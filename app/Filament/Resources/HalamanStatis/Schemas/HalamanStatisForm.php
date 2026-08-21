<?php

namespace App\Filament\Resources\HalamanStatis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
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
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($set, ?string $state) => $set('judul_seo', \Illuminate\Support\Str::slug($state))),
                                TextInput::make('judul_seo')
                                    ->required()
                                    ->readOnly(),
                                RichEditor::make('isi_halaman')->fileAttachmentsDisk('public')->fileAttachmentsDirectory('halaman_attachments')
                                    ->required()
                                    ->fileAttachmentsDirectory('halaman_attachments')
                                    ->columnSpanFull(),
                                FileUpload::make('gambar')->disk('public')->directory('halaman')
                                    ->image()
                                    ->directory('halaman')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Publishing Info')
                            ->schema([
                                \Filament\Forms\Components\Hidden::make('username')
                                    ->default(auth()->user()?->email ?? 'admin'),
                                \Filament\Forms\Components\Hidden::make('dibaca')
                                    ->default(0),
                                \Filament\Forms\Components\Hidden::make('tgl_posting')
                                    ->default(now()->format('Y-m-d')),
                                \Filament\Forms\Components\Hidden::make('jam')
                                    ->default(now()->format('H:i:s')),
                                \Filament\Forms\Components\Hidden::make('hari')
                                    ->default(now()->locale('id')->dayName),
                            ])->columns(2),
                    ])->columnSpanFull()
            ]);
    }
}
