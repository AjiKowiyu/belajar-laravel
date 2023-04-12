<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_kategori extends Model
{
    use HasFactory;
    protected $table = 'berita_kategori';
    public $timestamps = false;
    protected $guarded = ['id'];
}
