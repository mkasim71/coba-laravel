<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // ini yang bisa di isi
    // protected $fillable = ['title', 'excerpt', 'body'];

    // ini tidak boleh diisi
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // scope untuk search
    // public function scopeFilter($query, array $filters)
    // {
    //   // cek apakah ada search di request
		// 	if ($filters['search'] ?? false) {
		// 		$search = $filters['search'];

		// 		$query->where('title', 'like', '%' . $search . '%' )
		// 			  ->orWhere('body', 'like', '%' . $search . '%')
		// 				->orWhereHas('category', function($q) use ($search) {
		// 					$q->where('name', 'like', '%' . $search . '%');
		// 				})
		// 				->orWhereHas('author', function($q) use ($search) {
		// 					$q->where('name', 'like', '%' . $search . '%');
		// 				});
		// 	}
    // }

		// pakai method when(), gabung ke scopeFilter
		// public function scopeFilter($query, array $filters)
		// {
		// 	// filter search
		// 	$query->when($filters['search'] ?? false, function ($query, $search) {
		// 		return $query->where(function ($q) use ($search){
		// 			$q->where('title', 'like', '%' . $search . '%')
		// 			  ->orWhere('body', 'like', '%' . $search . '%')
		// 				->orWhereHas('category', function ($q) use ($search) {
		// 					$q->where('name', 'like', '%' . $search . '%');
		// 				})
		// 				->orWhereHas('author', function ($q) use ($search) {
		// 					$q->where('name', 'like', '%' . $search . '%');
		// 				});
		// 		}); 
		// 	});
		// }
		public function scopeFilter($query, array $filters)
		{
			$query->when($filters['search'] ?? false, function($query, $search) {
				return $query->where('title', 'like', '%' . $search . '%')
				             ->orWhere('body', 'like', '%' . $search . '%');
			});

			// callback
			$query->when($filters['category'] ?? false, function($query, $category) {
				return $query->whereHas('category', function($query) use ($category) {
					$query->where('slug', $category);
				});
			}); 

			// arrow function
			$query->when($filters['author'] ?? false, fn($query, $author) => 
				$query->whereHas('author', fn($query) =>
					$query->where('username', $author)
				)
			);
		}

}
