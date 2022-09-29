<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;
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
    Route::resource('pelanggan', PelangganController::class);
    // Route::resource('modelpelanggans','ModelBajuPelangganController');
    // Route::resource('pelanggans','PelangganController');
    // Route::resource('transaksis', 'TransaksiController');
    // Route::resource('pemesananprias','PemesananPriaController');
    // Route::resource('pemesananwanitas','PemesananWanitaController');
});

require __DIR__.'/auth.php';
