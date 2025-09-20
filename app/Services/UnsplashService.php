<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class UnsplashService
{
    protected $baseUrl = 'https://api.unsplash.com/';

    public function searchPhotos($query, $perPage = 10)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_KEY'),
        ])->get($this->baseUrl . 'search/photos', [
            'query' => $query,
            'per_page' => $perPage,
        ]);

        return $response->json();
    }

    public function randomPhoto($query = null)
    {

        $cacheKey = 'unsplash_random_' .md5($query);


        return Cache::remember($cacheKey, now()->addHours(1), function () use ($query) {
            $response = Http::withHeaders([
                'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_KEY'),
            ])->get($this->baseUrl . 'photos/random', [
                'query' => $query,
            ]);

            return $response->json();
        });
    }


    // public function randomPhoto($query = null)
    // {

    //     // $cacheKey = 'unsplash_random_' .md5($query);


    //     $response = Http::withHeaders([
    //         'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_KEY'),
    //     ])->get($this->baseUrl . 'photos/random', [
    //         'query' => $query,
    //     ]);

    //     return $response->json();
    // }

}
