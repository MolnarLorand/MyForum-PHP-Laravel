<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PostController::class, 'index'])->name('home');

Route::get("/posts/{post:slug}",[PostController::class, 'show']);

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('login',[SessionsController::class, 'store'])->middleware('guest');

Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');


/*Route::get('/posts/{post:slug}', function (Post $post) { //{post} --> this is a wildcard
   //find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => $post
        ]);
});*/

/*Route::get('categories/{category:slug}', function (Category $category){
    return view('posts',[
        'posts' => $category->posts,   //->load(['category','author'])
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');*/  //change in _post-header the href if you want to use this instead of what you did in the Post class

/*Route::get('authors/{author:username}', function (User $author){
    return view('posts.index',[
        'posts' => $author->posts,  //->load(['category','author'])   -> i use $with in post model instead of this
    ]);
});*/   //-> in Post.php i used $query instead of this!



