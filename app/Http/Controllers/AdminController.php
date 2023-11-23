<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Kelas;

class AdminController extends Controller
{
    public function index() {
        $kelas = Kelas::all();
        return view('admin.daftarKelas', compact('kelas'));
    }

    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.infoKelas', compact('kelas'));
    }

    public function create()
    {
    return view('admin.tambahKelas');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama_kelas' => 'required|string|max:255',
        'id_guru' => 'required|integer',
    ]);
    Kelas::create([
        'nama_kelas' => $request->namaKelas,
        'id_guru' => $request->idGuru,
    ]);
    Session::flash('success', 'Kelas berhasil ditambahkan!');
    return redirect()->route('admin.tambahKelas');
    }
}
