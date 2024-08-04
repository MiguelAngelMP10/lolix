<?php

namespace App\Filament\Resources\RedSocialResource\Pages;

use App\Filament\Resources\RedSocialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\MaxWidth;

class CreateRedSocial extends CreateRecord
{
    protected static string $resource = RedSocialResource::class;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }

}
