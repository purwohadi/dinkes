<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RegistrasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PasienController::class, 'index']);

/**Pasien */
Route::get('/pasien', [PasienController::class, 'index']);
Route::post('store', [PasienController::class,'store'])->name('simpan');
Route::get('pasien/create', [PasienController::class,'create'])->name('create');
Route::get('pasien/show', [PasienController::class,'show'])->name('show');
Route::get('pasien/edit', [PasienController::class,'edit'])->name('edit');
Route::get('pasien', [PasienController::class, 'index'])->name('index');
Route::put('update', [PasienController::class,'update'])->name('update');
Route::delete('delete', [PasienController::class, 'destroy'])->name('delete');

/**Dokter */
Route::get('dokter', [DokterController::class, 'index'])->name('indexDokter');
Route::post('dokter/store', [DokterController::class,'store'])->name('simpanDokter');
Route::get('dokter/create', [DokterController::class,'create'])->name('createDokter');
Route::get('dokter/show', [DokterController::class,'show'])->name('showDokter');
Route::get('dokter/edit', [DokterController::class,'edit'])->name('editDokter');
Route::put('dokter/update', [DokterController::class,'update'])->name('updateDokter');
Route::delete('dokter/delete', [DokterController::class, 'destroy'])->name('deleteDokter');

/**Poli */
Route::get('poli', [PoliController::class, 'index'])->name('indexPoli');
Route::post('poli/store', [PoliController::class,'store'])->name('simpanPoli');
Route::get('poli/create', [PoliController::class,'create'])->name('createPoli');
Route::get('poli/show', [PoliController::class,'show'])->name('showPoli');
Route::get('poli/edit', [PoliController::class,'edit'])->name('editPoli');
Route::put('poli/update', [PoliController::class,'update'])->name('updatePoli');
Route::delete('poli/delete', [PoliController::class, 'destroy'])->name('deletePoli');

/**registrasi */
Route::get('registrasi', [RegistrasiController::class, 'index'])->name('indexRegistrasi');
Route::post('registrasi/store', [RegistrasiController::class,'store'])->name('simpanRegistrasi');
Route::get('registrasi/create', [RegistrasiController::class,'create'])->name('createRegistrasi');
Route::get('registrasi/show', [RegistrasiController::class,'show'])->name('showRegistrasi');
Route::get('registrasi/edit', [RegistrasiController::class,'edit'])->name('editRegistrasi');
Route::put('registrasi/update', [RegistrasiController::class,'update'])->name('updateRegistrasi');
Route::delete('registrasi/delete', [RegistrasiController::class, 'destroy'])->name('deleteRegistrasi');