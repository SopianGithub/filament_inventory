<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Filament\Resources\ProductsResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\ProductsResource\Widgets\OverallInventory;
use App\Models\Categories;
use App\Models\Products;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';


    protected static ?string $navigationGroup = 'Inventory';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('categories_id')
                    ->label('Category')
                    ->options(Categories::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('product_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto_product')
                    ->label('Foto Product')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->uploadProgressIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right')
                    ->loadingIndicatorPosition('left')
                    ->storeFileNamesIn('attachment_file_names')
                    ->directory('form-attachments')
                    ->disk('public'),
                Forms\Components\TextInput::make('buying_price')
                    ->prefix('Rp')
                    ->numeric()
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask 
                        ->numeric()
                        ->decimalSeparator(',')
                        ->thousandsSeparator('.')
                    )
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask 
                        ->numeric()
                        ->decimalSeparator(',')
                        ->thousandsSeparator('.')
                    ),
                Forms\Components\Select::make('unit')
                    ->label('Unit')
                    ->options([
                        'Pcs',
                        'Box',
                        'Exsemplar'
                    ])
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('buying_date')
                    ->required(),
                Forms\Components\DatePicker::make('expired_date')
                    ->minDate(now())
                    ->required(),
                Forms\Components\TextInput::make('threshold')
                    ->required()
                    ->suffix('%')
                    ->numeric()
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask 
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(100)
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categories.name'),
                Tables\Columns\TextColumn::make('product_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_product'),
                Tables\Columns\TextColumn::make('buying_price'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('unit'),
                Tables\Columns\TextColumn::make('buying_date')
                    ->date(),
                Tables\Columns\TextColumn::make('expired_date')
                    ->date(),
                Tables\Columns\TextColumn::make('threshold'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            OverallInventory::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }    
}
