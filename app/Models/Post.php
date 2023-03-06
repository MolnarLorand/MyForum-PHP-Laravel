<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with =['category', 'author']; //give me the posts with along with this default relationships

    public function scopeFilter($query, array $filters)
    { //Post::newQuery()->filter()
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)));//give me those that have a category, specifically where the category slug match what the user requested($category)

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
            $query->where('username', $author)));

        /*            $query
            ->whereExists(fn($query)=>
                $query->from('categories')
                    ->whereColumn('categories.id', 'posts.category_id')
                    ->where('categories.slug', $category))*/   //i can use this also




/*        if($filters['search'] ?? false){ //?? ->handle situation where we don't have search key
            //if(request('search'))  ->if we have something in the search then->
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }*/
    }
/*    protected $guarded = ['id']; //everything is fillable except those*/   //i did this in appServiceProvider
    //protected $fillable = ['title','fragment','body', 'id']; //just those are fillable

    public function comments() //fk -> user_id
    {
        return $this->hasMany(Comment::class);
    }


    public function category(){
        //hasOne, hasMany, belongsTo, belongsToMany -> types
        //a post belongsTo a category
        return $this->belongsTo(Category::class);
    }

    public function author() //fk -> user_id
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
