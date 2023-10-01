<?php

namespace App\Filament\Resources\LojasResource\Pages;

use App\Filament\Resources\LojasResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLojas extends ManageRecords
{
    protected static string $resource = LojasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
