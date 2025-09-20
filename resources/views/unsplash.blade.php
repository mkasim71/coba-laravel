<h1>Hasil Pencarian Unsplash</h1>
@foreach($photos['results'] as $photo)
    <div>
        <img src="{{ $photo['urls']['small'] }}" alt="{{ $photo['alt_description'] }}">
    </div>
@endforeach
