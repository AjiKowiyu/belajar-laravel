@extends('layouts/kabar')
@section('konten')

<div class="row my-3">
    <div class="col-md-8">
        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{ $berita->judul }}</h2>
            <p class="blog-post-meta">{{ date('d F Y - H:i', strtotime($berita->tanggal_create)) }}</p>
            <img src="{{ ($berita->foto != 'default-news.jpg') ? asset("storage/$berita->foto") : asset("images/berita/$berita->foto") }}" class="w-100" alt="{{ $berita->judul }}">
            <p>{!! $berita->isi !!}</p>
        </article>
    </div>
    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4 mb-3 bg-light rounded">
                <h4 class="fst-italic">About</h4>
                <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
            </div>
            <div class="p-4">
                <h4 class="fst-italic">Berita {{ $berita->nama_kategori }} Lainnya</h4>
                <ol class="list-unstyled mb-0">
                    @if (count($berita_lain) > 0)
                        @foreach ($berita_lain as $bl)
                            @php
                                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $bl->judul)))
                            @endphp
                            <li><a href="{{ route('kabar-berita', ['id_berita' => $bl->id_berita, 'judul_berita' => $slug]) }}">{{ $bl->judul }}</a></li>
                        @endforeach
                    @else
                        <li>Belum ada rekomendasi berita lainnya</li>
                    @endif
                </ol>
            </div>
            <div class="p-4">
                <h4 class="fst-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection