<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Kelas;

class WaliController extends Controller
{
    public function index()
    {
        $idKelas = Auth::user()->id_kelas;
        $kelas = Kelas::find($idKelas);
        $wali = User::where('role', 'wali')->where('id_kelas', $idKelas)->with('kelas')->with('murid')->get();
            
        return view('guru.daftarWali', compact('wali','kelas'));
    }

    public function create()
    {
        $idKelas = Auth::user()->id_kelas;
        $siswa = User::where('role', 'siswa')->where('id_kelas', $idKelas)->get();
        return view('guru.tambahWali', compact('siswa'));
    }

    public function edit($id)
    {
        $wali = User::findOrFail($id);
        return view('guru.editWali', compact('wali'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $wali = User::findOrFail($id);
        $wali->name = strtoupper($request->name);
        $wali->email = $request->email;

        $wali->save();

        return redirect()->route('wali.daftarWali')->with('success', 'Wali berhasil diperbarui!');
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
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'wali',
            'id_kelas' => $idKelas,
            'id_murid' => $request->id_murid,
        ]);

        $user->save();

        return redirect()->route('wali.daftarWali')->with('success', 'Wali berhasil ditambahkan!');
    }
}
