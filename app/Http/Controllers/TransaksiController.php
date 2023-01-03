<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\DetailPemesananBahanBaku;
use App\Models\DetailPemesananUkuran;
use App\Models\ModelAnda;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Penjahit;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('transaksi.index',compact('data','bahanBaku', 'viewTanggunanPesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_penjahit = auth()->user()->id_penjahit;
        $datapelanggan = Pelanggan::all();
        $datamodel = ModelAnda::all();
        $datapenjahit = Penjahit::where('id', $id_penjahit)->get();

        return view('transaksi.create', compact('datapelanggan', 'datamodel', 'datapenjahit'));
    }

    public function createDetailTransaksi($id)
    {
        $data = DB::table('pemesanan')
        ->join('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
        ->join('penjahit','pemesanan.penjahit_id', 'penjahit.id')
        ->where('pemesanan.id', $id)
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan as nama_pelanggan',
            'pelanggan.email as email_pelanggan',
            'pelanggan.no_telepon as no_telepon_pelanggan',
            'pelanggan.alamat as alamat_pelanggan',
            'penjahit.nama_penjahit as nama_penjahit'
        )
        ->first();
        $dataModel = DB::table('model')->get();
        $dataJenisModel = DB::table('jenis_model')->get();
        $dataModelDetail = DB::table('detail_pemesanan_model')
        ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
        ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
        ->where('detail_pemesanan_model.pemesanan_id', $id)
        ->select(
            'detail_pemesanan_model.*',
            'model.nama_model as nama_model',
            'jenis_model.nama_jenismodel as nama_jenismodel'
        )
        ->get();
        return view('transaksi.create-detail', compact('data', 'dataModel', 'dataJenisModel','dataModelDetail'));
    }

    public function createDetailTransaksiUkuran($id)
    {
        $dataModelDetail = DB::table('detail_pemesanan_model')
        ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
        ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
        ->where('detail_pemesanan_model.id', $id)
        ->select(
            'detail_pemesanan_model.*',
            'model.nama_model as nama_model',
            'jenis_model.nama_jenismodel as nama_jenismodel'
        )
        ->first();
        // dd($dataModelDetail);
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
        $dataModel = DB::table('model')->get();
        $dataJenisModel = DB::table('jenis_model')->get();
        return view('transaksi.create-detail-ukuran', compact('data', 'dataModel', 'dataJenisModel','dataModelDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemesanan::create($request->all());
        $data = Pemesanan::latest()->first();

        if($request){
            return redirect()->route('transaksi.detail.create', $data->id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('transaksi.detail.create', $data->id)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function saveBahanBaku(Request $request)
    {
        // dd($request->all());
        // $total_ongkos = 0;

        DetailPemesananBahanBaku::create($request->all());
        // $dataPemesanan = Pemesanan::where('id', $request->pemesanan_id)->first();

        // $total_ongkos = $dataPemesanan->total_ongkos + $request->ongkos_jahit;

        // $dataPemesanan->update(['total_ongkos' => $total_ongkos]);

        if($request){
            return redirect()->route('transaksi.show', $request->pemesanan_id )->with(['success' => 'Data Berhasil Di Simpan!']);
        }else{
            return redirect()->route('transaksi.show', $request->pemesanan_id )->with(['error' => 'Data Gagal Di Simpan!']);
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
        $data = DB::table('pemesanan')
        ->join('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
        ->join('penjahit','pemesanan.penjahit_id', 'penjahit.id')
        ->where('pemesanan.id', $id)
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan as nama_pelanggan',
            'pelanggan.email as email_pelanggan',
            'pelanggan.no_telepon as no_telepon_pelanggan',
            'pelanggan.alamat as alamat_pelanggan',
            'penjahit.nama_penjahit as nama_penjahit'
        )
        ->first();

        $dataModel = DB::table('model')->get();
        $dataJenisModel = DB::table('jenis_model')->get();
        $dataModelDetail = DB::table('detail_pemesanan_model')
        ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
        ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
        ->where('detail_pemesanan_model.pemesanan_id', $id)
        ->select(
            'detail_pemesanan_model.*',
            'model.nama_model as nama_model',
            'jenis_model.nama_jenismodel as nama_jenismodel'
        )
        ->get();

        $paramDataModelDetail = json_decode($dataModelDetail, true);

        $dataParam = [];
        foreach($paramDataModelDetail as $dmd){
            $detailPemesananModelUkuran = DB::table('detail_pemesanan_model_ukuran')
            ->where('detail_pemesanan_model_id', $dmd['id'])
            ->select('*')
            ->get();

            $dataParam[] = [
                'id' => $dmd['id'],
                'banyaknya' =>$dmd['banyaknya'],
                'nama_model' => $dmd['nama_model'],
                'nama_jenismodel' => $dmd['nama_jenismodel'],
                'ongkos_jahit' => $dmd['ongkos_jahit'],
                'deskripsi_pemesanan' => $dmd['deskripsi_pemesanan'],
                'details' => $detailPemesananModelUkuran
            ];
        }
        // dd($dataParam[0]['details'][0]->id);
        $bahanBaku = DB::table('bahan_baku')->get();
        $detailBahanBaku = DB::table('detail_pemesanan_bahanbaku')
        ->join('bahan_baku', 'detail_pemesanan_bahanbaku.bahan_baku_id', 'bahan_baku.id')
        ->where('pemesanan_id', $id)
        ->select('detail_pemesanan_bahanbaku.*', 'bahan_baku.nama_bahanbaku')
        ->get();

        return view('transaksi.show', compact('data', 'dataModel', 'dataJenisModel','dataModelDetail','id','bahanBaku', 'detailBahanBaku', 'dataParam'));
    }

    public function editDetailTransaksi($id)
    {
        $dataModel = DB::table('model')->get();
        $dataJenisModel = DB::table('jenis_model')->get();
        $dataModelDetail = DB::table('detail_pemesanan_model')
        ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
        ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
        ->where('detail_pemesanan_model.id', $id)
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

        return view('transaksi.edit-detail', compact('data', 'dataModel', 'dataJenisModel','dataModelDetail'));
    }

    public function updateDetailTransaksi(Request $request)
    {
        $data = new DetailPemesanan();
        $data->where('id', $request->detail_pemesanan_id)->update(request()->except(['_token','detail_pemesanan_id']));

        if($request){
            return redirect()->route('transaksi.show', $request->pemesanan_id )->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('transaksi.show', $request->pemesanan_id )->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function saveDetail(Request $request)
    {
        DetailPemesanan::create($request->all());

        if($request){
            return redirect()->route('transaksi.show', $request->pemesanan_id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('transaksi.show', $request->pemesanan_id)->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    public function saveDetailUkuran(Request $request)
    {
        DetailPemesananUkuran::create($request->all());

        if($request){
            return redirect()->route('transaksi.show', $request->pemesanan_id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('transaksi.show', $request->pemesanan_id)->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pemesanan::find($id);
        $dataPelanggan = Pelanggan::all();
        $dataModel = ModelAnda::all();
        $dataPenjahit = Penjahit::all();

        return view('transaksi.edit', compact('data', 'dataPelanggan', 'dataModel','dataPenjahit','id'));
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
        $data = new Pemesanan();
        $data->where('id', $id)->update(request()->except(['_token', '_method']));

        if($request){
            return redirect()->route('transaksi.show', $id )->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('transaksi.show', $id )->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function updateTotalTransaksi(Request $request, $id)
    {
        if($request->total_ongkos == $request->bayar) {
            $status_pembayaran = "Lunas";
        }
        elseif($request->bayar > $request->total_ongkos) {
            return redirect()->back()->with(['error' => 'Total tidak boleh lebih dari Bayar']);
        }
        else {
            $status_pembayaran = "Bayar Sebagian";
        }

        $request->request->add(['status_pembayaran' => $status_pembayaran]);

        // $total_ongkos = 0;

        $update = Pemesanan::where('id', $id)->update(request()->except(['_token', '_method']));
        // $dataPemesanan = Pemesanan::where('id', $request->pemesanan_id)->first();

        // $total_ongkos = $dataPemesanan->total_ongkos + $request->ongkos_jahit;

        // $dataPemesanan->update(['total_ongkos' => $total_ongkos]);

        if($update){
            return redirect()->route('transaksi.show', $id )->with(['success' => 'Data Berhasil Di Simpan!']);
        }else{
            return redirect()->route('transaksi.show', $id )->with(['error' => 'Data Gagal Di Simpan!']);
        }

    }

    public function invoiceTransaksi(Request $request, $id)
    {
        $data = DB::table('pemesanan')
        ->join('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
        ->join('penjahit','pemesanan.penjahit_id', 'penjahit.id')
        ->where('pemesanan.id', $id)
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan as nama_pelanggan',
            'pelanggan.email as email_pelanggan',
            'pelanggan.no_telepon as no_telepon_pelanggan',
            'pelanggan.alamat as alamat_pelanggan',
            'penjahit.nama_penjahit as nama_penjahit'
        )
        ->first();
        $dataModel = DB::table('model')->get();
        $dataJenisModel = DB::table('jenis_model')->get();
        $dataModelDetail = DB::table('detail_pemesanan_model')
        ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
        ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
        ->where('detail_pemesanan_model.pemesanan_id', $id)
        ->select(
            'detail_pemesanan_model.*',
            'model.nama_model as nama_model',
            'jenis_model.nama_jenismodel as nama_jenismodel'
        )
        ->get();
        $bahanBaku = DB::table('bahan_baku')->get();
        $detailBahanBaku = DB::table('detail_pemesanan_bahanbaku')
        ->join('bahan_baku', 'detail_pemesanan_bahanbaku.bahan_baku_id', 'bahan_baku.id')
        ->where('pemesanan_id', $id)
        ->select('detail_pemesanan_bahanbaku.*', 'bahan_baku.nama_bahanbaku')
        ->get();
        return view('transaksi.invoice', compact('data', 'dataModel', 'dataJenisModel','dataModelDetail','id','bahanBaku', 'detailBahanBaku'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemesanan::where('id', $id)->delete();
        $dataDetail = DetailPemesanan::where('pemesanan_id', $id)->delete();

        return redirect()->route('transaksi.index', $id )->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * AJAX.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getAjaxBahanBaku($id)
    {
        $bahanBaku = DB::table('bahan_baku')->where('id', $id)->get();

        return response()->json($bahanBaku);
    }

    public function getAjaxModelToJenisModel($id)
    {
        $model = DB::table('model')->where('jenis_model', $id)->get();

        return response()->json($model);
    }

    public function getAjaxModelOngkos($id)
    {
        $model = DB::table('model')->where('jenis_model', $id)->first();

        return response()->json($model);
    }
}
