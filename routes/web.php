<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

Route::get('/', function () {  
    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }

    return view('posts', [
        // NOTE: removed by adding protected $with = ['category', 'author']; to Post.php
        // 'posts' => Post::latest()->with(['category', 'author'])->get()
        'posts' => Post::latest()->get()
    ]);
    
});

// Route::get('/', function () {
//     return view('posts', [
//         'posts' => Post::all()
//     ]);
// });

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
   return view('posts', [
    // NOTE: removed by adding protected $with = ['category', 'author']; to Post.php
        'posts' => $category->posts
    ]); 
});

Route::get('authors/{author:username}', function (User $author) {
   return view('posts', [
        'posts' => $author->posts->load(['category', 'author'])
    ]); 
});