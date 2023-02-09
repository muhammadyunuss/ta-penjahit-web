<?php

namespace App\Http\Controllers;

use App\Models\ModelAnda;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiUkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        if($id){
            $data = ViewRepository::view_ukuran2($id);
        }else{
            $data = ViewRepository::view_ukuran();
        }

        $viewTransaksiPemesanan = ViewRepository::view_transaksi_pemesanan_model();

        return view('informasi-ukuran.index',compact('data', 'viewTransaksiPemesanan', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataModelDetailUkuran = DB::table('detail_pemesanan_model_ukuran')
        ->where('id', $id)
        ->first();

        $dataModelDetail = DB::table('detail_pemesanan_model')
        ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
        ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
        ->where('detail_pemesanan_model.id', $dataModelDetailUkuran->detail_pemesanan_model_id)
        ->select(
            'detail_pemesanan_model.*',
            'model.nama_model as nama_model',
            'jenis_model.nama_jenismodel as nama_jenismodel'
        )
        ->first();

        $data = DB::table('pemesanan')
        ->join('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
        ->join('penjahit','pemesanan.penjahit_id', 'penjahit.id')
        ->where('pemesanan.id', $dataModelDetail->pemesanan_id)
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan as nama_pelanggan',
            'pelanggan.email as email_pelanggan',
            'pelanggan.no_telepon as no_telepon_pelanggan',
            'pelanggan.alamat as alamat_pelanggan',
            'penjahit.nama_penjahit as nama_penjahit'
        )
        ->first();

        return view('informasi-ukuran.show', compact('data','dataModelDetail', 'dataModelDetailUkuran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
