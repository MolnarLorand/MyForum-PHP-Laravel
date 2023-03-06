<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    // usually stick with 7 restfull actions-> index,show,create,store,edit,update,destroy
    public function index(){
        return View('posts.index',[
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
       $attributes = request()->validate([
            'title'=>'required',
            'thumbnail'=>['required', 'image'],
            'slug'=>['required', Rule::unique('posts','slug')],
            'body'=>'required',
            'fragment'=>'required',
            'category_id'=>['required', Rule::exists('categories','id')]
        ]);

       $attributes['user_id'] = auth()->id();
       $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails','public');

       Post::create($attributes);

       return redirect('/');

        /*        $path = request()->file('thumbnail')->store('thumbnails','public');

         return 'Done: ' . $path;*/
    }
}
