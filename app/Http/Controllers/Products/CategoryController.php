<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Models\Products\Category;
use App\Http\Models\Products\Product;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        $category = Category::create($request->all());
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Store',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }


    public function show($id)
    {
        $category = Category::where('id', $id)->get();
        $response = [
            'status' => 'success',
            'message' => 'Successfully Show',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->update([
            'name' => $request['name'],
            'title' => $request['title'],
            'photo' => $request['photo'],
            'status' => $request['status'],
        ]);
        $response = [
            'status' => 'success',
            'message' => 'Successfully Updated',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function delete($id)
    {
        $category = Category::where('id', $id)->delete();
        $response = [
            'status' => 'success',
            'message' => 'Successfully Deleted',
            'data' => $category,
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    public function categoryWiseProducts()
    {
        $category = Category::with('products')->get();
        $response = [
            'status' => 'success',
            'message' => 'Successfully CategoryWiseProducts',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function categoryByProducts($categoryId)
    {
        $category = Category::with('products')
            ->where('categories.id', $categoryId)
            ->get();
        $response = [
            'status' => 'success',
            'message' => 'Successfully CategoryByProducts',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function categoryByCategoryIdAndProductId($categoryId, $productId)
    {
        $category = Category::with(['products' => function ($q) use ($productId) {
            // Query the name field in status table
            $q->where('products.id', '=', $productId); // '=' is optional

        }])->where('categories.id', $categoryId)->get();

        $response = [
            'status' => 'success',
            'message' => 'Successfully CategoryByCategoryIdAndProductId',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
