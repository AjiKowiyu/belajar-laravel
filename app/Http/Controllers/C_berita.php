<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $aturan = [
            'judul' => 'required|min:15',
            'isi' => 'required|min:100',
            'kategori' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $aturan);

        //percobaan untuk melakukan sesuatu (menyimpan data berita ke dalam database mysql)
        try {
            //jika validasi gagal
            if ($validator->fails()) {
                return redirect()->route('berita-tambah')->withErrors($validator)->withInput();
            }
            //jika validasi lolos
            else {
                $berita = Berita::create([
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'kategori_id' => $request->kategori,
                    'foto' => 'default-news.jpg',
                    'status' => $request->status,
                    'user_id' => Auth::user()->id,
                    'tanggal_create' => date('Y-m-d H:i:s'),
                ]);
                //jika gagal input ke mysql
                if ( ! $berita ) {
                    return redirect()->route('berita-tambah')->with('warning', 'Database Error');
                }
                //jika berhasil input ke mysql
                else {
                    return redirect()->route('berita')->with('success', 'Berhasil membuat berita baru!');
                }
            }
        }
        //percobaan yg gagal
        catch (\Throwable $th) {
            return redirect()->route('berita-tambah')->withErrors($th->getMessage())->withInput();
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
