<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Field yang boleh diisi
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'category_id',
        'name',
        'photo',
        'stock',
        'minimum_stock',
        'unit',
        'selling_price',
        'purchase_price',
        'weight_size',
        'storage_location',
        'description'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi Many To One
    |--------------------------------------------------------------------------
    | Barang dimiliki satu kategori
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
