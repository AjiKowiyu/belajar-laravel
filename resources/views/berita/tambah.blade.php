@extends('template/index')
@section('konten')

<form action="{{ route('berita-simpan') }}" method="post" class="mt-4" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
        @if ($errors->has('judul'))
            <div class="badge text-bg-danger">{{ $errors->first('judul') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, jpeg, .png">
        <div class="small mt-1"><i class="fa-fw fa-solid fa-info-circle text-info"></i> Maks. ukuran: 3MB, File yang diizinkan: .jpg, .jpeg, .png</div>
        @if ($errors->has('foto'))
            <div class="badge text-bg-danger">{{ $errors->first('foto') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi Berita</label>
        <textarea class="form-control" id="isi" name="isi" rows="10">{{ old('isi') }}</textarea>
        @if ($errors->has('isi'))
            <div class="badge text-bg-danger">{{ $errors->first('isi') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" id="kategori" name="kategori">
            <option selected value="">Pilih kategori berita</option>
            @foreach ($kategori as $k)
                <option {{ (old('kategori') == $k->id) ? 'selected' : '' }} value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
        @if ($errors->has('kategori'))
            <div class="badge text-bg-danger">{{ $errors->first('kategori') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option selected>Draft</option>
            <option>Publish</option>
        </select>
        @if ($errors->has('status'))
            <div class="badge text-bg-danger">{{ $errors->first('status') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection