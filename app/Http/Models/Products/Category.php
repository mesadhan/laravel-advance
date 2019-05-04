<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'title',
        'photo',
        'status',
    ];


    // Category hasMany Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public $timestamps = true;


}
