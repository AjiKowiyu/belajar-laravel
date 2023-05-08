<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Berita_kategori;
use App\Models\Berita;

class C_beranda extends Controller
{
    public function index()
    {
        $kategori = Berita_kategori::all();
        return view('beranda', compact('kategori'));
    }


    public function kabar_by_kategori($id_kategori, $nama_kategori)
    {
        echo "id kategori = $id_kategori, nama kategori = $nama_kategori";
    }
}
