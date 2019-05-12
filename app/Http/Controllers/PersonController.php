<?php

namespace App\Http\Controllers;

use App\Http\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonController extends Controller
{
    public static $CACHE_KEY = "Person";

    public function index()
    {

        $orderBy = 'name';
        $cachedKey = 'index_'. PersonController::$CACHE_KEY;

        $results = Cache::remember($cachedKey, Carbon::now()->addMinute(5), function () use($orderBy) {
            return Person::orderBy($orderBy)->get();
        });

        return view('person')
            ->with('results', $results);
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
        Cache::forget('key');
    }
}


// https://laravel.com/docs/5.8/cache