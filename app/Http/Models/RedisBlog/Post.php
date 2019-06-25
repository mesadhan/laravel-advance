<?php

namespace App\Http\Models\RedisBlog;

use App\Http\Controllers\RedisBlog\IBlogController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class Post extends Model implements IBlogController
{
    //
    protected $fillable = [
        'name',
        'price',
        'description'
    ];

    public $timestamps = true;

    public function customPost()
    {
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
            'data' => 'Maintain Custom Post From Here',
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
