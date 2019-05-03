<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model
{

    protected $table = 'samples';
    protected $fillable = [
        'name',
        'price'
    ];

    public $timestamps = true;
}
