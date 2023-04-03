<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    public $timestamps = false;
    // fillable & guarded disetting untuk digunakan pada create & update
    // pilih salah satu aja, antara fillable atau guarded
    protected $guarded = ['id'];
    // protected $fillable = ['nama_kategori'];
}
