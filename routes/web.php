<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\ModelAndaController;
use App\Http\Controllers\ModelBajuPelangganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DaftarProgresController;
use App\Http\Controllers\JadwalProgresController;
use App\Http\Controllers\PengunaanBahanBakuController;
use App\Http\Controllers\RealisasiProgresController;
use App\Http\Controllers\TransaksiBahanBakuController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('beranda');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('bahan-baku')->group(function () {
        Route::resource('supplier', SupplierController::class);
        Route::resource('bahanbaku', BahanBakuController::class);

        Route::resource('transaksi-bahanbaku', TransaksiBahanBakuController::class);
        Route::get('tambah-detail-transaksi-bahanbaku/{id}', [TransaksiBahanBakuController::class, 'createDetail'])->name('transaksi.bahanbaku.detail.create');
        Route::post('save-detail-transaksi-bahanbaku', [TransaksiBahanBakuController::class, 'saveDetail'])->name('transaksi.bahanbaku.save.detail');
        Route::get('edit-detail-transaksi-bahanbaku/{id}', [TransaksiBahanBakuController::class, 'editDetailTransaksi'])->name('transaksi.bahanbaku.detail.edit');
        Route::post('update-detail-transaksi-bahanbaku', [TransaksiBahanBakuController::class, 'updateDetailTransaksi'])->name('transaksi.bahanbaku.update.detail');

    });

    Route::prefix('pemesanan')->group(function () {
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('modelanda', ModelAndaController::class);
        Route::resource('modelpelanggan', ModelBajuPelangganController::class);

        Route::resource('transaksi', TransaksiController::class);
        Route::prefix('transaksi')->group(function () {
            Route::get('tambah-detail-transaksi/{id}', [TransaksiController::class, 'createDetailTransaksi'])->name('transaksi.detail.create');
            Route::post('save-detail-transaksi', [TransaksiController::class, 'saveDetail'])->name('transaksi.save.detail');
            Route::get('edit-detail-transaksi/{id}', [TransaksiController::class, 'editDetailTransaksi'])->name('transaksi.detail.edit');
            Route::post('update-detail-transaksi', [TransaksiController::class, 'updateDetailTransaksi'])->name('transaksi.update.detail');

            Route::post('save-bahan-baku', [TransaksiController::class, 'saveBahanBaku'])->name('transaksi.save.bahanbaku');
            Route::put('update-total-transaksi/{id}', [TransaksiController::class, 'updateTotalTransaksi'])->name('transaksi.update.total');
            Route::get('invoice-transaksi/{id}', [TransaksiController::class, 'invoiceTransaksi'])->name('transaksi.invoice');

            // AJAX
            Route::get('get-ajax-bahan-baku/{id}', [TransaksiController::class, 'getAjaxBahanBaku']);
            Route::get('get-ajax-model-to-jenismodel/{id}', [TransaksiController::class, 'getAjaxModelToJenisModel']);
        });
    });

    Route::prefix('produksi')->group(function () {
        Route::resource('daftar-progres', DaftarProgresController::class);
        Route::prefix('daftar-progres')->group(function () {

        });

        Route::resource('jadwal-progres', JadwalProgresController::class);
        Route::prefix('jadwal-progres')->group(function () {
            Route::get('get-ajax-pemesanan-to-pemesanan-detail/{id}', [JadwalProgresController::class, 'getAjaxPemesanantoPemesananDetail'])->name('get-ajax-pemesanan-to-pemesanan-detail');
            Route::get('get-ajax-perencanaan-produksi-to-pemesanan-detail-edit/{id}', [JadwalProgresController::class, 'getAjaxPerencanaanProduksitoPemesananDetailEdit'])->name('get-ajax-perencanaan-produksi-to-pemesanan-detail-edit');
        });

        Route::resource('peng-bahan-baku', PengunaanBahanBakuController::class);
        Route::resource('realisasi-progres', RealisasiProgresController::class);

    });

});


require __DIR__.'/auth.php';
