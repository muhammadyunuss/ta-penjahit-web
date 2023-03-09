<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\DetailPemesanan;
use App\Models\DetailPemesananBahanBaku;
use App\Models\Pemesanan;
use App\Models\ProsesProduksi;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunaanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $data = DB::table('detail_pemesanan_bahanbaku')
        ->join('bahan_baku','detail_pemesanan_bahanbaku.bahan_baku_id','bahan_baku.id');
        if($id){
            $data->where('detail_pemesanan_bahanbaku.detail_pemesanan_model_id', $id);
        }
        // ->join('detail_pemesanan_model', 'detail_pemesanan_bahanbaku.detail_pemesanan_model_id', 'detail_pemesanan_model.id')
        $data = $data->whereNotNull('detail_pemesanan_bahanbaku.jumlah_terpakai')
        ->select(
            'detail_pemesanan_bahanbaku.*',
            'bahan_baku.nama_bahanbaku',
            'bahan_baku.stok',
            'bahan_baku.satuan'
        )
        ->get();

        $viewTransaksiPemesanan = ViewRepository::view_transaksi_pemesanan_model();
        return view('peng-bahan-baku.index', compact('data', 'viewTransaksiPemesanan','id'));
    }

    function getAllAjaxBahanBaku($id){
        $detail_pemesanan_bahan_baku = DetailPemesananBahanBaku::where('detail_pemesanan_model_id', $id)->first();
        // dd($detail_pemesanan_bahan_baku->bahan_baku_id);
        if($detail_pemesanan_bahan_baku == null){
            $dataBahanBaku = null;
        }else{
            $dataBahanBaku = BahanBaku::where('id', $detail_pemesanan_bahan_baku->bahan_baku_id)->get();

        }
        // dd($dataBahanBaku);
        return response()->json($dataBahanBaku);
    }

    function getAjaxBahanBaku($id){
        $dataBahanBaku = BahanBaku::where('id', $id)->first();
        return response()->json($dataBahanBaku);
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
        // dd($request->all());
        $pengBahanBaku = DB::table('detail_pemesanan_bahanbaku')
        ->where('pemesanan_id', $request->pemesanan_id)
        ->where('detail_pemesanan_model_id', $request->detail_pemesanan_model_id)
        ->where('bahan_baku_id', $request->bahan_baku_id)
        // ->where('ongkos_jahit', '>' , 0)
        ->count();

        if($pengBahanBaku > 0 ) {
            $pengBahanBakuId = DB::table('detail_pemesanan_bahanbaku')
            ->where('pemesanan_id', $request->pemesanan_id)
            ->where('detail_pemesanan_model_id', $request->detail_pemesanan_model_id)
            ->where('bahan_baku_id', $request->bahan_baku_id)
            // ->where('ongkos_jahit', '>' , 0)
            ->first();

            $pengBahanBaku = DB::table('detail_pemesanan_bahanbaku')
            ->where('id', $pengBahanBakuId->id)
            ->first();

            $bahanBaku = DB::table('bahan_baku')
            ->where('id', $pengBahanBaku->bahan_baku_id)
            ->first();

            $pemakaian_old = $pengBahanBaku->jumlah_terpakai;
            $pemakaian_new = floatval($request->jumlah_terpakai);
            $bahanBakustock = $bahanBaku->stok;
            $laststock = ($bahanBakustock + $pemakaian_old) - $pemakaian_new;
            // $laststock = $bahanBakustock - $pemakaian_new;
            #bahanBakustock = 11 #master
            #pemakaian_old = 0 #pemakaian sebelumnya
            #pemakaian_new = 2 #pemakaian yg baru saja diinput
            #laststock = (11+0)-2 = 9

            // 9+6 -7

            $data = new DetailPemesananBahanBaku();
            $data->where('id', $pengBahanBakuId->id)->update(request()->except(['_token', '_method']));
            // dd($laststock);
            $bahanBaku = BahanBaku::findOrFail($pengBahanBaku->bahan_baku_id);
            $bahanBaku->update([
                'stok'     => $laststock
            ]);
        }else{
            $id = DetailPemesananBahanBaku::create($request->all())->id;

            $pengBahanBaku = DB::table('detail_pemesanan_bahanbaku')
            ->where('id', $id)
            ->first();

            $bahanBaku = DB::table('bahan_baku')
            ->where('id', $pengBahanBaku->bahan_baku_id)
            ->first();

            $pemakaian_old = $pengBahanBaku->jumlah_terpakai;
            $pemakaian_new = floatval($request->jumlah_terpakai);
            $bahanBakustock = $bahanBaku->stok;
            // $laststock = ($bahanBakustock + $pemakaian_old) - $pemakaian_new;
            $laststock = $bahanBakustock - $pemakaian_new;

            $bahanBaku = BahanBaku::findOrFail($pengBahanBaku->bahan_baku_id);
            $bahanBaku->update([
                'stok'     => $laststock
            ]);


        }

        #1. read dulu dari tabel detail_pemesanan_bahanbaku
        /*
        ("SELECT * FROM detail_pemesanan_bahanbaku WHERE bahan_baku_id='.$bahan_baku_id.' AND pemesanan_id='.$pemesanan_id.' AND ongkos_jahit>0")
        $counting_row = x

        if($counting_row>0){
            script update
        }
        else{
            script insertwi
        }
        */

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
        // dd($request->all());
        $bahan_baku = BahanBaku::where('id', $request->bahan_baku_id)->first();
        $peng_bahan_baku = DB::table('detail_pemesanan_bahanbaku')
            ->where('id', $id)
            ->first();

            // dd($peng_bahan_baku);

        $pemakaian_old = $bahan_baku->stok;
        $pemakaian_new = floatval($request->jumlah_terpakai);
        $peng_bahan_baku_stock = $peng_bahan_baku->jumlah_terpakai;
        $laststock = ($pemakaian_new + $pemakaian_old) - $peng_bahan_baku_stock;
        // a = 80 + 140 - 100

        $bahanBaku = BahanBaku::findOrFail($request->bahan_baku_id);
            $bahanBaku->update([
                'stok'     => $laststock
            ]);

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
