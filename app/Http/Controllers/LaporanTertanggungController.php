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
        ->join('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
        ->join('penjahit','pemesanan.penjahit_id', 'penjahit.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan as nama_pelanggan',
            'penjahit.nama_penjahit as nama_penjahit'
        )
        ->get();

        $bahanBaku = DB::table('bahan_baku')->get();
        $viewTanggunanPesanan = ViewRepository::view_tanggungan_pesanan()->where('penjahit_id', $id_penjahit);
        return view('laporan-tertanggung.index',compact('data','bahanBaku', 'viewTanggunanPesanan'));
    }
}
