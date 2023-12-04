<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BeritaSekolah;

class BeritaSekolahController extends Controller
{
    public function index() {
        $berita = BeritaSekolah::all();
        return view('admin.daftarBerita', compact('berita'));
    }

    public function create()
    {
        return view('admin.tambahBerita');
    }

    public function showBeritaSekolah()
    {
        $beritaSekolah = BeritaSekolah::with('publisher')->where('status', 'show')->get();
        return view('global.showBeritaSekolah', compact('beritaSekolah'));

    }

    public function show($id)
    {
        $beritaSekolah = BeritaSekolah::findOrFail($id);

        return view('global.beritaSekolah', compact('beritaSekolah'));
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

        $berita = new BeritaSekolah();
        $berita->id_user = $user->id;
        $berita->judul = $validatedData['judul'];
        $berita->konten = $validatedData['konten'];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/beritasekolah'), $imageName);
            $berita->gambar = $imageName;
        }

        $berita->save();

        return redirect()->route('beritasekolah.daftarBerita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = BeritaSekolah::findOrFail($id);
        return view('admin.editBerita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = BeritaSekolah::findOrFail($id);
        $berita->judul = $validatedData['judul'];
        $berita->konten = $validatedData['konten'];

        if ($request->hasFile('gambar')) {
            // pake delete gambar
            // $image = $request->file('gambar');
            // $imageName = time() . '.' . $image->getClientOriginalExtension();
            // if ($berita->gambar) {
            //     Storage::delete('public/images/beritasekolah/' . $berita->gambar);
            // }
            // $image->storeAs('public/images/beritasekolah', $imageName);
            // $berita->gambar = $imageName;

            // tanpa delete gambar
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/beritasekolah'), $imageName);
            $berita->gambar = $imageName;
        }

        $berita->save();

        return redirect()->route('beritasekolah.daftarBerita')->with('success', 'Berita berhasil diupdate!');
    }
}
