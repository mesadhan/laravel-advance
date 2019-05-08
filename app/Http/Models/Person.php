<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $fillable = [
        'name',
        'email'
    ];

    public $timestamps = true;
}
