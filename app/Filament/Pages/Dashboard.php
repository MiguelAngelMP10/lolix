<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }

    public function getWidgets(): array
    {
        return [
            Widgets\AccountWidget::class,
           // Widgets\FilamentInfoWidget::class,
        ];
    }
}