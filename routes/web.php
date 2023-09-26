<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\TransaksiController;
use App\Models\SuratJalan;

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

Route::resource('/pelanggan', PelangganController::class)->middleware('auth');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('su');
Route::get('/harinih', [HomeController::class, 'harinih'])->middleware('su');
Route::get('/bulannih', [HomeController::class, 'bulannih'])->middleware('su');
Route::get('/tahunnih', [HomeController::class, 'tahunnih'])->middleware('su');
Route::get('/', [PenggunaController::class, 'login'])->name('login');
Route::post('/login', [PenggunaController::class, 'attemp']);
Route::get('/logout', [PenggunaController::class, 'logout'])->middleware('auth');
Route::resource('/barang', BarangController::class)->middleware('auth');
Route::resource('/pengguna', PenggunaController::class)->middleware('su');
Route::get('/barang/{kategori}', [BarangController::class, 'filter'])->middleware('auth');
Route::get('/eksport', [BarangController::class, 'pdf'])->middleware('auth');
Route::post('/barang/tambah/{id}', [BarangController::class, 'tambah'])->middleware('auth');
Route::get('/kategori', [BarangController::class, 'kategori'])->middleware('auth');
Route::post('/kategori', [BarangController::class, 'kt'])->middleware('auth');
Route::get('/piutang', [TransaksiController::class, 'piutang'])->middleware('auth');
Route::get('/preview/{id}', [TransaksiController::class, 'preview'])->name('preview')->middleware('auth');
Route::get('/kasir', [TransaksiController::class, 'index'])->middleware('auth');
Route::get('/kasir/edit/{id}', [TransaksiController::class, 'edit'])->middleware('auth');
Route::get('/kasir/delete/{id}', [TransaksiController::class, 'destroy'])->middleware('auth');
Route::post('/kasir/update/{id}', [TransaksiController::class, 'update'])->middleware('auth');
Route::post('/kasir/polisi/{id}', [TransaksiController::class, 'polisi'])->middleware('auth');
Route::post('/kasir/kwit/{id}', [TransaksiController::class, 'kwit'])->middleware('auth');
Route::post('/kasir', [TransaksiController::class, 'store'])->middleware('auth');
Route::post('/piutang/{id}', [TransaksiController::class, 'storepiutang'])->middleware('auth');
Route::get('detail-barang-{id_barang}', [TransaksiController::class, 'detail'])->middleware('auth');
Route::get('pdf/{id}', [TransaksiController::class, 'pdf'])->name('pdf')->middleware('auth');
Route::get('proforma/{id}', [TransaksiController::class, 'proforma'])->name('proforma')->middleware('auth');
Route::get('kwitansi/{id}', [TransaksiController::class, 'kwitansi'])->name('kwitansi')->middleware('auth');
Route::get('suratjalan/{id}', [TransaksiController::class, 'suratjalan'])->name('suratjalan')->middleware('auth');
Route::get('/penjualan', [TransaksiController::class, 'penjualan'])->middleware('auth');
Route::get('/histori/penjualan', [HistoriController::class, 'penjualan'])->middleware('auth');
Route::get('/histori/barang', [HistoriController::class, 'barang'])->middleware('su');
Route::get('/histori/stok', [HistoriController::class, 'stok'])->middleware('su');
Route::get('/histori/jurnal', [HistoriController::class, 'jurnal'])->middleware('su');
Route::get('/histori/jurnal/{id}', [HistoriController::class, 'show'])->middleware('su');
Route::get('/histori', [HistoriController::class, 'index'])->middleware('su');
Route::get('/stokprint', [HistoriController::class, 'stokprint'])->middleware('su');
Route::get('/transprint/{id}', [HistoriController::class, 'transprint'])->middleware('su');
Route::post('/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::post('/laporan/laba', [LaporanController::class, 'laba'])->middleware('auth');
Route::get('/laporan', [LaporanController::class, 'view'])->middleware('auth');

Route::get('/test', function () {
  return view('index');
});
