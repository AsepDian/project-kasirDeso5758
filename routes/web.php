<?php

use App\Http\Controllers\CekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware('level:admin')->group(function () {
        
        Route::get('admin', [DashboardController::class, 'index']);
        //user
        Route::resource('user', UsersController::class);
        
        //menu
        Route::resource('menu', MenuController::class);
        
        //kategori
        Route::get('dataKategori', [KategoriController::class, 'index']);
        Route::post('addKategori', [KategoriController::class, 'add']);
        Route::get('hapuskategori/{id}', [KategoriController::class, 'hapus']);
        Route::get('editkategori/{id}', [KategoriController::class, 'edit']);
        Route::post('editkategori/{id}', [KategoriController::class, 'update']);
        
        //laporan
        Route::get('laporan', [LaporanController::class, 'index']);
    });
    Route::middleware('level:kasir')->group(function () {
        
        Route::get('kasir', [KasirController::class, 'dashboard']);
        //Kasir
        Route::get('kasirmenu', [KasirController::class, 'index']);
        Route::get('kasirtrans', [KasirController::class, 'oldtransaksi']);
        Route::get('detail/edit/{id}', [KasirController::class, 'edit']);
        Route::post('cari', [KasirController::class, 'cari']);

        //pesanan
        Route::resource('pesanan', PesananController::class);

        //transaksi
        Route::post('transaksi/bayar/{transaksi}', [TransaksiController::class, 'bayar']);
        Route::post('transaksi/cetak/{transaksi}', [TransaksiController::class, 'cetak']);
        Route::resource('transaksi', TransaksiController::class);
        Route::post('transaksi/update/{id}', [TransaksiController::class, 'updatejml']);
        Route::get('transaksi/hapus/{id}', [TransaksiController::class, 'delete']);
    });
});
