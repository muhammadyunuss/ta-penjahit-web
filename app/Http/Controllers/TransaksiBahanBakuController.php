<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\ModelAnda;
use App\Models\Pelanggan;
use App\Models\PembelianBahanBaku;
use App\Models\PembelianBahanBakuDetail;
use App\Models\Penjahit;
use App\Models\Supplier;
#use App\Models\TransaksiBahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PembelianBahanBaku::get();
        return view('transaksi-bahan-baku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapenjahit = Penjahit::all();
        $datasupplier = Supplier::all();

        return view('transaksi-bahan-baku.create', compact('datapenjahit', 'datasupplier'));
    }

    public function createDetail($id)
    {
        $data = DB::table('pembelian_bahanbaku')
        ->join('supplier','pembelian_bahanbaku.supplier_id','supplier.id')
        ->join('penjahit','pembelian_bahanbaku.penjahit_id','penjahit.id')
        ->where('pembelian_bahanbaku.id', $id)
        ->select(
            'pembelian_bahanbaku.*',
            'supplier.nama_supplier',
            'supplier.alamat',
            'supplier.email',
            'supplier.nomor_telepon',
            'penjahit.nama_penjahit',
            )
        ->first();

        $dataBahanBaku = BahanBaku::get();

        return view('transaksi-bahan-baku.create-detail', compact('data', 'dataBahanBaku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = PembelianBahanBaku::create($request->all())->id;

        if($request){
            return redirect()->route('transaksi.bahanbaku.detail.create', $id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('transaksi.bahanbaku.detail.create', $id)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function saveDetail(Request $request)
    {
        // dd($request->all());
        PembelianBahanBakuDetail::create($request->all());
        if($request){
            return redirect()->route('transaksi-bahanbaku.show', $request->pembelian_bahanbaku_id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('transaksi-bahanbaku.detail.create', $request->pembelian_bahanbaku_id)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiBahanBaku  $transaksiBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = DB::table('pembelian_bahanbaku')
        ->join('supplier','pembelian_bahanbaku.supplier_id','supplier.id')
        ->join('penjahit','pembelian_bahanbaku.penjahit_id','penjahit.id')
        ->where('pembelian_bahanbaku.id', $id)
        ->select(
            'pembelian_bahanbaku.*',
            'supplier.nama_supplier',
            'supplier.alamat',
            'supplier.email',
            'supplier.nomor_telepon',
            'penjahit.nama_penjahit',
            )
        ->first();
        $dataDetail = DB::table('detail_pembelian_bahanbaku')
        ->join('bahan_baku', 'detail_pembelian_bahanbaku.bahan_baku_id', 'bahan_baku.id')
        ->where('detail_pembelian_bahanbaku.pembelian_bahanbaku_id', $id)
        ->select(
            'detail_pembelian_bahanbaku.*',
            'bahan_baku.nama_bahanbaku as nama_bahan_baku',
        )
        ->get();
        return view('transaksi-bahan-baku.show', compact('data', 'dataDetail','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiBahanBaku  $transaksiBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiBahanBaku $transaksiBahanBaku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiBahanBaku  $transaksiBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiBahanBaku $transaksiBahanBaku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiBahanBaku  $transaksiBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pembelian_bahanbaku')->where('id', $id)->delete();
        DB::table('detail_pembelian_bahanbaku')->where('pembelian_bahanbaku_id', $id)->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Diupdate!']);
    }
}
