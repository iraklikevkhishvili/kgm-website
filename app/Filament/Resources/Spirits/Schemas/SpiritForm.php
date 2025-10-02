<?php

namespace App\Filament\Resources\Spirits\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SpiritForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image_path')
                    ->image(),
                TextInput::make('trademark')
                    ->required(),
                TextInput::make('gallery'),
                TextInput::make('grape_variety'),
                TextInput::make('making'),
                TextInput::make('region'),
                TextInput::make('appellation'),
                TextInput::make('abv')
                    ->numeric(),
                TextInput::make('serving_temperature'),
                Textarea::make('food_pairings')
                    ->columnSpanFull(),
                TextInput::make('closure'),
                TextInput::make('volume'),
                TextInput::make('bottle'),
                TextInput::make('description_pdf'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('visual')
                    ->columnSpanFull(),
                Textarea::make('aroma')
                    ->columnSpanFull(),
                Textarea::make('taste')
                    ->columnSpanFull(),
            ]);
    }
}
