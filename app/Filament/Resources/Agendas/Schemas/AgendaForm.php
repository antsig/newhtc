<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tema')
                    ->required(),
                TextInput::make('tema_seo')
                    ->required(),
                Textarea::make('isi_agenda')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('tempat')
                    ->required(),
                TextInput::make('pengirim')
                    ->required(),
                TextInput::make('gambar'),
                DatePicker::make('tgl_mulai')
                    ->required(),
                DatePicker::make('tgl_selesai')
                    ->required(),
                DatePicker::make('tgl_posting')
                    ->required(),
                TextInput::make('jam')
                    ->required(),
                TextInput::make('dibaca')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('username')
                    ->required(),
            ]);
    }
}
