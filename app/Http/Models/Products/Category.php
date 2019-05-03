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

    public $timestamps = true;
}
