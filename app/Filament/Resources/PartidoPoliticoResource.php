<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartidoPoliticoResource\Pages;
use App\Filament\Resources\PartidoPoliticoResource\RelationManagers;
use App\Models\PartidoPolitico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartidoPoliticoResource extends Resource
{
    protected static ?string $model = PartidoPolitico::class;
    protected static ?string $navigationLabel = 'Partidos Politicos';

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationBadgeTooltip = 'El número de partidos politicos';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->modalWidth(MaxWidth::SevenExtraLarge)->slideOver(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPartidoPoliticos::route('/'),
            'create' => Pages\CreatePartidoPolitico::route('/create'),
            'edit' => Pages\EditPartidoPolitico::route('/{record}/edit'),
        ];
    }
}
