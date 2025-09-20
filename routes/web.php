<?php

use App\Models\Category;
use App\Services\UnsplashService;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UnsplashController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Muhammad Kasim",
        "email" => "mkasim77@gmail.com",
        "image" => "mkasim.jpg"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);


// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function() {
    $categories = Category::all();

    $unsplash = new UnsplashService();
    $photos = [];
    foreach ($categories as $category) {
        $photos[$category->id] = $unsplash->randomPhoto($category->name);
    }


return view('categories', [
        'title' => 'Post Categories',
        "active" => 'categories',
        'photos' => $photos,
        'categories' => $categories
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category) {

//     $unsplash = new UnsplashService();
//     $posts = $category->posts->load('author', 'category');
//     $photos = [];

//     foreach ($posts as $post) {
// 		$photos[$post->id] = $unsplash->randomPhoto($post->category->name);
// 	}
    
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         "active" => 'categories',
//         'photos' => $photos,
//         'posts' => $posts,
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) {

//     $unsplash = new UnsplashService();
//     $posts = $author->posts->load('category','author');
//     $photos = [];

//     foreach ($posts as $post) {
// 		$photos[$post->id] = $unsplash->randomPhoto($post->category->name);
// 	}
    
//     return view('posts', [
//         'title' =>"Post By Author : $author->name",
//         'active' => 'posts',
//         'photos' => $photos,
//         'posts' => $posts,
//     ]);
// });

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// Route::get('/categories/{category:slug}', [PostController::class, 'showCategory']);


Route::get('/unsplash/search', [UnsplashController::class, 'search']);
Route::get('/unsplash/random', [UnsplashController::class, 'random']);

// Login
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
