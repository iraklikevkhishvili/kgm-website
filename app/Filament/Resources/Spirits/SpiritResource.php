<?php

namespace App\Filament\Resources\Spirits;

use App\Filament\Resources\Spirits\Pages\CreateSpirit;
use App\Filament\Resources\Spirits\Pages\EditSpirit;
use App\Filament\Resources\Spirits\Pages\ListSpirits;
use App\Filament\Resources\Spirits\Pages\ViewSpirit;
use App\Filament\Resources\Spirits\Schemas\SpiritForm;
use App\Filament\Resources\Spirits\Schemas\SpiritInfolist;
use App\Filament\Resources\Spirits\Tables\SpiritsTable;
use App\Models\Spirit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpiritResource extends Resource
{
    protected static ?string $model = Spirit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Spirit';

    public static function form(Schema $schema): Schema
    {
        return SpiritForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SpiritInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpiritsTable::configure($table);
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
            'index' => ListSpirits::route('/'),
            'create' => CreateSpirit::route('/create'),
            'view' => ViewSpirit::route('/{record}'),
            'edit' => EditSpirit::route('/{record}/edit'),
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
