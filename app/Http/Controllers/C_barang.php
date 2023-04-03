<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_barang extends Controller
{
    public function index()
    {
        $minuman = 'Jus Apel';
        $makanan = 'Bakso Telor';
        $pesanan = [
            'aji' => 'kopi hitam',
            'andre' => 'kopi susu',
            'nazar' => 'coklat panas',
            'taslim' => 'teh manis',
            'anita' => 'jus mangga',
            'allan' => 'air mineral',
            'rahmat' => 'susu putih',
        ];
        return view('barang.index', compact('minuman','makanan','pesanan'));
    }



    public function pesanan()
    {
        return view('barang/pesanan');
    }


    public function promo()
    {
        return view('barang/promo');
    }


}
