<?php

namespace App\Filament\Resources\Spirits\Pages;

use App\Filament\Resources\Spirits\SpiritResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpirit extends ViewRecord
{
    protected static string $resource = SpiritResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
