<?php

namespace App\Filament\Widgets;

use App\Models\Ciudadano;
use Filament\Widgets\ChartWidget;


class CiudadanosPorEdadChart extends ChartWidget
{
    protected static ?string $heading = 'Ciudadanos por Edad';

    protected function getData(): array
    {


        $ciudadanosPorEdad = Ciudadano::selectRaw('edad, COUNT(*) as count')
            ->groupBy('edad')
            ->get()
            ->pluck('count', 'edad')
            ->toArray();


        $colors = [
            '#F0F8FF', '#FAEBD7', '#E6E6FA', '#FFF0F5', '#F5F5DC', '#FFE4C4', '#FFF8DC', '#F5F5F5', '#DCDCDC', '#F8F8FF',
            '#F0FFF0', '#FFFFF0', '#E0FFFF', '#F0FFFF', '#F5FFFA', '#FDF5E6', '#FFEFD5', '#FFDAB9', '#E6E6FA', '#FFF0F5',
            '#FAF0E6', '#FFF5EE', '#F5F5F5', '#F0F8FF', '#FAEBD7', '#E6E6FA', '#FFF0F5', '#F5F5DC', '#FFE4C4', '#FFF8DC',
            '#F5F5F5', '#DCDCDC', '#F8F8FF', '#F0FFF0', '#FFFFF0', '#E0FFFF', '#F0FFFF', '#F5FFFA', '#FDF5E6', '#FFEFD5',
            '#FFDAB9', '#E6E6FA', '#FFF0F5', '#FAF0E6', '#FFF5EE', '#F5F5F5', '#F0F8FF', '#FAEBD7', '#E6E6FA', '#FFF0F5',
            '#F5F5DC', '#FFE4C4', '#FFF8DC', '#F5F5F5', '#DCDCDC', '#F8F8FF', '#F0FFF0', '#FFFFF0', '#E0FFFF', '#F0FFFF',
            '#F5FFFA', '#FDF5E6', '#FFEFD5', '#FFDAB9', '#E6E6FA', '#FFF0F5', '#FAF0E6', '#FFF5EE', '#F5F5F5', '#F0F8FF',
            '#FAEBD7', '#E6E6FA', '#FFF0F5', '#F5F5DC', '#FFE4C4', '#FFF8DC', '#F5F5F5', '#DCDCDC', '#F8F8FF', '#F0FFF0',
            '#FFFFF0', '#E0FFFF', '#F0FFFF', '#F5FFFA', '#FDF5E6', '#FFEFD5', '#FFDAB9', '#E6E6FA', '#FFF0F5', '#FAF0E6',
            '#FFF5EE', '#F5F5F5', '#F0F8FF', '#FAEBD7', '#E6E6FA', '#FFF0F5', '#F5F5DC', '#FFE4C4', '#FFF8DC', '#F5F5F5'
        ];


        return [
            'datasets' => [
                [
                    'label' => 'Cantidad',
                    'data' => array_values($ciudadanosPorEdad),
                    'backgroundColor' => $colors,
                    'borderColor' => $colors,
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_keys($ciudadanosPorEdad),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'beginAtZero' => true,
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
