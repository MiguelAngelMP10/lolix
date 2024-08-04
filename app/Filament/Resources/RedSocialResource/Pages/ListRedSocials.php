<?php

namespace App\Filament\Resources\RedSocialResource\Pages;

use App\Filament\Resources\RedSocialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

class ListRedSocials extends ListRecords
{
    protected static string $resource = RedSocialResource::class;

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

    protected ?string $heading = 'Redes Sociales';
    protected static ?string $title = 'Redes Sociales';
}
