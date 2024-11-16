<?php
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File; // Ensure File is imported
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\mainCategory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});
  
Route::get('posts/{post:slug}', function (Post $post) { //Post::where 'slug' == $post and return firstOrFail()
    // ddd($post);
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category}', function (Category $category){
    return view('post', [
        'post' => $category -> posts
    ]);
});