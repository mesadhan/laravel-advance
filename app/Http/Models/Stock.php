<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = [
        'name',
        'price'
    ];

    public $timestamps = true;
}
