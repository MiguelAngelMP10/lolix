<?php

namespace App\Filament\Resources\LocalidadResource\Pages;

use App\Filament\Resources\LocalidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

class ListLocalidads extends ListRecords
{
    protected static string $resource = LocalidadResource::class;

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
