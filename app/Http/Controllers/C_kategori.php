<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class C_kategori extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        foreach ($data as $d) {
            echo $d->nama_kategori.'<br>';
        }
        dd($data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //insert data dengan ORM Biasa (satu persatu)
        // $kategori = new Kategori;
        // $kategori->nama_kategori = 'Office';
        // $kategori->deskripsi = 'Peralatan pendukung kegiatan kantor';
        // $kategori->save();

        //insert data dengan ORM Mass Assignment (langsung menyebutkan semua kolom)
        Kategori::create([
            'nama_kategori' => 'Perabot',
            'deskripsi' => 'Perabot everything',
        ]);
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
        Kategori::where('id', $id)->update([
            'nama_kategori' => 'Spare Part',
            'deskripsi' => 'Part-part kendaraan bermotor',
        ]);
    }


    public function destroy($id)
    {
        Kategori::where('id', $id)->delete();
    }
}
