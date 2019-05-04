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

    // belongsTo for establish reverse relationship
    // Product hasOne or belongsTo Category
    // without belongsTo relationship works fine.
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public $timestamps = true;

}
