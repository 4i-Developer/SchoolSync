<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;

class JadwalController extends Controller
{
    public function showJadwal()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $kelas = Kelas::find($user->kelas);

        return view('guru.jadwal', compact('kelas'));
    }

}
