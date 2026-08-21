<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Info Album')
                            ->schema([
                                TextInput::make('jdl_album')
                                    ->label('Judul Album')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($set, ?string $state) => $set('album_seo', \Illuminate\Support\Str::slug($state))),
                                TextInput::make('album_seo')
                                    ->label('SEO URL')
                                    ->required()
                                    ->readOnly(),
                                Textarea::make('keterangan')
                                    ->columnSpanFull(),
                                FileUpload::make('gbr_album')->disk('public')->directory('albums')
                                    ->label('Cover Album')
                                    ->image()
                                    ->directory('albums/covers'),
                            ]),
                        Tabs\Tab::make('Koleksi Foto')
                            ->schema([
                                FileUpload::make('photos')->disk('public')->directory('albums/photos')
                                    ->label('Upload Banyak Foto')
                                    ->multiple()
                                    ->image()
                                    ->reorderable()
                                    ->directory('albums/photos')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Pengaturan')
                            ->schema([
                                Select::make('aktif')
                                    ->options(['Y' => 'Y', 'N' => 'N'])
                                    ->default('Y')
                                    ->required(),
                                \Filament\Forms\Components\Hidden::make('username')
                                    ->default(auth()->user()?->email ?? 'admin'),
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
