<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts'=>Post::paginate(50)
        ]);
    }

    public function create(){
        return view('admin.posts.create');
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

    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post){
        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail'=>'image',
            'slug'=>['required', Rule::unique('posts','slug')->ignore($post->id)],
            'body'=>'required',
            'fragment'=>'required',
            'category_id'=>['required', Rule::exists('categories','id')]
        ]);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated Successfully');
    }

    public function destroy(Post $post){
        $post->delete();

        return back()->with('success', 'Post Deleted');

    }
}
