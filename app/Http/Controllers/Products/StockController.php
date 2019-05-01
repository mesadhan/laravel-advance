<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Models\Products\Stock;
use Exception;
use Illuminate\Http\Request;
use ReflectionClass;

class StockController extends Controller
{

    public $response = [];

    public function index()
    {
        $methodName = 'testMethod';
        $value = $this->$methodName();      // call dynamiclly testMethod() function
        return $value;
    }

    public function testMethod(){
        return 'Hello! From Test Method';
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Stock $stock)
    {
        //
    }


    public function edit(Stock $stock)
    {
        //
    }


    public function update(Request $request, Stock $stock)
    {
        //
    }

    public function destroy(Stock $stock)
    {
        //
    }

    public function acceptById($stockId)
    {
        //
        return $stockId;
    }
}
