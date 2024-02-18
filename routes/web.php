<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PekerjaanContoller;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProyekContoller;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TipePekrjaanContoller;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('plogin');
Route::get('/register', [AuthController::class, 'create'])->name('create');
Route::post('/registered', [AuthController::class, 'created'])->name('created');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/home/klien', KlienController::class)->middleware('auth');
Route::resource('/home/pekerjaan', PekerjaanContoller::class)->middleware('auth');
Route::resource('/home/tipepekerjaan', TipePekrjaanContoller::class)->middleware('auth');
Route::resource('/home/proyek', ProyekContoller::class)->middleware('auth');
Route::get('/home/proyek/beli/{proyek}', [ProyekContoller::class, 'beli'])->name('proyekbeli')->middleware('auth');
Route::post('/home/proyek/beli/{proyek}', [ProyekContoller::class, 'belistore'])->name('proyekstore')->middleware('auth');
Route::get('/home/proyek/tawar/{proyek}', [ProyekContoller::class, 'tawar'])->name('tawarproyek')->middleware('auth');
Route::post('/home/proyek/tawar/{proyek}', [ProyekContoller::class, 'tawarstore'])->name('tawarstore')->middleware('auth');
Route::get('/home/pembelian', [PembelianController::class, 'index'])->name('pembelian')->middleware('auth');
Route::delete('/home/pembelian/{proyek}', [PembelianController::class, 'destroy'])->name('delpembelian')->middleware('auth');
Route::get('/home/tagihan', [TagihanController::class, 'index'])->name('tagihan')->middleware('auth');
Route::delete('/home/tagihan/{proyek}', [TagihanController::class, 'destroy'])->name('deltagihan')->middleware('auth');
Route::put('/home/tagihan/{proyek}', [TagihanController::class, 'update'])->name('updatetagihan')->middleware('auth');
Route::get('/home/penawaran', [PenawaranController::class, 'index'])->name('tawar')->middleware('auth');
Route::put('/home/penawaran/{proyek}', [PenawaranController::class, 'update'])->name('updatetawar')->middleware('auth');
Route::delete('/home/penawaran/{proyek}', [PenawaranController::class, 'destroy'])->name('deltawar')->middleware('auth');
Route::resource('/home/permintaan', PermintaanController::class)->middleware('auth');
Route::get('/home/terimapermintaan/{proyek}', [PermintaanController::class, 'terima'])->name('permintaan.terima')->middleware('auth');
Route::get('/home/perusahaan', [PerusahaanController::class, 'index'])->middleware('auth');
Route::get('/home/perusahaan/{proyek}/edit', [PerusahaanController::class, 'edit'])->middleware('auth');
Route::put('/home/perusahaan/{proyek}/edit', [PerusahaanController::class, 'update'])->middleware('auth');
