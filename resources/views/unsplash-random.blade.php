{{-- @dd($photo) --}}
<!DOCTYPE html>
<html>
<head>
    <title>Unsplash Random</title>
</head>
<body>
    <h1>Foto Random dari Unsplash</h1>

    @if(isset($photo['urls']))
        <div>
            <img src="{{ $photo['urls']['regular'] }}" 
                 alt="{{ $photo['alt_description'] ?? 'Random Unsplash Photo' }}" 
                 style="max-width:500px; border-radius:10px;">
            <p>Fotografer: {{ $photo['user']['name'] }}</p>
            <p>Link: <a href="{{ $photo['links']['html'] }}" target="_blank">Lihat di Unsplash</a></p>
        </div>
    @else
        <p>Tidak ada foto ditemukan.</p>
    @endif

</body>
</html>
