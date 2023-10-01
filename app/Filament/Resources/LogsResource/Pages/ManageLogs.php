<?php

namespace App\Filament\Resources\LogsResource\Pages;

use App\Filament\Resources\LogsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLogs extends ManageRecords
{
    protected static string $resource = LogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
