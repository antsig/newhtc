<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
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
                                    ->columnSpanFull()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($set, ?string $state) => $set('judul_seo', \Illuminate\Support\Str::slug($state))),
                                TextInput::make('sub_judul')
                                    ->columnSpanFull(),
                                TextInput::make('judul_seo')
                                    ->required()
                                    ->readOnly()
                                    ->columnSpanFull(),
                                Select::make('id_kategori')
                                    ->relationship('kategori', 'nama_kategori')
                                    ->required(),
                                RichEditor::make('isi_berita')
                                    ->required()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('berita_attachments')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Media')
                            ->schema([
                                FileUpload::make('gambar')
                                    ->disk('public')
                                    ->directory('berita')
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
                                TagsInput::make('tag')
                                    ->separator(',')
                                    ->placeholder('Tambahkan tag...'),
                                \Filament\Forms\Components\Hidden::make('username')
                                    ->default(auth()->user()?->email ?? 'admin'),
                                \Filament\Forms\Components\Hidden::make('tanggal')
                                    ->default(now()->format('Y-m-d')),
                                \Filament\Forms\Components\Hidden::make('jam')
                                    ->default(now()->format('H:i:s')),
                                \Filament\Forms\Components\Hidden::make('hari')
                                    ->default(now()->locale('id')->dayName),
                                \Filament\Forms\Components\Hidden::make('dibaca')
                                    ->default(0),
                            ])->columns(2),
                    ])->columnSpanFull()
            ]);
    }
}
