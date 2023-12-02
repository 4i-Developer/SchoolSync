<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaKelas extends Model
{
    use HasFactory;
    // Nama    : Davin Wahyu Wardana
    // NIM     : 6706223003
    // Kelas   : D3IF-4603
    protected $table = 'berita_kelas';
    
    protected $fillable = [
        'id_user',
        'id_kelas',
        'gambar',
        'judul',
        'konten',
    ];
}
