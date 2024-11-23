<?php
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\DB;
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

Route::get('/', [PostController::class,'index'])->name('home');
Route::get('posts/{post:slug}',[PostController::class,'show']);
        
Route::get('authors/{author:username}', function(User $author){
    return view('posts.index', [
        'posts' => $author -> posts,
      
    ]);
});