@extends('template/index')
@section('konten')

<form action="#" method="post" class="mt-4">
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul">
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi Berita</label>
        <textarea class="form-control" id="isi" name="isi" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" id="kategori" name="kategori">
            <option selected>Pilih kategori berita</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option selected>Draft</option>
            <option>Publish</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection