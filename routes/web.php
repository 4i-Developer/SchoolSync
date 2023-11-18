<?php

use App\Http\Controllers\ProfileController;
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
    
    Route::get('/guru/presensi', function () {
        return view('guru.presensi');
    })->name('guru.presensi');

    Route::get('/guru/jadwal', function () {
        return view('guru.jadwal');
    })->name('guru.jadwal');
});

Route::get('/developer', function () {
    // Hanya admin yang dapat mengakses halaman ini
})->middleware('checkRole:developer');
Route::get('/admin', function () {
    // Hanya admin yang dapat mengakses halaman ini
})->middleware('checkRole:admin');
Route::get('/guru', function () {
    // Hanya guru yang dapat mengakses halaman ini
})->middleware('checkRole:guru');
Route::get('/wali', function () {
    // Hanya wali murid yang dapat mengakses halaman ini
})->middleware('checkRole:wali');
Route::get('/siswa', function () {
    // Hanya siswa yang dapat mengakses halaman ini
})->middleware('checkRole:siswa');

require __DIR__.'/auth.php';
