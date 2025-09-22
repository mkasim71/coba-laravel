@extends('dashboard.layouts.main')


@section('container')

	<div class="container">
		<div class="row my-3">
			<div class="col-lg-8">
				<h1 class="mb-3">{{ $post->title }}</h1>

        <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
        <a href="/dashboard/posts" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <a href="/dashboard/posts" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</a>
				
				<img src="{{ $photos['urls']['full'] }}" 
				alt="{{ $photos['alt_description'] ?? 'Random Unsplash Photo' }}" 
				class="img-fluid mt-3">
				
				<article class="my-3 fs-5">
					{!! $post->body !!}
				</article>

				{{-- <a href="/dashboard/posts" class="d-block mt-3">Back to Posts</a> --}}
			</div>
		</div>
	</div>


@endsection