<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Berita_kategori;
use App\Models\Berita;


class C_berita extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $berita = Berita::all();
        return view('berita/index', compact('berita'));
    }



    public function create()
    {
        $kategori = Berita_kategori::all();
        return view('berita/tambah', compact('kategori'));
    }


    public function store(Request $request)
    {
        $berita = Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori,
            'foto' => 'default-news.jpg',
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'tanggal_create' => date('Y-m-d H:i:s'),
        ]);
        if ( ! $berita ) {
            // App::abort(500, 'Some Error');
            echo 'error bos';
        } else {
            return redirect()->route('berita');
        }
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
