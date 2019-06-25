<?php

namespace App\Http\Models\Products;

use App\Http\Controllers\Products\IStockController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class Stock extends Model implements IStockController
{
    //
    protected $fillable = [
        'name',
        'price'
    ];

    public $timestamps = true;

    public function customStock()
    {
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
            'data' => 'Maintain Custom Stock From Here',
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
