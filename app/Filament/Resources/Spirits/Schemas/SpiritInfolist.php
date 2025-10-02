<?php

namespace App\Filament\Resources\Spirits\Schemas;

use App\Models\Spirit;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SpiritInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('slug'),
                TextEntry::make('name'),
                ImageEntry::make('image_path')
                    ->placeholder('-'),
                TextEntry::make('trademark'),
                TextEntry::make('making')
                    ->placeholder('-'),
                TextEntry::make('region')
                    ->placeholder('-'),
                TextEntry::make('appellation')
                    ->placeholder('-'),
                TextEntry::make('abv')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('serving_temperature')
                    ->placeholder('-'),
                TextEntry::make('food_pairings')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('closure')
                    ->placeholder('-'),
                TextEntry::make('volume')
                    ->placeholder('-'),
                TextEntry::make('bottle')
                    ->placeholder('-'),
                TextEntry::make('description_pdf')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('visual')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('aroma')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('taste')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Spirit $record): bool => $record->trashed()),
            ]);
    }
}
