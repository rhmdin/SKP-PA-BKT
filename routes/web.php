<?php

use App\Http\Controllers\DetailIkuController;
use App\Http\Controllers\PengukuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkuController;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/indikator-kinerja', [IkuController::class, 'getIku'])->name('iku');
Route::get('/rencana-strategis', [IkuController::class, 'getRenstra'])->name('renstra');
Route::get('/rencana-kinerja-tahunan', [IkuController::class, 'getRkt'])->name('rkt');
Route::get('/perjanjian-kinerja', [DetailIkuController::class, 'getPk'])->name('pk');

Route::get('/indikator-kinerja/tambah', [IkuController::class, 'getSasaran'])->name('tambahIku');
Route::post('/indikator-kinerja', [IkuController::class, 'store']);
Route::get('/indikator-kinerja/{iku}', [IkuController::class, 'edit'])->name('editIku');
Route::put('/indikator-kinerja/{iku}', [IkuController::class, 'update']);
Route::get('/indikator-kinerja/{iku}/destroy', [IkuController::class, 'destroy']);

Route::get('/perjanjian-kinerja/{pk}', [DetailIkuController::class, 'editPk'])->name('editPk');
Route::put('/perjanjian-kinerja/{pk}', [DetailIkuController::class, 'updatePk']);

Route::get('/rencana-kinerja-tahunan/tambah', [DetailIkuController::class, 'getIku'])->name('tambahRkt');
Route::post('/rencana-kinerja-tahunan/tambah', [DetailIkuController::class, 'store']);
Route::get('/rencana-kinerja-tahunan/{rkt}/destroy', [DetailIkuController::class, 'destroy']);
Route::get('/rencana-kinerja-tahunan/{rkt}', [DetailIkuController::class, 'edit'])->name('editRkt');
Route::put('/rencana-kinerja-tahunan/{rkt}', [DetailIkuController::class, 'update']);

Route::get('/pengukuran-kinerja', [PengukuranController::class, 'getPeng'])->name('pengukuran');
Route::get('/pengukuran-kinerja/tambah', [PengukuranController::class, 'getIku'])->name('tambahPeng');
Route::post('/pengukuran-kinerja/tambah', [PengukuranController::class, 'store']);