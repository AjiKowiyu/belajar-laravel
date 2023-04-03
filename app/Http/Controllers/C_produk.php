<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_produk extends Controller
{

    public function index()
    {
        $data_semuaproduk = DB::table('produk')
        ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
        ->get();
        return view('produk/index', compact('data_semuaproduk'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        DB::table('produk')
        ->insert([
            'nama' => 'piring',
            'id_kategori' => '3',
            'qty' => '20',
            'harga_beli' => '13500',
            'harga_jual' => '30000',
            'tanggal_dibuat' => date('Y-m-d H:i:s'),
        ]);
        echo 'berhasil menambah data piring ke dalam tabel produk';
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        DB::table('produk')
        ->where('id', $id)
        ->update([
            'nama' => 'mangkok',
            'id_kategori' => '3',
            'qty' => '18',
            'harga_beli' => '11750',
            'harga_jual' => '27500',
        ]);
        echo 'data berhasil diperbarui';
    }


    public function destroy($id)
    {
        DB::table('produk')
        ->where('id', $id)
        ->delete();
        echo 'data berhasil dihapus';
    }
}
