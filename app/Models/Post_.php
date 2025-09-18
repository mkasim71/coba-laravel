<?php

namespace App\Models;

class Post 
{
	private static $blog_posts = [
		[
        "title" => "Judul Tulisan Pertama",
				"slug" => "judul-tulisan-pertama",
        "author" => "Muhammad Kasim",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, adipisci, delectus tenetur ducimus rerum eum natus voluptate consequuntur accusamus velit tempore atque, minus consequatur! Sit odit eum tenetur eius consequatur, aliquid illum quasi! Amet, repellendus iure atque inventore corrupti placeat eos aperiam corporis nihil delectus! Optio quas velit quis? Reprehenderit laboriosam numquam id eum, et cum placeat deserunt in nesciunt a minus natus nulla impedit cumque dolorem, nisi quos repellendus? Dignissimos in modi nam impedit officia, explicabo eum vel ea."
    ],
    [
        "title" => "Judul Tulisan Kedua",
				"slug" => "judul-tulisan-kedua",
        "author" => "Dini Praptiwi",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum necessitatibus optio amet ratione obcaecati pariatur ullam illo et dolor, impedit sunt alias similique, reprehenderit officia expedita unde. Error quis laboriosam corrupti architecto odit exercitationem quidem ab alias velit? Magnam vel consectetur facere consequatur hic ut culpa non obcaecati? Quisquam explicabo quo ea impedit. Praesentium odit quos consectetur impedit exercitationem saepe. Molestias dolor impedit aliquid omnis possimus, necessitatibus vel culpa nemo soluta veniam. Cum sunt optio praesentium quaerat, nobis magnam molestias corporis magni doloremque aliquam, dignissimos illo unde voluptate maiores nostrum voluptatum at expedita nihil harum ut aperiam fugit. Ipsa, ducimus."
    ]
	];

	public static function all()
	{
		return collect(self::$blog_posts);
	}

	public static function find($slug)
	{
		$posts = static::all();
		// $post = [];
		// foreach($posts as $p) {
		// 	if($p["slug"] === $slug) {
		// 		$post = $p;
		// 	}
		// }
		return $posts->firstWhere('slug', $slug);
	}
}
