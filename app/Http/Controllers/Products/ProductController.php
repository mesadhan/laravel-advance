<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Models\Products\Category;
use App\Http\Models\Products\Product;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        $faker = Factory::create();
        $image_name = $faker->image(public_path(Config::get('assets.images')), 200, 200, false);

        $product = Product::create([
            'name' => $request->name,
            'title' => $request->title,
            'price' => $request->price,
            'photo' => $image_name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Successfully Store',
            'data' => $product,
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }


    public function show($id)
    {
        $product = Product::where('id', $id)->get();
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Show',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {
        $faker = Factory::create();
        $image_name = $faker->image(public_path(Config::get('assets.images')), 200, 200, false);

        $product = Product::where('id', $id)->first();
        File::delete($product['photo']);

        $product = Product::where('id', $id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'price' => $request->price,
            'photo' => $image_name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Successfully Update',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        File::delete($product['photo']);

        $product = Product::where('id', $id)->delete();
        $response = [
            'status' => 'success',
            'message' => 'Successfully deleted',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function productWiseCategory()
    {
        $product = Product::with('category')->get();
        $response = [
            'status' => 'success',
            'message' => 'Successfully productWiseCategory',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function productByCategory($productId)
    {
        $product = Product::with('category')
            ->where('products.id', $productId)
            ->get();
        $response = [
            'status' => 'success',
            'message' => 'Successfully ProductByCategory',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function productByCategoryIdAndProductId($categoryId, $productId)
    {
        $category = Product::with(['category' => function ($q) use ($categoryId) {
            // Query the name field in status table
            $q->where('categories.id', '=', $categoryId); // '=' is optional

        }])->where('products.id', $productId)->get();

        $response = [
            'status' => 'success',
            'message' => 'Successfully ProductByCategoryIdAndProductId',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
