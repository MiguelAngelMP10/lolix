<?php

namespace App\Filament\Resources\PartidoPoliticoResource\Pages;

use App\Filament\Resources\PartidoPoliticoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\MaxWidth;

class EditPartidoPolitico extends EditRecord
{
    protected static string $resource = PartidoPoliticoResource::class;

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
