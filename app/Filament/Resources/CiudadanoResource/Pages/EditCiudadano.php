<?php

namespace App\Filament\Resources\CiudadanoResource\Pages;

use App\Filament\Resources\CiudadanoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\MaxWidth;

class EditCiudadano extends EditRecord
{
    protected static string $resource = CiudadanoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
