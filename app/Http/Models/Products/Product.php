<?php

namespace App\Http\Models\Products;

use App\Http\Controllers\Products\IProductController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Product extends Model implements IProductController
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

    public function customProduct()
    {
        $response = [
            'status' => 'success',
            'message' => 'Maintain Custom Product From Here',
            'data' => $this->get()
        ];
        return response()->json($response, Response::HTTP_OK);

    }

}
