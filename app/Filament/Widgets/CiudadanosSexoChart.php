<?php

namespace App\Filament\Widgets;

use App\Models\Ciudadano;
use Filament\Widgets\ChartWidget;

class CiudadanosSexoChart extends ChartWidget
{
    protected static ?string $heading = 'Ciudadanos por Sexo';
    protected static string $color = 'info';


    protected function getData(): array
    {
        $femenino = Ciudadano::where('sexo', 'F')->count();
        $masculino = Ciudadano::where('sexo', 'M')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Cantidad',
                    'data' => [$femenino, $masculino],
                    'backgroundColor' => ['#FF6384', '#36A2EB'],
                    'borderColor' => ['#FF6384', '#36A2EB'],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Femenino', 'Masculino'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'cutout' => '70%', // Adjust the doughnut's cutout percentage
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
            ],
        ];
    }

}
