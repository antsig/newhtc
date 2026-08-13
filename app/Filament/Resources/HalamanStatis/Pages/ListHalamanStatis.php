<?php

namespace App\Filament\Resources\HalamanStatis\Pages;

use App\Filament\Resources\HalamanStatis\HalamanStatisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHalamanStatis extends ListRecords
{
    protected static string $resource = HalamanStatisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
