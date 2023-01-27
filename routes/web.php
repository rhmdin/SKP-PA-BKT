<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\MainController;

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




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/indikator-kinerja', [IkuController::class, 'getIku'])->name('iku');
Route::get('/rencana-strategis', [IkuController::class, 'getRenstra'])->name('renstra');

Route::get('/login', [MainController::class, 'index']);
Route::post('/login/check', [MainController::class, 'checklogin']);
Route::get('/logout', [MainController::class, 'logout']);
