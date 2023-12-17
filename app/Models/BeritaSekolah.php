<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class BeritaSekolah extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // Nama    : Davin Wahyu Wardana
    // NIM     : 6706223003
    // Kelas   : D3IF-4603
    protected $table = 'berita_sekolah';
    
    protected $fillable = [
        'id_user',
        'gambar',
        'judul',
        'konten',
    ];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
