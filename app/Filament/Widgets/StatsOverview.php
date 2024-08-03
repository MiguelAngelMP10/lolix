<?php

namespace App\Filament\Widgets;

use App\Models\Ciudadano;
use App\Models\Localidad;
use App\Models\ProgramaSocial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de ciudadanos registrados', Ciudadano::count()),
            Stat::make('Total de localidades registrados', Localidad::count()),
            Stat::make('Total de programas sociales registrados', ProgramaSocial::count()),
        ];
    }
}
