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
        $kategori = Berita_kategori::all();
        $berita = Berita::
            where('status', 'Publish')
            ->where('kategori_id', $id_kategori)
            ->join('berita_kategori', 'berita.kategori_id', '=', 'berita_kategori.id')->get();
        return view('kabar/kategori', compact('kategori','berita'));
    }



    public function kabar_berita($id_berita, $judul_berita)
    {
        $berita = Berita::where('berita.id', $id_berita)
            ->join('berita_kategori', 'berita.kategori_id', '=', 'berita_kategori.id')
            ->first();
        $berita_lain = Berita::
            where('status', 'Publish')
            ->where('berita.kategori_id', $berita->kategori_id)
            ->where('berita.id', '!=', $berita->id)
            ->join('berita_kategori', 'berita.kategori_id', '=', 'berita_kategori.id')
            ->get();
        return view('kabar/artikel', compact('berita', 'berita_lain'));

    }
}
