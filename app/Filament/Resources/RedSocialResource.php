<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedSocialResource\Pages;
use App\Filament\Resources\RedSocialResource\RelationManagers;
use App\Models\RedSocial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RedSocialResource extends Resource
{
    protected static ?string $model = RedSocial::class;
    protected static ?string $breadcrumb = 'Redes Sociales';
    protected static ?string $navigationLabel = 'Redes Sociales';
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationBadgeTooltip = 'El número de redes sociales';
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
            'index' => Pages\ListRedSocials::route('/'),
            'create' => Pages\CreateRedSocial::route('/create'),
            'edit' => Pages\EditRedSocial::route('/{record}/edit'),
        ];
    }
}
