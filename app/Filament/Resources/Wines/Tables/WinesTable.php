<?php

namespace App\Filament\Resources\Wines\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\ViewAction;

class WinesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('trademark')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                //ImageColumn::make('hero')
                //    ->getImageUrl('hero'),
                TextColumn::make('color')
                    ->searchable(),
                TextColumn::make('making')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make(name: 'trademark')->options(['kgm' => 'KGM', 'annata' => 'Annata', 'ensemble' => 'Ensemble',]),
                SelectFilter::make(name: 'color')->options(['red' => 'Red', 'white' => 'White', 'amber' => 'Amber', 'rose' => 'Rosé']),
                SelectFilter::make(name: 'making')->options(['classic' => 'Classic', 'qvevri' => 'Qvevri']),
                TrashedFilter::make(),

            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
