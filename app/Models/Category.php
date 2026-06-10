<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    | Field yang boleh diisi menggunakan
    | create() atau update()
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'name',
        'description'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi One To Many
    |--------------------------------------------------------------------------
    | Satu kategori memiliki banyak barang
    |--------------------------------------------------------------------------
    */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
