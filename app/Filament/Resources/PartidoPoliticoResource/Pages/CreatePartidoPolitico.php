<?php

namespace App\Filament\Resources\PartidoPoliticoResource\Pages;

use App\Filament\Resources\PartidoPoliticoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\MaxWidth;

class CreatePartidoPolitico extends CreateRecord
{
    protected static string $resource = PartidoPoliticoResource::class;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
