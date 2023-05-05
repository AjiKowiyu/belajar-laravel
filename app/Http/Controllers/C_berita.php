<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $berita = Berita::where('status', '!=', 'Trash')->get();
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
            'foto' => 'max:3072|mimes:image/jpeg,image/png',
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
                    'foto' => ($request->file('foto')) ? $request->file('foto')->store('foto') : 'default-news.jpg',
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
        $berita = Berita::find($id);
        return view('berita/detail', compact('berita'));
    }


    public function edit($id)
    {
        $kategori = Berita_kategori::all();
        $berita = Berita::find($id);
        return view('berita/edit', compact('kategori', 'berita'));
    }


    public function update(Request $request, $id)
    {

        $aturan = [
            'judul' => 'required|min:15',
            'isi' => 'required|min:100',
            'foto' => 'max:3072|mimes:jpeg,png',
            'kategori' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $aturan);

        //percobaan untuk melakukan sesuatu (menyimpan data berita ke dalam database mysql)
        try {
            //jika validasi gagal
            if ($validator->fails()) {
                return redirect()->route('berita-edit', ['id' => $id])->withErrors($validator)->withInput();
            }
            //jika validasi lolos
            else {
                $berita = Berita::find($id);
                $foto_existing = $berita->foto;
                //jika ada foto yang ingin diganti
                if ( $request->file('foto') ) {
                    Storage::delete($foto_existing);
                    //hapus foto yang lama
                }
                $berita = Berita::where('id', $id)->update([
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'kategori_id' => $request->kategori,
                    'foto' => ($request->file('foto')) ? $request->file('foto')->store('foto') : $foto_existing,
                    'status' => $request->status,
                    'tanggal_update' => date('Y-m-d H:i:s'),
                ]);
                //jika gagal input ke mysql
                if ( ! $berita ) {
                    return redirect()->route('berita-edit', ['id' => $id])->with('warning', 'Database Error');
                }
                //jika berhasil input ke mysql
                else {
                    return redirect()->route('berita')->with('success', "Berhasil perbarui berita $request->judul!");
                }
            }
        }
        //percobaan yg gagal
        catch (\Throwable $th) {
            return redirect()->route('berita-edit', ['id' => $id])->withErrors($th->getMessage())->withInput();
        }
    }


    public function destroy($id)
    {
        $berita = Berita::where('id', $id)->update([
            'status' => 'Trash',
            'tanggal_update' => date('Y-m-d H:i:s'),
        ]);
        //jika gagal update ke mysql
        if ( ! $berita ) {
            return redirect()->route('berita')->with('warning', 'Database Error');
        }
        //jika berhasil update ke mysql
        else {
            return redirect()->route('berita')->with('success', 'Berhasil membuang berita!');
        }
    }
}
