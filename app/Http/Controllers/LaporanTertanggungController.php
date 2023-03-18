<?php

namespace App\Http\Controllers;

use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanTertanggungController extends Controller
{
    public function index()
    {
        $id_penjahit = auth()->user()->id_penjahit;
        $data = DB::table('pemesanan')
        ->leftjoin('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
        ->leftjoin('penjahit','pemesanan.penjahit_id', 'penjahit.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan as nama_pelanggan',
            'penjahit.nama_penjahit as nama_penjahit'
        )
        ->get();

        $bahanBaku = DB::table('bahan_baku')->get();
        //$viewTanggunanPesanan = ViewRepository::view_tanggungan_pesanan()->where('penjahit_id', $id_penjahit);
        $view_laporan_daftar_tpj = ViewRepository::view_laporan_daftar_tanggungan_produksi_jahit2($id_penjahit);

        //return view('laporan-tertanggung.index',compact('data','bahanBaku', 'viewTanggunanPesanan', 'view_laporan_daftar_tpj'));
        return view('laporan-tertanggung.index',compact('data','bahanBaku', 'view_laporan_daftar_tpj'));
    }
}
