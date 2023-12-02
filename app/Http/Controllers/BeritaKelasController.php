<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BeritaKelas;
use Illuminate\Support\Facades\Storage;

class BeritaKelasController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $berita = BeritaKelas::where('id_kelas', $user->id_kelas)->get();

        return view('guru.daftarBerita', compact('berita'));
    }

    public function create()
    {
        return view('guru.tambahBerita');
    }

    public function show($id)
    {
        $beritaKelas = BeritaKelas::findOrFail($id);

        return view('global.beritaKelas', compact('beritaKelas'));
    }
    
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = new BeritaKelas();
        $berita->id_user = $user->id;
        $berita->id_kelas = $user->id_kelas;
        $berita->judul = $validatedData['judul'];
        $berita->konten = $validatedData['konten'];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/beritakelas'), $imageName);
            $berita->gambar = $imageName;
        }

        $berita->save();

        return redirect()->route('beritakelas.daftarBerita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = BeritaKelas::findOrFail($id);
        return view('guru.editBerita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = BeritaKelas::findOrFail($id);
        $berita->judul = $validatedData['judul'];
        $berita->konten = $validatedData['konten'];

        if ($request->hasFile('gambar')) {
            // pake delete gambar
            // $image = $request->file('gambar');
            // $imageName = time() . '.' . $image->getClientOriginalExtension();
            // if ($berita->gambar) {
            //     Storage::delete('public/images/beritakelas/' . $berita->gambar);
            // }
            // $image->storeAs('public/images/beritakelas', $imageName);
            // $berita->gambar = $imageName;

            // tanpa delete gambar
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/beritakelas'), $imageName);
            $berita->gambar = $imageName;
        }

        $berita->save();

        return redirect()->route('beritakelas.daftarBerita')->with('success', 'Berita berhasil diupdate!');
    }
}
