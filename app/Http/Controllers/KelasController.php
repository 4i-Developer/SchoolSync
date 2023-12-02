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
        $kelas->update([
            'nama_kelas' => $request->namaKelas,
            'id_guru' => $request->idGuru,
        ]);

        return redirect()->route('kelas.daftarKelas')->with('success', 'Kelas berhasil diperbarui!');
    }

    public function store(Request $request)
    {
    Kelas::create([
        'nama_kelas' => $request->namaKelas,
        'id_guru' => $request->idGuru,
    ]);
    Session::flash('success', 'Kelas berhasil ditambahkan!');
    return redirect()->route('kelas.tambahKelas');
    }
}
