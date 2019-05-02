<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Models\Products\Stock;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StockController extends Controller
{

    public $response = [];

    public function index()
    {
        $stock = Stock::all();
        $response = [
            'message' => 'Successfully Data Fetch',
            'result' => $stock,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function create()
    {
        $stock = Stock::create([
            'name' => 'Banana',
            'price' => 300
        ]);
        $response = [
            'message' => 'Successfully Created',
            'result' => $stock,
        ];

        return response()->json($response, Response::HTTP_CREATED);
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


    public function edit(Stock $stock)
    {
        $stock = Stock::where('id', $stock->id)
            ->update([
                'name' => $stock->name,
                'price' => $stock->price
            ]);
        return response()->json($stock, Response::HTTP_OK);
    }


    public function update(Request $request, Stock $stock)
    {
        $stock = Stock::where('id', $stock->id)
            ->update([
                'name' => $stock->name,
                'price' => $stock->price
            ]);

        // store $request data

        $response = [
            'message' => 'Successfully Updated',
            'result' => $stock,
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
            'message' => 'Successfully Deleted',
            'result' => $stock,
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
