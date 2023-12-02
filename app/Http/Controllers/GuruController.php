<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GuruController extends Controller
{
    public function index()
    {
        $guru = User::where('role', 'guru')->with('kelas')->get();

        return view('admin.daftarGuru', compact('guru'));
    }
}
