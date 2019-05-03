<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'title',
        'price',
        'photo',
        'category_id',
        'description',
        'status',
    ];

    public $timestamps = true;
}
