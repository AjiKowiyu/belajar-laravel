<?php

use App\Http\Controllers\C_berita;
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


//route dengan penamaan (naming route)
Route::get('/produk', function(){
    return view('list-semua-produk');
});
Route::get('/produk/promo', function(){
    echo 'list semua produk yang sedang diskon';
})->name('produk_dengan_potongan_harga');


//route dengan controller
Route::get('/berita', [C_berita::class, 'index'])->name('berita-laravel');