<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['auth', 'checkRole:guru'])->group(function () {
        Route::get('/guru/presensi', function () {
            return view('guru.presensi');
        })->name('guru.presensi');
    
        Route::get('/guru/jadwal', function () {
            return view('guru.jadwal');
        })->name('guru.jadwal');
    });

    Route::middleware(['auth', 'checkRole:admin'])->group(function () {
        Route::post('/kelas', [AdminController::class, 'store'])->name('kelas.store');
        Route::get('/kelas', [AdminController::class, 'index'])->name('kelas.daftarKelas');
        Route::get('/kelasTambah', [AdminController::class, 'create'])->name('kelas.tambahKelas');
        Route::get('/kelasView/{id}', [AdminController::class, 'show'])->name('kelas.infoKelas');
    });
});

require __DIR__.'/auth.php';
