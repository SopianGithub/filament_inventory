<?php

namespace App\Filament\Widgets;

use Archetype\Endpoints\PHP\Make;
use Filament\Widgets\StatsOverviewWidget\Card;

use SolutionForest\GridLayoutPlugin\Components\Grid;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use SolutionForest\GridLayoutPlugin\Components\Grid\Row;
use SolutionForest\GridLayoutPlugin\Components\Grid\Column;

use SoftyanSolutions\LayoutSoft\Components\CardChart;
use SoftyanSolutions\LayoutSoft\Components\ChartOverview;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            // Grid::make()->schema(
            //   [
            //     Row::make([
            //         Column::make(
            //             2,
            //             ChartOverview::make('Sales', '11')
            //                 ->icon('heroicon-s-shopping-bag') 
            //                 ->iconColor('success') 
            //         ),
            //         Column::make(
            //             2,
            //             ChartOverview::make('Revenue', '11')
            //                 ->icon('heroicon-s-briefcase')  
            //                 ->iconColor('primary')
            //         ),
            //         Column::make(
            //             2,
            //             ChartOverview::make('Profit', '11')
            //                 ->icon('heroicon-s-currency-dollar')  
            //                 ->iconColor('primary')
            //         ),
            //         Column::make(
            //             2,
            //             ChartOverview::make('Cost', '11')
            //                 ->icon('heroicon-s-calculator')  
            //                 ->iconColor('danger')
            //         ), 
            //     ]),
            // ]),
            Grid::make()->schema([
                Row::make([
                    Column::make(
                        8,
                        CardChart::make('Sales Overview')->schema([
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
                        CardChart::make('Summary Inventory')->schema([
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
