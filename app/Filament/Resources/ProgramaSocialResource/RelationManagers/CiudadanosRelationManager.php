<?php

namespace App\Filament\Resources\ProgramaSocialResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CiudadanosRelationManager extends RelationManager
{
    protected static string $relationship = 'ciudadanos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellido_paterno')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellido_materno')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->required(),

                Forms\Components\TextInput::make('edad')
                    ->numeric()
                    ->required()
                    ->maxLength(5),
                Forms\Components\Select::make('sexo')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('curp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('localidad_id')
                    ->relationship('localidad', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->default(null),
                Forms\Components\Textarea::make('direccion')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('programasSociales')
                    ->multiple()
                    ->preload()
                    ->relationship('programasSociales', 'nombre')
                    ->required(),


                Forms\Components\Select::make('padre_id')
                    ->relationship('padre', 'nombre')
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->nombre} {$record->apellido_paterno} {$record->apellido_materno}")
                    ->default(null),
                Forms\Components\Select::make('madre_id')
                    ->relationship('madre', 'nombre')
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->nombre} {$record->apellido_paterno} {$record->apellido_materno}")
                    ->default(null),
            ])
            ->columns(4);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_paterno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_materno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('curp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => $state === 'M' ? 'Masculino' : 'Femenino')
                    ->color(fn(string $state): string => match ($state) {
                        'M' => 'info',
                        'F' => 'primary',
                    }),
                Tables\Columns\TextColumn::make('padre.nombre')
                    ->sortable()
                    ->getStateUsing(fn($record) => $record->padre ? $record->padre->nombre . ' ' . $record->padre->apellido_paterno . ' ' . $record->padre->apellido_materno : 'N/A'),


                Tables\Columns\TextColumn::make('madre.nombre')
                    ->sortable()
                    ->getStateUsing(fn($record) => $record->madre ? $record->madre->nombre . ' ' . $record->madre->apellido_paterno . ' ' . $record->madre->apellido_materno : 'N/A'),

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
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->modalWidth(MaxWidth::SevenExtraLarge)->slideOver(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}