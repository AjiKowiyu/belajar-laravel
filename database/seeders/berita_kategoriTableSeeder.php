<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class berita_kategoriTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('berita_kategori')->insert([
            [
                'nama_kategori' => 'Politik',
                'deskripsi' => 'Berita terkait kondisi politik',
            ],
            [
                'nama_kategori' => 'Olahraga',
                'deskripsi' => 'Berita terkait cabang olahraga',
            ],
            [
                'nama_kategori' => 'Otomotif',
                'deskripsi' => 'Berita terkait otomotif kendaraan',
            ],
            [
                'nama_kategori' => 'Teknologi',
                'deskripsi' => 'Berita terkait perkembangan teknologi',
            ],
            [
                'nama_kategori' => 'Kesehatan',
                'deskripsi' => 'Berita terkait kabar kesehatan',
            ],
        ]);
    }
}
