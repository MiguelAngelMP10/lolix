<?php

namespace App\Filament\Resources\LocalidadResource\Pages;

use App\Filament\Resources\LocalidadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\MaxWidth;

class EditLocalidad extends EditRecord
{
    protected static string $resource = LocalidadResource::class;

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
