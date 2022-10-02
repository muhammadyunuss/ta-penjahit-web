<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\ModelAndaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('beranda');
})->middleware(['auth'])->name('dashboard');

Route::prefix('data-master')->group(function () {
    Route::resource('supplier', SupplierController::class);
    Route::resource('bahanbaku', BahanBakuController::class);
    // Route::resource('modelpelanggans','ModelBajuPelangganController');
    // Route::resource('pelanggans','PelangganController');
    // Route::resource('pemesananprias','PemesananPriaController');
    // Route::resource('pemesananwanitas','PemesananWanitaController');
});
Route::prefix('pemesanan')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('modelanda', ModelAndaController::class);

    Route::resource('transaksi', TransaksiController::class);
    Route::prefix('transaksi')->group(function () {
        Route::get('tambah-detail-transaksi/{id}', [TransaksiController::class, 'createDetailTransaksi'])->name('transaksi.detail.create');
        Route::get('edit-detail-transaksi/{id}', [TransaksiController::class, 'editDetailTransaksi'])->name('transaksi.detail.edit');
        Route::post('save-detail-transaksi', [TransaksiController::class, 'saveDetail'])->name('transaksi.save.detail');
        Route::post('update-detail-transaksi', [TransaksiController::class, 'updateDetailTransaksi'])->name('transaksi.update.detail');
    });
});

require __DIR__.'/auth.php';
