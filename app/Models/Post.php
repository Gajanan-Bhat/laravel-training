<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'author'];
    //protected $fillable = ['title', 'excerpt','body','id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function  author()
    {
        return $this->belongsTo(User::class, 'user_id');
    } 
    
public function index()
{
    $posts = Post::latest()->get(); // Example: Retrieve all posts ordered by creation date.
    return view('your-view-name', compact('posts'));
}

}
