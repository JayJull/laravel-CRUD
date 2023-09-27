<?php

use App\Http\Controllers\SiswaController;
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

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa'); // tampilan data siswa

Route::get('/tambahsiswa', [SiswaController::class, 'tambahsiswa'])->name('tambahsiswa'); // tampilan form tambah siswa
Route::post('/insertdatasiswa', [SiswaController::class, 'insertdatasiswa'])->name('insertdatasiswa'); // proses tambah siswa

Route::get('/editsiswa/{id}', [SiswaController::class, 'editsiswa'])->name('editsiswa');
Route::post('/updatesiswa/{id}', [SiswaController::class, 'updatesiswa'])->name('updatesiswa');

Route::get('/deletesiswa/{id}', [SiswaController::class, 'deletesiswa'])->name('deletesiswa');
