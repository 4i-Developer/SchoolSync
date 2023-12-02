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

        $kelas = Kelas::find($user->id_kelas);

        return view('guru.jadwal', compact('kelas'));
    }

    public function edit($id)
    {
        $jadwal = Kelas::findOrFail($id);
        return view('guru.editJadwal', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Kelas::findOrFail($id);
        
        $input = $request->all();

        $jadwal->update([
            'senin1' => $input['senin1'],
            'senin2' => $input['senin2'],
            'senin3' => $input['senin3'],
            'senin4' => $input['senin4'],
            'selasa1' => $input['selasa1'],
            'selasa2' => $input['selasa2'],
            'selasa3' => $input['selasa3'],
            'selasa4' => $input['selasa4'],
            'rabu1' => $input['rabu1'],
            'rabu2' => $input['rabu2'],
            'rabu3' => $input['rabu3'],
            'rabu4' => $input['rabu4'],
            'kamis1' => $input['kamis1'],
            'kamis2' => $input['kamis2'],
            'kamis3' => $input['kamis3'],
            'kamis4' => $input['kamis4'],
            'jumat1' => $input['jumat1'],
            'jumat2' => $input['jumat2'],
            'jumat3' => $input['jumat3'],
            'jumat4' => $input['jumat4'],
        ]);

        return redirect()->route('guru.jadwal')->with('success', 'Jadwal berhasil diperbarui');
    }

}
