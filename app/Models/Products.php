<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;

    protected $tableName = "products";

    protected $fillable = [
        'product_name',
        'foto_product',
        'categories_id',
        'buying_price',
        'quantity',
        'unit',
        'buying_date',
        'expired_date',
        'threshold'
    ];

    public function categories(): BelongsTo 
    { 
        return $this->belongsTo(Categories::class); 
    } 

}
