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
            <th>First</th>
            <th>Last</th>
            <th>Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <td>3</td>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>

@endsection