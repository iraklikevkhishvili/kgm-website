<?php

namespace App\Filament\Resources\Wines;

use App\Filament\Resources\Wines\Pages\CreateWine;
use App\Filament\Resources\Wines\Pages\EditWine;
use App\Filament\Resources\Wines\Pages\ListWines;
use App\Filament\Resources\Wines\Pages\ViewWine;
use App\Filament\Resources\Wines\Schemas\WineForm;
use App\Filament\Resources\Wines\Tables\WinesTable;
use App\Models\Wine;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class WineResource extends Resource
{
    protected static ?string $model = Wine::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return WineForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WinesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWines::route('/'),
            'create' => CreateWine::route('/create'),
            'view'   => ViewWine::route('/{record}'),
            'edit' => EditWine::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
