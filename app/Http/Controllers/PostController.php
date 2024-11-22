<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        if(request('search')){
            $posts = Post::latest();
            $posts
            ->where('title', 'like', '%' .request('search').'%')
            ->orWhere('body', 'like', '%' .request('search').'%');
        }
        return view('posts', [
           'posts' => $posts->get(),
           'categories' => Category::all()
        ]);
    }
    public function show(Post $post){
        return view('post', [
            'post' => $post
        ]);
    }
}
