<?php

namespace App\Filament\Resources\CiudadanoResource\Pages;

use App\Filament\Resources\CiudadanoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\MaxWidth;

class CreateCiudadano extends CreateRecord
{
    protected static string $resource = CiudadanoResource::class;
    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
