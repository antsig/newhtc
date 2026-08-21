<?php

namespace App\Filament\Resources\HalamanStatis\Pages;

use App\Filament\Resources\HalamanStatis\HalamanStatisResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHalamanStatis extends CreateRecord
{
    protected static string $resource = HalamanStatisResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
