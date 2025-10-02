<?php

namespace App\Filament\Resources\Wines\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section; // your wrapper
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WineForm
{

    public static function configure(Schema $schema): Schema
    {

        return $schema->components([
            TextInput::make('slug')
                ->helperText('Leave blank to auto-generate from name + line + making.')
                ->maxLength(190),

            TextInput::make('name')
                ->label('Full name')
                ->required()
                ->maxLength(180),

            SpatieMediaLibraryFileUpload::make('hero')
                ->label('Hero image')
                ->collection('hero')
                //->disk($mediaDisk)
                ->disk('minio')
                ->image()
                ->imageEditor()
                ->panelLayout('compact')
                ->preserveFilenames()
                ->nullable()
                ->maxFiles(1)
                ->helperText('Main product image')
                ->required(fn(string $operation): bool => $operation === 'create')
                ->disk(env('MEDIA_DISK', 's3'))->directory('bottles')
                ->visibility('publico'),

            SpatieMediaLibraryFileUpload::make('gallery')
                ->label('Gallery')
                ->collection('gallery')
                ->disk('minio')
                //->disk($mediaDisk)
                ->image()
                ->multiple()
                ->reorderable()
                ->preserveFilenames()
                ->panelLayout('grid')
                ->helperText('Additional images')
                ->disk(env('MEDIA_DISK', 's3'))->directory('bottles')
                ->visibility('publico'),

            Radio::make('trademark')
                ->label('Line')
                ->options([
                    'KGM' => 'KGM',
                    'ANNATA' => 'ANNATA',
                    'ensemble' => 'Ensemble',
                    '7_hands' => '7 Hands',
                ])
                ->inline()
                ->required(),

            Select::make('color')
                ->label('Colour')
                ->options([
                    'red' => 'Red',
                    'white' => 'White',
                    'amber' => 'Amber',
                    'rose' => 'Rose',
                ])
                ->native(false),

            Select::make('category')
                ->label('Wine Type')
                ->options([
                    'dry' => 'Dry',
                    'semi-dry' => 'Semi-Dry',
                    'semi-sweet' => 'Semi-Sweet',
                    'sweet' => 'Sweet',
                ])
                ->native(false),

            TagsInput::make('grape_variety')
                ->label('Grape Variety')
                ->placeholder('Add variety and press Enter')
                ->helperText('Example: Rkatsiteli, Saperavi')
                ->separator(','),

            Select::make('making')
                ->options([
                    'classic' => 'Classic',
                    'qvevri' => 'Qvevri',
                ])
                ->required()
                ->native(false),

            TextInput::make('region')->maxLength(120),
            TextInput::make('appellation')->maxLength(120),

            TextInput::make('abv')
                ->label('ABV (%)')
                ->numeric()
                ->step('0.1')
                ->minValue(0)
                ->maxValue(100),

            Section::make('Serving & Technical')
                ->columnSpanFull()
                ->columns(2)
                ->collapsible()
                ->collapsed()
                ->schema([
                    Section::make('Serving')->schema([
                        TextInput::make('serving_temperature')
                            ->placeholder('e.g., 10–12')
                            ->helperText('°C'),
                        Textarea::make('food_pairings')->columnSpanFull(),
                    ]),
                    Section::make('Technical')->schema([
                        Textarea::make('acidity')->columnSpanFull(),
                        Textarea::make('tannins')->columnSpanFull(),
                    ]),
                ]),

            Section::make('Packaging')
                ->columnSpanFull()
                ->columns(3)
                ->schema([
                    TextInput::make('closure')->label('Bottle Closure')->maxLength(120),
                    TextInput::make('volume')->placeholder('e.g., 750')->helperText('mL'),
                    TextInput::make('bottle')->maxLength(120),
                ]),

            TextInput::make('description_pdf')
                ->placeholder('path/to/file.pdf')
                ->helperText('Optional PDF spec sheet path (or migrate to Media Library later).'),

            Textarea::make('description')->columnSpanFull(),
            Textarea::make('visual')->label('Eye')->columnSpanFull(),
            Textarea::make('aroma')->columnSpanFull(),
            Textarea::make('taste')->columnSpanFull(),
        ]);
    }
}
