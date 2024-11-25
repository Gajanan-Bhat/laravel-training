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
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=> 
                 $query->where(fn($query) =>
                    $query->where('title', 'like', '%' . 'search' . '%')
                     ->orWhere('body', 'like', '%' . 'search' . '%')
                 )
    );
                $query->when($filters['category'] ?? false, fn($query, $category)=> 
                $query
                    ->when( $filters['category'] ?? false, fn($query, $category)=>
                    $query->whereHas('category', fn($query) => 
                    $query->where('slug', $category))
                )
            );

            $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
            $query->where('username' , '$author')
                )
            );
            }
    
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
