@extends('layouts/kabar')
@section('konten')

<div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
</div>
<div class="row mb-2">
    @foreach ($berita as $b)
    @php
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $b->judul)))
    @endphp
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow h-md-300 position-relative p-4">
            <div class="col-12">
                <h3 class="mb-0">{{ $b->judul }}</h3>
            </div>
            <div class="col-8">
                <strong class="d-inline-block mb-2 text-primary">{{ $b->nama_kategori }}</strong>
                <div class="mb-2 text-muted">{{ date('d F Y - H:i', strtotime($b->tanggal_create)) }}</div>
                <p class="card-text mb-2">{{ strip_tags( (strlen($b->isi) > 70) ? substr($b->isi, 0, 70).'...' : $b->isi) }}</p>
                <a href="{{ route('kabar-berita', ['id_berita'=>$b->id_berita, 'judul_berita'=>$slug]) }}">Continue reading</a>
            </div>
            <div class="col-4">
                <img src="{{ ($b->foto != 'default-news.jpg') ? asset("storage/$b->foto") : asset("images/berita/$b->foto") }}" width="170" height="150" style="object-fit: cover;" alt="{{ $b->judul }}">
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection