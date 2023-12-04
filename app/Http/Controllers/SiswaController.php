<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function index()
    {
        $idKelas = Auth::user()->id_kelas;
        $kelas = Kelas::find($idKelas);
        $siswa = User::where('role', 'siswa')->where('id_kelas', $idKelas)->with('kelas')->get();

        return view('guru.daftarSiswa', compact('siswa','kelas'));
    }

    public function create()
    {
        return view('guru.tambahSiswa');
    }

    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('guru.editSiswa', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $siswa = User::findOrFail($id);
        $siswa->name = strtoupper($request->name);
        $siswa->nis = $request->nis;
        $siswa->email = $request->email;

        $siswa->save();

        return redirect()->route('siswa.daftarSiswa')->with('success', 'Siswa berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $idKelas = Auth::user()->id_kelas;

        $user = new User([
            'name' => strtoupper($request->name),
            'nis' => $request->nis,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'id_kelas' => $idKelas,
        ]);

        $user->save();

        return redirect()->route('siswa.daftarSiswa')->with('success', 'Siswa berhasil ditambahkan!');
    }
}
