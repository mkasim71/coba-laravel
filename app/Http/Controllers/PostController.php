<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\UnsplashService;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
	protected $unsplash;

	public function __construct(UnsplashService $unsplash)
	{	
		$this->unsplash = $unsplash;
	}

	public function index()
	{
		// ->with(['category', 'author'])
		$title = '';

		if (request('category')) {
			$category = Category::firstWhere('slug', request('category'));
			$title = ' in ' . $category->name;
		}

		if (request('author')) {
			$author = User::firstWhere('username', request('author'));
			$title = ' by ' . $author->name;
		}
		
		$posts = Post::latest()
						 ->filter(request(['search', 'category', 'author']))
						 ->paginate(7)->withQueryString();
		
		// ambil foto Unsplash
		$photos = [];
		if ($posts->count()) {
			foreach ($posts as $post) {
				$photos[$post->id] = $this->unsplash->randomPhoto($post->category->name);
		}
		}

		return view('posts', [
			"title" => "All Posts" . $title,
			"active" => 'posts',
			"photos" => $photos,
			"posts" => $posts
		]);
	}

	public function show(Post $post, UnsplashService $unsplash)
	{
		// $photo = $unsplash->randomPhoto($post->category->name);
		// bikin cache key unik untuk setiap post
		$cacheKey = "unsplash_post_{$post->id}";

		$photo = Cache::remember($cacheKey, now()->addHours(6), function () use ($unsplash, $post) {
			return $unsplash->randomPhoto($post->category->name);
		});

		return view('post', [
			"title" => "Single Post",
			"active" => 'posts',
			"post" => $post,
			"photo" => $photo
    	]);
	}

}
