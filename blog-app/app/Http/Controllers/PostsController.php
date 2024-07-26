<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view("posts.index",[
            'posts' => $posts
        ]);
    }

}
