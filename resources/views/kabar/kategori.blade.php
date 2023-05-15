@extends('layouts/kabar')
@section('konten')

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