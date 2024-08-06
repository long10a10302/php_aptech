<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::with('user')->get();
        return view("posts.index", [
        'posts' => $posts
    ]);
}

    public function add(){
       return view("posts.create");
    }
    public function store(Request $request){
        $post = new Post;
        $post->title = $request->input('title');
        $post ->content = $request->input('body');
        $post ->user_id = $request->input('user_id');
        $post->save();
        return redirect()->route('post.all')->with('status','Them bai viet thanh cong');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    
    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post -> content = $request->input('body');
        $post->update();
        return redirect()->route('post.all')->with('status','Cap nhat bai viet thanh cong');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('status','Xoa bai viet thanh cong');
    }
}
