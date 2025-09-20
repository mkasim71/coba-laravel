<?php

namespace App\Http\Controllers;

use App\Services\UnsplashService;

class UnsplashController extends Controller
{
    protected $unsplash;

    public function __construct(UnsplashService $unsplash)
    {
        $this->unsplash = $unsplash;
    }

    public function search()
    {
        $photos = $this->unsplash->searchPhotos('nature', 5);

        return view('unsplash', compact('photos'));
    }

    public function random()
    {
        $photo = $this->unsplash->randomPhoto('programming');

        return view('unsplash-random', compact('photo'));
    }
}
