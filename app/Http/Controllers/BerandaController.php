<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function dashboard()
    {
        // transaksi pembelian bahan baku
        $transaksi_pembelian = DB::table('pembelian_bahanbaku')->count();
        
        // Pembelian Bahan Baku Belum Dibayar
        $transaksi_belum_dibayar = DB::select("SELECT COUNT(CASE WHEN total>bayar THEN 1 END) as total FROM pembelian_bahanbaku");
        $transaksi_belum_dibayar = $transaksi_belum_dibayar[0]->total;
                
        // pengiriman telah dikirim
        //$transaksi_telah_dikirim = DB::select("SELECT COUNT(`pemesanan`.`id`) as jumlah_pesanan_telah_dikirim FROM `pemesanan` INNER JOIN `realisasi_produksi` ON `pemesanan`.`id` = `realisasi_produksi`.`pemesanan_id` WHERE `realisasi_produksi`.`proses_produksi_id` = 8");
        $transaksi_telah_dikirim = DB::select("SELECT COUNT(id) as jumlah_pesanan_telah_dikirim FROM `pengambilan`");
        $jumlah_pesanan_telah_dikirim = $transaksi_telah_dikirim[0]->jumlah_pesanan_telah_dikirim;

        // Total Transaksi Pemesanan Jasa Jahit
        $transaksi_pemesanan = DB::table('pemesanan')->count();

        // Kain yang harus dibeli
        $stock_bahan_baku = DB::table('bahan_baku')->where('stok', '<=', '5')->get();
        
        return view('beranda',compact('transaksi_pembelian','transaksi_belum_dibayar','transaksi_pemesanan', 'stock_bahan_baku', 'jumlah_pesanan_telah_dikirim'));
    }
}
