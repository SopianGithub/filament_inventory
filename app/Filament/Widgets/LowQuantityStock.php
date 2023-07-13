<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LowQuantityStock extends BaseWidget
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
            Tables\Columns\ImageColumn::make('foto_product'),
        ];
    }

    protected function isTablePaginationEnabled(): bool 
    {
        return false;
    } 
}
