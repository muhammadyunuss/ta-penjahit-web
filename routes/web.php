<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DaftarPengirimanController;
use App\Http\Controllers\ModelAndaController;
use App\Http\Controllers\ModelBajuPelangganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DaftarProgresController;
use App\Http\Controllers\InformasiUkuranController;
use App\Http\Controllers\JadwalProgresController;
use App\Http\Controllers\JasaEkspedisiController;
use App\Http\Controllers\KolomRakController;
use App\Http\Controllers\LaporanTertanggungController;
use App\Http\Controllers\PengunaanBahanBakuController;
use App\Http\Controllers\RealisasiProgresController;
use App\Http\Controllers\TransaksiBahanBakuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UkuranPriaController;
use App\Http\Controllers\UkuranWanitaController;
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

// Route::get('/dashboard', function () {
//     return view('beranda');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [BerandaController::class, 'dashboard'])->name('dashboard');

    Route::prefix('bahan-baku')->group(function () {
        Route::get('tambah-detail-transaksi-bahanbaku/{id}', [TransaksiBahanBakuController::class, 'createDetail'])->name('transaksi.bahanbaku.detail.create');
        Route::post('save-detail-transaksi-bahanbaku', [TransaksiBahanBakuController::class, 'saveDetail'])->name('transaksi.bahanbaku.save.detail');
        Route::get('edit-detail-transaksi-bahanbaku/{id}', [TransaksiBahanBakuController::class, 'editDetailTransaksi'])->name('transaksi.bahanbaku.detail.edit');
        Route::put('update-detail-transaksi-bahanbaku/{id}', [TransaksiBahanBakuController::class, 'updateDetailTransaksi'])->name('transaksi.bahanbaku.update.detail');
        Route::put('update-transaksi-totalbayar/{id}/update', [TransaksiBahanBakuController::class, 'updateTransaksiTotalbayar'])->name('transaksi.update.totalbayar');
        Route::get('get-ajax-bahan-baku/{id}', [TransaksiBahanBakuController::class, 'getAjaxBahanBaku'])->name('get-ajax-bahan-baku');

        Route::resource('transaksi-bahanbaku', TransaksiBahanBakuController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('bahanbaku', BahanBakuController::class);
        Route::resource('kolomrak', KolomRakController::class);
    });

    Route::prefix('pemesanan')->group(function () {
        Route::prefix('transaksi')->group(function () {
            Route::get('tambah-detail-transaksi/{id}', [TransaksiController::class, 'createDetailTransaksi'])->name('transaksi.detail.create');
            Route::post('save-detail-transaksi', [TransaksiController::class, 'saveDetail'])->name('transaksi.save.detail');
            Route::get('edit-detail-transaksi/{id}', [TransaksiController::class, 'editDetailTransaksi'])->name('transaksi.detail.edit');
            Route::post('update-detail-transaksi', [TransaksiController::class, 'updateDetailTransaksi'])->name('transaksi.update.detail');
            Route::get('tambah-detail-transaksi-ukuran/{id}', [TransaksiController::class, 'createDetailTransaksiUkuran'])->name('transaksi.detail.ukuran.create');
            Route::post('save-detail-transaksi-ukuran', [TransaksiController::class, 'saveDetailUkuran'])->name('transaksi.save.detail.ukuran');
            Route::get('edit-detail-transaksi-ukuran/{id}', [TransaksiController::class, 'editDetailUkuran'])->name('transaksi.edit.detail.ukuran');
            Route::post('update-detail-transaksi-ukuran', [TransaksiController::class, 'updateDetailUkuran'])->name('transaksi.update.detail.ukuran');


            Route::post('save-bahan-baku', [TransaksiController::class, 'saveBahanBaku'])->name('transaksi.save.bahanbaku');
            Route::put('update-total-transaksi/{id}', [TransaksiController::class, 'updateTotalTransaksi'])->name('transaksi.update.total');
            Route::get('invoice-transaksi/{id}', [TransaksiController::class, 'invoiceTransaksi'])->name('transaksi.invoice');

            // AJAX
            Route::get('get-ajax-bahan-baku/{id}', [TransaksiController::class, 'getAjaxBahanBaku']);
            Route::get('get-ajax-model-to-jenismodel/{id}', [TransaksiController::class, 'getAjaxModelToJenisModel']);
            Route::get('get-ajax-jenismodel-ongkos/{id}', [TransaksiController::class, 'getAjaxModelOngkos']);
        });

        Route::resource('transaksi', TransaksiController::class);
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('modelanda', ModelAndaController::class);
        Route::resource('modelpelanggan', ModelBajuPelangganController::class);
        Route::resource('ukuranpria', UkuranPriaController::class);
        Route::resource('ukuranwanita', UkuranWanitaController::class);
        Route::resource('informasiukuran', InformasiUkuranController::class);
    });

    Route::prefix('produksi')->group(function () {
        Route::prefix('daftar-progres')->group(function () {

        });
        Route::prefix('jadwal-progres')->group(function () {
            Route::get('get-ajax-pemesanan-to-pemesanan-detail/{id}', [JadwalProgresController::class, 'getAjaxPemesanantoPemesananDetail'])->name('get-ajax-pemesanan-to-pemesanan-detail');
            Route::get('get-ajax-perencanaan-produksi-to-pemesanan-detail-edit/{id}', [JadwalProgresController::class, 'getAjaxPerencanaanProduksitoPemesananDetailEdit'])->name('get-ajax-perencanaan-produksi-to-pemesanan-detail-edit');
        });
        Route::prefix('peng-bahan-baku')->group(function () {
            Route::get('get-ajax-bahan-baku-first/{id}', [PengunaanBahanBakuController::class, 'getAjaxBahanBaku'])->name('get-ajax-bahan-baku-first');
            Route::get('get-all-ajax-bahan-baku-first/{id}', [PengunaanBahanBakuController::class, 'getAllAjaxBahanBaku'])->name('get-all-ajax-bahan-baku-first');
        });
        Route::prefix('realisasi-progres')->group(function () {
            Route::get('get-ajax-pemesanan-to-pemesanan-detail/{id}', [RealisasiProgresController::class, 'getAjaxPemesanantoPemesananDetail'])->name('realisasi-get-ajax-pemesanan-to-pemesanan-detail');
            Route::get('get-ajax-pemesanan-detail-to-perencanaan-produksi/{id}', [RealisasiProgresController::class, 'getAjaxPemesananDetailtoPerencanaanProduksi'])->name('realisasi-get-ajax-pemesanan-detail-to-perencanaan-produksi');
        });
        Route::resource('daftar-progres', DaftarProgresController::class);
        Route::resource('jadwal-progres', JadwalProgresController::class);
        Route::resource('peng-bahan-baku', PengunaanBahanBakuController::class);
        Route::resource('realisasi-progres', RealisasiProgresController::class);
        Route::resource('laporan-tertanggung', LaporanTertanggungController::class);
    });

    Route::prefix('pengiriman')->group(function () {
        Route::resource('jasaekspedisi', JasaEkspedisiController::class);
        Route::resource('daftar-pengiriman', DaftarPengirimanController::class);
    });

    Route::get('/admin/users', [AdminController::class, 'create'])->name('admin.users');
    Route::post('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');


});


require __DIR__.'/auth.php';
