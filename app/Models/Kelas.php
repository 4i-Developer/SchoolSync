<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // Nama    : Davin Wahyu Wardana
    // NIM     : 6706223003
    // Kelas   : D3IF-4603
    protected $table = 'kelas';
    
    protected $fillable = [
        'nama_kelas',
        'id_guru',
    ];
    
    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru');
    }
}
