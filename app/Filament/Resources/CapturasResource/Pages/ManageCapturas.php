<?php

namespace App\Filament\Resources\CapturasResource\Pages;

use App\Filament\Resources\CapturasResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCapturas extends ManageRecords
{
    protected static string $resource = CapturasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
