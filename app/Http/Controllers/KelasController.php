<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Kelas;
use App\Models\User;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::all();
        return view('admin.daftarKelas', compact('kelas'));
    }

    public function create()
    {
    $users = User::where('role', 'guru')->get();

    return view('admin.tambahKelas', compact('users'));
    }

    public function edit($id)
    {
        $users = User::where('role', 'guru')->get();
        $kelas = Kelas::findOrFail($id);
        return view('admin.editKelas', compact('kelas','users'));
    }
    
    public function update(Request $request, $id)
    {

        $kelas = Kelas::findOrFail($id);
        $oldGuruId = $kelas->id_guru;

        User::where('id', $oldGuruId)->update(['id_kelas' => null]);

        $kelas->update([
            'id_guru' => $request->idGuru,
        ]);

        User::where('id', $request->idGuru)->update(['id_kelas' => $id]);

        return redirect()->route('kelas.daftarKelas')->with('success', 'Kelas berhasil diperbarui!');
    }

    public function store(Request $request)
    {
    $kelas = Kelas::create([
        'nama_kelas' => $request->namaKelas,
        'id_guru' => $request->idGuru,
    ]);
    $kelasId = $kelas->id;

    $guru = User::findOrFail($request->idGuru);
    $guru->id_kelas = $kelasId;
    $guru->save();
    Session::flash('success', 'Kelas berhasil ditambahkan!');
    return redirect()->route('kelas.tambahKelas');
    }
}
