@extends('template/index')
@section('konten')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Rincian Berita</h1>
</div>

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-12">
            <div class="card-header">
                <h4 class="card-title mb-0"><b>{{ $berita->judul }}</b></h4>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{ asset("images/berita/$berita->foto") }}" class="img-fluid rounded-start p-3" alt="{{ $berita->judul }}">
        </div>
        <div class="col-md-8">
            <div class="card-body pb-0 mb-0">
                <p class="card-text">{{ $berita->isi }}</p>
            </div>
        </div>
        <div class="col-12">
            <div class="card-body pt-0">
                <span class="card-text"><small class="text-muted">Dibuat: {{ date('d F Y - H:i', strtotime($berita->tanggal_create)) }}</small></span><br>
                <span class="card-text"><small class="text-muted">Terakhir diperbarui: {{ ($berita->tanggal_update == '0000-00-00 00:00:00') ? '' : $berita->tanggal_update }}</small></span>
            </div>
        </div>
    </div>
  </div>

@endsection