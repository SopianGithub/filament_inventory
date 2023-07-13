<?php

namespace App\Filament\Widgets;

use App\Models\Products;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class TopSellingStock extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return Products::query()
                    ->offset(0)
                    ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('product_name')->label('Product Name'),
            Tables\Columns\TextColumn::make('categories.name')
                ->label('Kategori Product'),
            Tables\Columns\TextColumn::make('quantity')->label('Quantity')
        ];
    }

    protected function isTablePaginationEnabled(): bool 
    {
        return false;
    } 
}
