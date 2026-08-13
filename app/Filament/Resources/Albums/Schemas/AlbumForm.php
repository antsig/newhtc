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
                                    ->afterStateUpdated(fn (\Filament\Forms\Set $set, ?string $state) => $set('album_seo', \Illuminate\Support\Str::slug($state))),
                                TextInput::make('album_seo')
                                    ->label('SEO URL')
                                    ->required()
                                    ->readOnly(),
                                Textarea::make('keterangan')
                                    ->columnSpanFull(),
                                FileUpload::make('gbr_album')
                                    ->label('Cover Album')
                                    ->image()
                                    ->directory('albums/covers'),
                            ]),
                        Tabs\Tab::make('Koleksi Foto')
                            ->schema([
                                FileUpload::make('photos')
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
                                TextInput::make('username')
                                    ->default(auth()->user()?->email ?? 'admin')
                                    ->required(),
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
