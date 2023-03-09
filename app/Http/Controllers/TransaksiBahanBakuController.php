<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\DetailPemesananBahanBaku;
use App\Models\DetailTransaksiBahanBaku;
use App\Models\ModelAnda;
use App\Models\Pelanggan;
use App\Models\PembelianBahanBaku;
use App\Models\PembelianBahanBakuDetail;
use App\Models\Penjahit;
use App\Models\Supplier;
use App\Models\TransaksiBahanBaku;
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
        $data = PembelianBahanBaku::join('supplier', 'pembelian_bahanbaku.supplier_id', 'supplier.id' )
        ->select(
            'pembelian_bahanbaku.*',
            'supplier.nama_supplier'
        )
        ->get();
        return view('transaksi-bahan-baku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_penjahit = auth()->user()->id_penjahit;
        $datapenjahit = Penjahit::where('id', $id_penjahit)->first();
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

        $dataBahanBaku = BahanBaku::where('supplier_id', $data->supplier_id)->get();

        return view('transaksi-bahan-baku.create-detail', compact('data', 'dataBahanBaku'));
    }

    public function getAjaxBahanBaku($id)
    {
        $bahanbaku = DB::table('bahan_baku')
        ->where('id', $id)
        ->get();
        return response()->json($bahanbaku);
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
        PembelianBahanBakuDetail::create($request->all());
        BahanBaku::where('id', $request->bahan_baku_id)->update(request()->except(['_token','subtotal','jumlah', 'pembelian_bahanbaku_id', 'bahan_baku_id']));
        
        $bahanBaku = DB::table('bahan_baku')
        ->where('id', $request->bahan_baku_id)
        ->first();

        $pemakaian_old = $bahanBaku->stok;
        $pemakaian_new = floatval($request->jumlah);
        $laststock = ($pemakaian_old + $pemakaian_new);

        $bahanBaku = BahanBaku::findOrFail($bahanBaku->id);
        $bahanBaku->update([
            'stok'     => $laststock
        ]);

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

    public function editDetailTransaksi($id)
    {
        $dataDetail = DB::table('detail_pembelian_bahanbaku')
        ->join('bahan_baku', 'detail_pembelian_bahanbaku.bahan_baku_id', 'bahan_baku.id')
        ->where('detail_pembelian_bahanbaku.id', $id)
        ->select(
            'detail_pembelian_bahanbaku.*',
            'bahan_baku.nama_bahanbaku as nama_bahan_baku',
            'bahan_baku.satuan',
        )
        ->first();
        $dataBahanBaku = BahanBaku::get();
        $data = DB::table('pembelian_bahanbaku')
        ->join('supplier','pembelian_bahanbaku.supplier_id','supplier.id')
        ->join('penjahit','pembelian_bahanbaku.penjahit_id','penjahit.id')
        ->where('pembelian_bahanbaku.id', $dataDetail->pembelian_bahanbaku_id)
        ->select(
            'pembelian_bahanbaku.*',
            'supplier.nama_supplier',
            'supplier.alamat',
            'supplier.email',
            'supplier.nomor_telepon',
            'penjahit.nama_penjahit',
            )
        ->first();

        return view('transaksi-bahan-baku.edit-detail', compact('data', 'dataDetail','id', 'dataBahanBaku'));
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


    public function updateDetailTransaksi(Request $request, $id)
    {
        $bahan_baku = BahanBaku::where('id', $request->bahan_baku_id)->first();
        $peng_bahan_baku = DB::table('detail_pembelian_bahanbaku')
            ->where('id', $id)
            ->first();

        $pemakaian_old = $bahan_baku->stok;
        $pemakaian_new = floatval($request->jumlah);
        $peng_bahan_baku_stock = $peng_bahan_baku->jumlah;
        $laststock = ($pemakaian_new + $pemakaian_old) - $peng_bahan_baku_stock;

        $bahanBaku = BahanBaku::findOrFail($request->bahan_baku_id);
            $bahanBaku->update([
                'stok'     => $laststock
            ]);

        DetailTransaksiBahanBaku::where('id', $id)->update(request()->except(['_token','pembelian_bahanbaku_id','_method']));

        return redirect()->route('transaksi-bahanbaku.show', $request->pembelian_bahanbaku_id )->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function updateTransaksiTotalbayar(Request $request, $id)
    {
        // if($request->total_ongkos == $request->bayar) {
        //     $status_pembayaran = "Lunas";
        // }
        // elseif($request->bayar > $request->total_ongkos) {
        //     return redirect()->back()->with(['error' => 'Total tidak boleh lebih dari Bayar']);
        // }
        // else {
        //     $status_pembayaran = "Bayar Sebagian";
        // }

        // $request->request->add(['status_pembayaran' => $status_pembayaran]);

        // $total_ongkos = 0;

        $update = TransaksiBahanBaku::where('id', $id)->update(request()->except(['_token', '_method']));
        // $dataPemesanan = Pemesanan::where('id', $request->pemesanan_id)->first();

        // $total_ongkos = $dataPemesanan->total_ongkos + $request->ongkos_jahit;

        // $dataPemesanan->update(['total_ongkos' => $total_ongkos]);

        return redirect()->back()->with(['success' => 'Data Berhasil Di Simpan!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiBahanBaku  $transaksiBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataDetail = DB::table('detail_pembelian_bahanbaku')
        ->join('bahan_baku', 'detail_pembelian_bahanbaku.bahan_baku_id', 'bahan_baku.id')
        ->where('detail_pembelian_bahanbaku.pembelian_bahanbaku_id', $id)
        ->select(
            'detail_pembelian_bahanbaku.*',
            'bahan_baku.nama_bahanbaku as nama_bahan_baku',
        )
        ->get();

        foreach ($dataDetail as $d){
            $bahanBaku = BahanBaku::findOrFail($d->bahan_baku_id);
            $laststock = $bahanBaku->stok - $d->jumlah;
            $bahanBaku->update([
                'stok'     => $laststock
            ]);
        }

        DB::table('pembelian_bahanbaku')->where('id', $id)->delete();
        DB::table('detail_pembelian_bahanbaku')->where('pembelian_bahanbaku_id', $id)->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Diupdate!']);
    }
}
