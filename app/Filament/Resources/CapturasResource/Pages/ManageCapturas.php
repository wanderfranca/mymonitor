<?php

namespace App\Filament\Resources\CapturasResource\Pages;

use App\Filament\Resources\CapturasResource;
use Filament\Resources\Pages\ManageRecords;
use Filament\Actions;

class ManageCapturas extends ManageRecords
{
    protected static string $resource = CapturasResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
