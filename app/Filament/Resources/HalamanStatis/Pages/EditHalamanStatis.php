<?php

namespace App\Filament\Resources\HalamanStatis\Pages;

use App\Filament\Resources\HalamanStatis\HalamanStatisResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHalamanStatis extends EditRecord
{
    protected static string $resource = HalamanStatisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
