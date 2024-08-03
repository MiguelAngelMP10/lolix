<?php

namespace App\Filament\Resources\LocalidadResource\Pages;

use App\Filament\Resources\LocalidadResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\MaxWidth;

class CreateLocalidad extends CreateRecord
{
    protected static string $resource = LocalidadResource::class;
    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
