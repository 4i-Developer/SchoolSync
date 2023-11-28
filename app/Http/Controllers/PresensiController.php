<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Presensi;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function showPresensi()
    {
        $userId = auth()->user()->id;

        $user = User::findOrFail($userId);
        $userKelas = $user->kelas;
        $kelas = Kelas::find($user->kelas);

        $today = Carbon::today()->toDateString();
        $presensiHariIni = Presensi::where('id_kelas', $userKelas)
            ->whereDate('created_at', $today)
            ->get();

        $dataPresensi = [];
        foreach ($presensiHariIni as $index => $presensi) {
            $nama = User::findOrFail($presensi->id_user)->name;
            $jam = Carbon::parse($presensi->time)->format('H:i');
            $status = $presensi->status == 1 ? 'TEPAT WAKTU' : 'TERLAMBAT';

            $dataPresensi[] = [
                'no' => $index + 1,
                'nama' => $nama,
                'jam' => $jam,
                'status' => $status,
            ];
        }

        return view('guru.presensi', compact('dataPresensi','kelas'));
    }
}