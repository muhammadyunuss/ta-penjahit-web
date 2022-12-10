<?php

namespace App\Http\Controllers;

use App\Models\JasaEkspedisi;
use App\Models\ModelAnda;
use App\Models\Pemesanan;
use App\Models\Pengambilan;
use App\Models\ProsesProduksi;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $pemesanan_id = $request->pemesanan_id ?? null;
            $data = Pengambilan::leftjoin('pemesanan', 'pengambilan.pemesanan_id', 'pemesanan.id')
            ->leftjoin('detail_pemesanan_model', 'pemesanan.id', 'detail_pemesanan_model.pemesanan_id')
            ->leftjoin('model', 'detail_pemesanan_model.model_id', 'model.id')
            ->leftjoin('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
            ->leftjoin('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
            ->leftjoin('jasa_ekspedisi', 'pengambilan.jasa_ekspedisi_id', 'jasa_ekspedisi.id')
            ->where('pengambilan.pemesanan_id', 'LIKE', '%'.$pemesanan_id.'%')
            ->select(
                'pengambilan.*',
                'pelanggan.nama_pelanggan',
                'pelanggan.alamat as alamat_pelanggan',
                'model.nama_model as nama_model',
                'jenis_model.nama_jenismodel as nama_jenismodel',
                'jasa_ekspedisi.jasa_ekspedisi'
            )
            ->get();

            return DataTables()->of($data)
            ->make(true);
        }
        $pemesanan = Pemesanan::join('pelanggan', 'pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();
        return view('daftar-pengiriman.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jasaEkspedisi = JasaEkspedisi::get();
        $pemesanan = DB::table('pemesanan')
        ->join('pelanggan','pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();
        return view('daftar-pengiriman.create',compact('jasaEkspedisi', 'pemesanan', 'jasaEkspedisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengambilan::create($request->all());

        return redirect()->route('daftar-pengiriman.index')->with('status','Data Anda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
