<?php

namespace App\Filament\Resources\ProductsResource\Widgets;

use App\Models\Categories;
use App\Models\Products;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\CustomCard;

class OverallInventory extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Categories', Categories::all()->count())
                ->description('Last 7 Days')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            CustomCard::make('Total Product')
                ->descReport(['Last 7 Days' => Products::all()->count(), 'Revenue' => 9999])
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            CustomCard::make('Top Selling')
                ->descReport(['Last 7 Days' => 99, 'Cost' => 9999])
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            CustomCard::make('Low Stock')
                ->descReport(['Orderes' => 99, 'Not In Stock' => 9999])
                ->descriptionIcon('heroicon-s-trending-down')
                ->color('danger'),
                
            // new \Illuminate\Support\HtmlString(),
        ];
    }
}
