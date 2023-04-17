@extends('template/index')
@section('konten')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Berita</h1>
    <a href="{{ route('berita-tambah') }}" class="btn btn-primary rounded-circle"><i class="fa-solid fa-plus"></i></a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($berita as $b)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ (strlen($b->isi) > 25) ? substr($b->isi, 0, 25).'...' : $b->isi }}</td>
                <td>{{ $b->status }}</td>
                <td>
                    <a href="{{ route('berita-detail', ['id' => $b->id]) }}" class="btn btn-sm btn-outline-info"><i class="fa-fw fa-solid fa-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-outline-warning"><i class="fa-fw fa-solid fa-pen-to-square"></i></a>
                    <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa-fw fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection