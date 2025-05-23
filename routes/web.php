<?php

use App\Http\Controllers\DetailIkuController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\SasaranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TujuanController;
use App\Models\Tujuan;

Auth::routes();
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
    return view('auth/login');
});

Route::get('/login', [MainController::class, 'index']);
Route::post('/login/check', [MainController::class, 'checklogin']);
Route::get('/logout', [MainController::class, 'logout']);


Route::get('/indikator-kinerja', [IkuController::class, 'getIku'])->name('iku');
Route::get('/rencana-strategis', [IkuController::class, 'getRenstra'])->name('renstra');
Route::get('/rencana-kinerja-tahunan', [IkuController::class, 'getRkt'])->name('rkt');
Route::get('/perjanjian-kinerja', [DetailIkuController::class, 'getPk'])->name('pk');

Route::get('/sasaran-strategis', [SasaranController::class, 'getSasaran'])->name('sasaran');
Route::get('/sasaran-strategis/tambah', [SasaranController::class, 'getTujuan'])->name('tambahSasaran');
Route::post('/sasaran-strategis', [SasaranController::class, 'store']);
Route::get('/sasaran-strategis/{sasaran}', [SasaranController::class, 'edit'])->name('editSasaran');
Route::put('/sasaran-strategis/{sasaran}', [SasaranController::class, 'update']);
Route::get('/sasaran-strategis/{sasaran}/destroy', [SasaranController::class, 'destroy']);

Route::get('/indikator-kinerja/tambah', [IkuController::class, 'getSasaran'])->name('tambahIku');
Route::post('/indikator-kinerja', [IkuController::class, 'store']);
Route::get('/indikator-kinerja/{iku}', [IkuController::class, 'edit'])->name('editIku');
Route::put('/indikator-kinerja/{iku}', [IkuController::class, 'update']);
Route::get('/indikator-kinerja/{iku}/destroy', [IkuController::class, 'destroy']);

Route::get('/input-indikator/{iku}', [IkuController::class, 'getInput'])->name('input');
Route::get('/input-indikator/{iku}/tambah', [IkuController::class, 'get'])->name('tambahInput');
Route::post('/input-indikator/{iku}', [IkuController::class, 'storeInput']);
Route::get('/input-indikator/{iku}/{id}/destroy', [IkuController::class, 'destroyInput']);


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
Route::get('/pengukuran-kinerja/{peng}/destroy', [PengukuranController::class, 'destroy']);
Route::get('/pengukuran-kinerja/{peng}', [PengukuranController::class, 'edit'])->name('editPeng');
Route::put('/pengukuran-kinerja/{peng}', [PengukuranController::class, 'update']);


Route::get('/laporan', [LaporanController::class, 'getLap'])->name('laporan');
Route::get('/laporan/rekap/{tahun}/bulan', [LaporanController::class, 'getBln'])->name('rekapbulan');
Route::get('/laporan/rekap/{tahun}/triwulan', [LaporanController::class, 'getTri'])->name('rekaptriwulan');
Route::get('/laporan/rekap/{tahun}/semester', [LaporanController::class, 'getSem'])->name('rekapsemester');


Route::get('/tujuan', [TujuanController::class, 'getTujuan'])->name('tujuan');
Route::get('/tujuan/tambah', [TujuanController::class, 'addTujuan'])->name('tambahTujuan');
Route::post('/tujuan', [TujuanController::class, 'store']);
Route::get('/tujuan/{tujuan}', [TujuanController::class, 'edit'])->name('editTujuan');
Route::put('/tujuan/{tujuan}', [TujuanController::class, 'update']);
Route::get('/tujuan/{tujuan}/destroy', [TujuanController::class, 'destroy']);

?>