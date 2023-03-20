<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            [
                'nama' => 'meja',
                'id_kategori' => 1,
                'qty' => 7,
                'harga_beli' => 457000,
                'harga_jual' => 799000,
                'tanggal_dibuat' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'lemari',
                'id_kategori' => 2,
                'qty' => 11,
                'harga_beli' => 583000,
                'harga_jual' => 879000,
                'tanggal_dibuat' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
