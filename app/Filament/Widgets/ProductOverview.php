<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use SolutionForest\GridLayoutPlugin\Components\Grid;
use SoftyanSolutions\LayoutSoft\Components\CardChart;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use SolutionForest\GridLayoutPlugin\Components\Grid\Row;
use SoftyanSolutions\LayoutSoft\Components\ChartOverview;
use SolutionForest\GridLayoutPlugin\Components\Grid\Column;

class ProductOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Grid::make()->schema([
                Row::make([
                    Column::make(
                        8,
                        CardChart::make('Product Overview')->schema([
                            ChartOverview::make('Sales', '11')
                                ->icon('heroicon-s-shopping-bag') 
                                ->iconColor('success'),
                            ChartOverview::make('Revenue', '11')
                                ->icon('heroicon-s-briefcase') 
                                ->iconColor('primary'),
                            ChartOverview::make('Profit', '11')
                                ->icon('heroicon-s-currency-dollar') 
                                ->iconColor('success'),
                            ChartOverview::make('Cost', '11')
                                ->icon('heroicon-s-calculator') 
                                ->iconColor('danger'), 
                        ])
                    ),
                    Column::make(
                        4,
                        CardChart::make('Summary Product')->schema([
                            ChartOverview::make('On Hand', '11')
                                ->icon('heroicon-s-shopping-bag') 
                                ->iconColor('success'),
                            ChartOverview::make('Tobe', '11')
                                ->icon('heroicon-s-briefcase') 
                                ->iconColor('primary'),
                        ])
                    )
                ])
            ]),
        ];
    }
}
