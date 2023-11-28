<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['auth', 'checkRole:guru'])->group(function () {
        Route::get('/guru/presensi', function () {
            return view('guru.presensi');
        })->name('guru.presensi');
        Route::get('/guru/jadwal', [JadwalController::class, 'showJadwal'])->name('guru.jadwal');
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
