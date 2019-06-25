<?php

namespace App\Http\Controllers\RedisBlog;

use App\Http\Controllers\Controller;
use App\Http\Models\RedisBlog\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    public $response = [];


    public $posts;
    // dependency injection
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function posts() {
        return $this->posts->customPost();
    }




}
