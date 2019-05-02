<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Models\Products\Stock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{

    public $response = [];

    public function index()
    {
        $stock = Stock::all();
        $response = [
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
            'data' => $stock,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        $stock = Stock::create($request->all());

        return response()->json($stock, Response::HTTP_CREATED);
    }


    public function show(Stock $stock)
    {
        $stock = Stock::where('id', $stock->id)->get;
        return response()->json($stock, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {

        $stock = Stock::where('id', $id)->update([
            'name' => $request['name'],
            'price' => $request['price']
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Successfully Updated',
            'data' => $stock,
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    public function destroy(Stock $stock)
    {
        $stock = Stock::where('id', $stock->id)
            ->update([
                'name' => $stock->name,
                'price' => $stock->price
            ]);

        $response = [
            'status' => 'success',
            'message' => 'Successfully Deleted',
            'data' => $stock,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function getDBInfo()
    {
        return env('DB_DATABASE', database_path('database.sqlite'));
    }

    // reflection example
    public function acceptById($stockId)
    {
        $methodName = 'testMethod';
        $value = $this->$methodName();      // call dynamically testMethod() function
        return $value;
    }

    public function testMethod()
    {
        return 'Hello! From Test Method';
    }

}
