<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Barang</title>
</head>
<body>
    {{-- include('nama file') --}}
    @include('barang/asset')
    Ini File template.blade.php
    
    {{-- yield('nama yield-nya') --}}
    @yield('konten')
    <footer>
        <hr>
        tentang kami <br>
        hubungi <br>
        pesanan <br>
        karir <br>
        <hr>
    </footer>
</body>
</html>