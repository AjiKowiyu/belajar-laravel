@extends('template/index')
@section('konten')

<form action="{{ route('berita-update', ['id' => $berita->id]) }}" method="post" class="my-4" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="judul" class="form-label"><b>Judul</b></label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}">
        @if ($errors->has('judul'))
            <div class="badge text-bg-danger">{{ $errors->first('judul') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="foto_saatini" class="form-label"><b>Foto saat ini</b></label><br>
            <img src="{{ ($berita->foto != 'default-news.jpg') ? asset("storage/$berita->foto") : asset("images/berita/$berita->foto") }}" class="img-fluid rounded-start w-100" alt="{{ $berita->judul }}">
        </div>
        <div class="col-md-6 mb-4">
            <label for="foto" class="form-label"><b>Ganti Foto</b></label>
            <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, jpeg, .png">
            <div class="small mt-1"><i class="fa-fw fa-solid fa-info-circle text-info"></i> Maks. ukuran: 3MB, File yang diizinkan: .jpg, .jpeg, .png</div>
            @if ($errors->has('foto'))
                <div class="badge text-bg-danger">{{ $errors->first('foto') }}</div>
            @endif
        </div>
    </div>
    <div class="mb-4">
        <label for="isi" class="form-label"><b>Isi Berita</b></label>
        {{-- <textarea class="form-control" id="isi" name="isi" rows="10">{{ $berita->isi }}</textarea> --}}
        <input id="isi" type="hidden" name="isi">
        <trix-editor input="isi">{!! $berita->isi !!}</trix-editor>
        @if ($errors->has('isi'))
            <div class="badge text-bg-danger">{{ $errors->first('isi') }}</div>
        @endif
    </div>
    <div class="mb-4">
        <label for="kategori" class="form-label"><b>Kategori</b></label>
        <select class="form-select" id="kategori" name="kategori">
            <option selected value="">Pilih kategori berita</option>
            @foreach ($kategori as $k)
                <option {{ ($berita->kategori_id == $k->id) ? 'selected' : '' }} value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
        @if ($errors->has('kategori'))
            <div class="badge text-bg-danger">{{ $errors->first('kategori') }}</div>
        @endif
    </div>
    <div class="mb-4">
        <label for="status" class="form-label"><b>Status</b></label>
        <select class="form-select" id="status" name="status">
            <option {{ ($berita->status == 'Draft') ? 'selected' : '' }}>Draft</option>
            <option {{ ($berita->status == 'Publish') ? 'selected' : '' }}>Publish</option>
        </select>
        @if ($errors->has('status'))
            <div class="badge text-bg-danger">{{ $errors->first('status') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection