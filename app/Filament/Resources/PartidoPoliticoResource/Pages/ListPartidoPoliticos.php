<?php

namespace App\Filament\Resources\PartidoPoliticoResource\Pages;

use App\Filament\Resources\PartidoPoliticoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

class ListPartidoPoliticos extends ListRecords
{
    protected static string $resource = PartidoPoliticoResource::class;
    protected ?string $heading = 'Partidos Politicos';
    protected static ?string $title = 'Partidos Politicos';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
