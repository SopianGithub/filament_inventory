<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class SalesChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'salesChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Sales & Purchase';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series'=> [[
                'name'=> 'Purchase',
                'data'=> [44, 55, 57, 56, 61, 58, 63, 60, 66]
                ], [
                'name'=> 'Sales',
                'data'=> [76, 85, 101, 98, 87, 105, 91, 114, 94]
                ], [
                'name'=> 'Revenue',
                'data'=> [35, 41, 36, 26, 45, 48, 52, 53, 41]
            ]],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            ],
            'yaxis' => [
                'title'=> [
                    'text'=> '$ (thousands)'
                ],
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'stroke'=> [
                'show'=> true,
                'width'=> 2,
                'colors'=> ['transparent']
            ],
            'colors' => ['#6366f1', '#50E7A6', '#FEBC4A'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => false,
                    'columnWidth'=> '55%',
                    'endingShape'=> 'rounded'
                ],
            ],
        ];
    }
}
