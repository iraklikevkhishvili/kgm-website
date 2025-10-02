<?php

namespace App\Filament\Resources\Wines\Pages;

use App\Filament\Resources\Wines\WineResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;

class CreateWine extends CreateRecord
{
    protected static string $resource = WineResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Log::debug('CreateWine form data', $data);
        return $data;
    }
}
