<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tema')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($set, ?string $state) => $set('tema_seo', Str::slug($state))),
                TextInput::make('tema_seo')
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),
                TextInput::make('tempat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('pengirim')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('tgl_mulai')->required(),
                DatePicker::make('tgl_selesai')->required(),
                TimePicker::make('jam')->required(),
                FileUpload::make('gambar')
                    ->image()
                    ->directory('agenda'),
                RichEditor::make('isi_agenda')
                    ->required()
                    ->columnSpanFull(),
                Hidden::make('tgl_posting')->default(date('Y-m-d')),
                Hidden::make('username')->default('admin'),
            ]);
    }
}
