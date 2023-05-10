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
        $berita = Berita::where('status', 'Publish')
            ->join('berita_kategori', 'berita.kategori_id', '=', 'berita_kategori.id')->get();
        return view('beranda', compact('kategori','berita'));
    }


    public function kabar_by_kategori($id_kategori, $nama_kategori)
    {
        echo "id kategori = $id_kategori, nama kategori = $nama_kategori";
    }
}
