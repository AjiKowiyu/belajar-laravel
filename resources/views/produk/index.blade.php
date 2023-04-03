produk index blade
<br><br>
data mentah dari mysql
<hr>
{{ $data_semuaproduk }}

<br><br>
data yang sudah diolah (menampilkan data satuan)
<hr>
produk {{ $data_semuaproduk[1]->nama }} saat ini memiliki stok sejumlah {{ $data_semuaproduk[1]->qty }} unit 
seharga Rp {{ number_format( $data_semuaproduk[1]->harga_jual, 0, ',', '.' ) }}/unit

<br><br>
data yang sudah diolah (menampilkan semua data menggunakan looping)
<hr>
@foreach ($data_semuaproduk as $p)
    @php
        $total_harga = $p->qty * $p->harga_jual;
    @endphp
    {{ $p->nama }} {{ $p->qty }} {{ $p->nama_kategori }} {{ $p->harga_beli }} Rp{{ number_format( $p->harga_jual, 0, ',', '.' ) }}/unit, 
    total harga: {{ number_format($total_harga, 0, ',', '.' ) }}<br>
@endforeach