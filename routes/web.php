<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\BeritaKelasController;
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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.presensi');
Route::get('/beritaKelas/{id}', [BeritaKelasController::class, 'show'])->name('beritakelas.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['auth', 'checkRole:guru'])->group(function () {
        Route::get('/guru/presensi', [PresensiController::class, 'showPresensi'])->name('guru.presensi');
        Route::get('/guru/jadwal', [JadwalController::class, 'showJadwal'])->name('guru.jadwal');
        Route::put('/jadwalUpdate/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::get('/jadwalUpdate/{id}', [JadwalController::class, 'edit'])->name('jadwal.editJadwal');
        Route::post('/beritaKelas', [BeritaKelasController::class, 'store'])->name('beritakelas.store');
        Route::get('/beritaKelas', [BeritaKelasController::class, 'index'])->name('beritakelas.daftarBerita');
        Route::get('/beritaKelasTambah', [BeritaKelasController::class, 'create'])->name('beritakelas.tambahBerita');
        Route::put('/beritaKelasUpdate/{id}', [BeritaKelasController::class, 'update'])->name('beritakelas.update');
        Route::get('/beritaKelasUpdate/{id}', [BeritaKelasController::class, 'edit'])->name('beritakelas.editBerita');
    });

    Route::middleware(['auth', 'checkRole:admin'])->group(function () {
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.daftarKelas');
        Route::get('/kelasTambah', [KelasController::class, 'create'])->name('kelas.tambahKelas');
        Route::get('/kelasView/{id}', [KelasController::class, 'show'])->name('kelas.infoKelas');
        Route::put('/kelasUpdate/{id}', [KelasController::class, 'update'])->name('kelas.update');
        Route::get('/kelasUpdate/{id}', [KelasController::class, 'edit'])->name('kelas.editKelas');
    });
});

require __DIR__.'/auth.php';
