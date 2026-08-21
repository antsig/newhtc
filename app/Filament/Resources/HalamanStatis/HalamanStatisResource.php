<?php

namespace App\Filament\Resources\HalamanStatis;

use App\Filament\Resources\HalamanStatis\Pages\CreateHalamanStatis;
use App\Filament\Resources\HalamanStatis\Pages\EditHalamanStatis;
use App\Filament\Resources\HalamanStatis\Pages\ListHalamanStatis;
use App\Filament\Resources\HalamanStatis\Schemas\HalamanStatisForm;
use App\Filament\Resources\HalamanStatis\Tables\HalamanStatisTable;
use App\Models\HalamanStatis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HalamanStatisResource extends Resource
{
    protected static ?string $model = HalamanStatis::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return HalamanStatisForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HalamanStatisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHalamanStatis::route('/'),
            'create' => CreateHalamanStatis::route('/create'),
            'edit' => EditHalamanStatis::route('/{record}/edit'),
        ];
    }
}

