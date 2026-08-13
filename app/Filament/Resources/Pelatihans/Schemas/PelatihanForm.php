<?php

namespace App\Filament\Resources\Pelatihans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;

class PelatihanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori')
                    ->options([
                        'Perpajakan' => 'Perpajakan',
                        'Akuntansi' => 'Akuntansi',
                        'Manajemen' => 'Manajemen',
                    ])
                    ->required(),
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),
                DatePicker::make('jadwal'),
                FileUpload::make('gambar')
                    ->image()
                    ->directory('pelatihan')
                    ->columnSpanFull(),
                RichEditor::make('isi_pelatihan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
