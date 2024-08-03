<?php

namespace App\Filament\Resources\ProgramaSocialResource\Pages;

use App\Filament\Resources\ProgramaSocialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\MaxWidth;

class EditProgramaSocial extends EditRecord
{
    protected static string $resource = ProgramaSocialResource::class;

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
