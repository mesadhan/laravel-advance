<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Models\Products\Product;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{

    public function index()
    {

        $faker = Factory::create();
        $image = $faker->image(public_path(Config::get('assets.images')), 200, 200, false);
        return $image;

        return response()->json('Hello!. From Product', Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        //
    }
}
