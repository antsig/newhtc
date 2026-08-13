<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_parent')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('nama_menu')
                    ->required(),
                TextInput::make('link')
                    ->required(),
                Select::make('aktif')
                    ->options(['Ya' => 'Ya', 'Tidak' => 'Tidak'])
                    ->default('Ya')
                    ->required(),
                Select::make('position')
                    ->options(['Top' => 'Top', 'Bottom' => 'Bottom'])
                    ->default('Bottom')
                    ->required(),
                TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
