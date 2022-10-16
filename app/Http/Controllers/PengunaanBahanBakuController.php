<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\DetailPemesananBahanBaku;
use App\Models\ProsesProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunaanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('detail_pemesanan_bahanbaku')
        ->join('bahan_baku','detail_pemesanan_bahanbaku.bahan_baku_id','bahan_baku.id')
        // ->join('detail_pemesanan_model', 'detail_pemesanan_bahanbaku.detail_pemesanan_model_id', 'detail_pemesanan_model.id')
        ->select(
            'detail_pemesanan_bahanbaku.*',
            'bahan_baku.nama_bahanbaku',
            'bahan_baku.stok',
            'bahan_baku.satuan'
        )
        ->get();
        // dd($data);
        return view('peng-bahan-baku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemesanan = DB::table('pemesanan')
        ->join('pelanggan','pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();
        $prosesProduksi = ProsesProduksi::get();
        $bahanBaku = BahanBaku::get();


        return view('peng-bahan-baku.create', compact('pemesanan', 'prosesProduksi', 'bahanBaku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailPemesananBahanBaku::create($request->all());

        if($request){
            return redirect()->route('peng-bahan-baku.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('peng-bahan-baku.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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

        $pengBahanBaku = DB::table('detail_pemesanan_bahanbaku')
        ->leftjoin('detail_pemesanan_model','detail_pemesanan_bahanbaku.detail_pemesanan_model_id','detail_pemesanan_model.id')
        // ->join('pemesanan','detail_pemesanan_model.pemesanan_id','pemesanan.id')
        ->where('detail_pemesanan_bahanbaku.id', $id)
        ->select(
            'detail_pemesanan_bahanbaku.*',
            'detail_pemesanan_model.pemesanan_id'
        )
        ->first();
        // dd($pengBahanBaku);
        $pemesanan = DB::table('pemesanan')
        ->join('pelanggan','pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();
        $prosesProduksi = ProsesProduksi::get();
        $bahanBaku = BahanBaku::get();


        return view('peng-bahan-baku.edit', compact('pemesanan', 'prosesProduksi', 'bahanBaku', 'pengBahanBaku'));
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
        $data = new DetailPemesananBahanBaku();
        $data->where('id', $id)->update(request()->except(['_token', '_method','pemesanan_id']));

        if($request){
            return redirect()->route('peng-bahan-baku.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('peng-bahan-baku.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailPemesananBahanBaku::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
