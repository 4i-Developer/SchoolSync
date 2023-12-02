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
        'senin1','senin2','senin3','senin4',
        'selasa1','selasa2','selasa3','selasa4',
        'rabu1','rabu2','rabu3','rabu4',
        'kamis1','kamis2','kamis3','kamis4',
        'jumat1','jumat2','jumat3','jumat4',
    ];
    
    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru');
    }
}
