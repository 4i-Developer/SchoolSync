<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GuruController extends Controller
{
    public function index()
    {
        $guru = User::where('role', 'guru')->with('kelas')->get();

        return view('admin.daftarGuru', compact('guru'));
    }

    public function create()
    {
        return view('admin.tambahGuru');
    }

    public function edit($id)
    {
        $guru = User::findOrFail($id);
        return view('admin.editGuru', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $guru = User::findOrFail($id);
        $guru->name = strtoupper($request->name);
        $guru->nik = $request->nik;
        $guru->email = $request->email;

        $guru->save();

        return redirect()->route('guru.daftarGuru')->with('success', 'Guru berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User([
            'name' => strtoupper($request->name),
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        $user->save();

        return redirect()->route('guru.daftarGuru')->with('success', 'Guru berhasil ditambahkan!');
    }
}
