<?php

namespace App\Filament\Resources\Wines\Pages;

use App\Filament\Resources\Wines\WineResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;



class ViewWine extends ViewRecord
{
    protected static string $resource = WineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
