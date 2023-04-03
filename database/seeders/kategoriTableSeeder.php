<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Furnitur',
                'deskripsi' => 'Perabotan Rumah Tangga',
            ],
            [
                'nama_kategori' => 'Perkakas',
                'deskripsi' => 'Alat-alat pertukangan',
            ],
            [
                'nama_kategori' => 'Kitchen Set',
                'deskripsi' => 'Perlengkapan untuk makan, minum, dapur, dsb.',
            ],
        ]);
    }
}
