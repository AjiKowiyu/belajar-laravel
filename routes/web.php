<?php

use App\Http\Controllers\C_berita;
use App\Http\Controllers\C_barang;
use App\Http\Controllers\C_produk;
use App\Http\Controllers\C_kategori;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//get: mengambil url yg di request
//menampilkan halaman yg diminta
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('test/halaman-about');
});

//route dengan parameter & regex
Route::get('/profil/{namapeserta?}', function($nama = 'jokowi'){
    echo 'rute profil '.$nama;
})->where('namapeserta', '[A-Za-z]+');

//route dengan multi parameter
Route::get('/motor/{merk}/{jenis}/{warna}', function($merk, $jenis, $warna){
    echo "motor $merk $jenis $warna";
})->where('merk', '[A-Za-z]+')->name('motor_baru');


//route dengan controller & view
Route::get('/barang', [C_barang::class, 'index'])->name('barang');

//layouting dengan blade
Route::get('/barang-pesanan', [C_barang::class, 'pesanan'])->name('barang-pesanan');
Route::get('/barang-promo', [C_barang::class, 'promo'])->name('barang-promo');

//belajar query builder
Route::get('/produk', [C_produk::class, 'index'])->name('produk-index');
Route::get('/produk/store', [C_produk::class, 'store'])->name('produk-simpan');
Route::get('/produk/update/{id}', [C_produk::class, 'update'])->where('id', '[0-9]+')->name('produk-perbarui');
Route::get('/produk/delete/{id}', [C_produk::class, 'destroy'])->where('id', '[0-9]+')->name('produk-hapus');

//belajar eloquent
Route::get('/kategori', [C_kategori::class, 'index'])->name('kategori-index');
Route::get('/kategori/store', [C_kategori::class, 'store'])->name('kategori-simpan');
Route::get('/kategori/update/{id}', [C_kategori::class, 'update'])->where('id', '[0-9]+')->name('kategori-perbarui');
Route::get('/kategori/delete/{id}', [C_kategori::class, 'destroy'])->where('id', '[0-9]+')->name('kategori-hapus');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [C_berita::class, 'index'])->name('berita');
