<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
</head>
<body>
    <h1>Minuman: {{ $minuman }}</h1>
    <h1>Makanan: {{ $makanan }}</h1>
    {{ $pesanan['aji'] }}
    @if (count($pesanan) == 1)
        <h2>jumlah pesanan hanya 1</h2>
        @elseif (count($pesanan) > 1)
        <h2>jumlah pesanan lebih dari 1 (total {{ count($pesanan) }})</h2>
    @endif
    <hr>
    @foreach ($pesanan as $p)
        <b>{{ $p }}</b><br>
    @endforeach
    <hr>
    @php
        foreach ($pesanan as $p) {
            echo $p.'<br>';
        }
    @endphp
</body>
</html>