<?php

namespace App\Filament\Resources\ProgramaSocialResource\Pages;

use App\Filament\Resources\ProgramaSocialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\MaxWidth;

class CreateProgramaSocial extends CreateRecord
{
    protected static string $resource = ProgramaSocialResource::class;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
