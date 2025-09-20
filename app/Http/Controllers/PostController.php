<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\UnsplashService;
use App\Models\Category;
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
		$posts = Post::latest()->with(['category', 'author'])->get();

		$photos = [];

		foreach ($posts as $post) {
			$photos[$post->id] = $this->unsplash->randomPhoto($post->category->name);
		}

		return view('posts', [
			"title" => "All Posts",
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
