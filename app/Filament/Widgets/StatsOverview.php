<?php

namespace App\Filament\Widgets;

use App\Models\Ciudadano;
use App\Models\Localidad;
use App\Models\PartidoPolitico;
use App\Models\ProgramaSocial;
use App\Models\RedSocial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de ciudadanos registrados', Ciudadano::count())
                ->icon('heroicon-o-user-group'),
            Stat::make('Total de localidades registrados', Localidad::count())->icon('heroicon-o-map-pin'),
            Stat::make('Total de programas sociales registrados', ProgramaSocial::count())->icon('heroicon-o-presentation-chart-line'),
            Stat::make('Total de partidos politicos', PartidoPolitico::count())->icon('heroicon-o-arrow-trending-up'),
            Stat::make('Total de redes sociales', RedSocial::count())->icon('heroicon-o-globe-alt'),
        ];
    }
}
