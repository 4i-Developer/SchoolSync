<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\BeritaKelasController;
use App\Http\Controllers\BeritaSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});
Route::get('/home', function () {
    return view('home.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.presensi');
Route::get('/beritaKelas/show', [BeritaKelasController::class, 'showBeritaKelas'])->name('beritakelasshow');
Route::get('/beritaKelas/{id}', [BeritaKelasController::class, 'show'])->name('beritakelas.show');
Route::get('/beritaSekolah/show', [BeritaSekolahController::class, 'showBeritaSekolah'])->name('beritasekolahshow');
Route::get('/beritaSekolah/{id}', [BeritaSekolahController::class, 'show'])->name('beritasekolah.show');

// API
Route::get('/users/{id}', [UserController::class, 'getUserProfile']);
Route::get('/berita/{id}', [BeritaSekolahController::class, 'getBeritaSekolah']);
Route::get('/api', function () {
    return view('api/documentation');
})->name('api.documentation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['auth', 'checkRole:guru'])->group(function () {
        // presensi
        Route::get('/guru/presensi', [PresensiController::class, 'showPresensi'])->name('guru.presensi');
        Route::get('/export-presensi', [PresensiController::class, 'exportPresensi'])->name('presensi.export');
        // jadwal
        Route::get('/guru/jadwal', [JadwalController::class, 'showJadwal'])->name('guru.jadwal');
        Route::put('/jadwalUpdate/{id}/{hari}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::get('/jadwalUpdate/{id}/{hari}', [JadwalController::class, 'edit'])->name('jadwal.editJadwal');
        // berita kelas
        Route::post('/beritaKelas', [BeritaKelasController::class, 'store'])->name('beritakelas.store');
        Route::get('/beritaKelas', [BeritaKelasController::class, 'index'])->name('beritakelas.daftarBerita');
        Route::get('/beritaKelasTambah', [BeritaKelasController::class, 'create'])->name('beritakelas.tambahBerita');
        Route::put('/beritaKelasUpdate/{id}', [BeritaKelasController::class, 'update'])->name('beritakelas.update');
        Route::get('/beritaKelasUpdate/{id}', [BeritaKelasController::class, 'edit'])->name('beritakelas.editBerita');
        // siswa
        Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.daftarSiswa');
        Route::get('/siswaTambah', [SiswaController::class, 'create'])->name('siswa.tambahSiswa');
        Route::put('/siswaUpdate/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::get('/siswaUpdate/{id}', [SiswaController::class, 'edit'])->name('siswa.editSiswa');
        // wali
        Route::post('/wali', [WaliController::class, 'store'])->name('wali.store');
        Route::get('/wali', [WaliController::class, 'index'])->name('wali.daftarWali');
        Route::get('/waliTambah', [WaliController::class, 'create'])->name('wali.tambahWali');
        Route::put('/waliUpdate/{id}', [WaliController::class, 'update'])->name('wali.update');
        Route::get('/waliUpdate/{id}', [WaliController::class, 'edit'])->name('wali.editWali');
    });

    Route::middleware(['auth', 'checkRole:admin'])->group(function () {
        // kelas
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.daftarKelas');
        Route::get('/kelasTambah', [KelasController::class, 'create'])->name('kelas.tambahKelas');
        Route::get('/kelasView/{id}', [KelasController::class, 'show'])->name('kelas.infoKelas');
        Route::put('/kelasUpdate/{id}', [KelasController::class, 'update'])->name('kelas.update');
        Route::get('/kelasUpdate/{id}', [KelasController::class, 'edit'])->name('kelas.editKelas');
        // berita sekolah
        Route::post('/beritaSekolah', [BeritaSekolahController::class, 'store'])->name('beritasekolah.store');
        Route::get('/beritaSekolah', [BeritaSekolahController::class, 'index'])->name('beritasekolah.daftarBerita');
        Route::get('/beritaSekolahTambah', [BeritaSekolahController::class, 'create'])->name('beritasekolah.tambahBerita');
        Route::put('/beritaSekolahUpdate/{id}', [BeritaSekolahController::class, 'update'])->name('beritasekolah.update');
        Route::get('/beritaSekolahUpdate/{id}', [BeritaSekolahController::class, 'edit'])->name('beritasekolah.editBerita');
        // guru
        Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
        Route::get('/guru', [GuruController::class, 'index'])->name('guru.daftarGuru');
        Route::get('/guruTambah', [GuruController::class, 'create'])->name('guru.tambahGuru');
        Route::put('/guruUpdate/{id}', [GuruController::class, 'update'])->name('guru.update');
        Route::get('/guruUpdate/{id}', [GuruController::class, 'edit'])->name('guru.editGuru');
    });
});

require __DIR__.'/auth.php';
