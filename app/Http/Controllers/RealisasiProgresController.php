<?php

namespace App\Http\Controllers;

use App\Models\ModelAnda;
use App\Models\ProsesProduksi;
use App\Models\RealisasiProgres;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealisasiProgresController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $pemesanan_id = $request->pemesanan_id ?? null;
            $data = RealisasiProgres::join('pemesanan', 'realisasi_produksi.pemesanan_id', 'pemesanan.id')
            ->join('proses_produksi', 'realisasi_produksi.proses_produksi_id', 'proses_produksi.id')
            ->join('perencanaan_produksi', 'realisasi_produksi.perencanaan_produksi_id', 'perencanaan_produksi.id')
            ->join('detail_pemesanan_model', 'perencanaan_produksi.detail_pemesanan_model_id', 'detail_pemesanan_model.id')
            ->join('penjahit', 'pemesanan.penjahit_id', 'penjahit.id')
            ->join('model', 'detail_pemesanan_model.model_id', 'model.id')
            ->join('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
            ->where('realisasi_produksi.pemesanan_id', 'LIKE', '%'.$pemesanan_id.'%')
            ->select(
                'realisasi_produksi.*',
                'proses_produksi.nama_prosesproduksi',
                'jenis_model.nama_jenismodel',
                'model.nama_model',
                'penjahit.nama_penjahit'
            )
            ->get();

            return DataTables()->of($data)
            ->make(true);
        }
        $viewTransaksiPemesanan = ViewRepository::view_transaksi_pemesanan_model();
        return view('realisasi-progres.index', compact('viewTransaksiPemesanan'));
    }

    public function create()
    {
        $jenismodel = ModelAnda::getJenisModel();
        $pemesanan = DB::table('pemesanan')
        ->join('pelanggan','pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();
        $prosesProduksi = ProsesProduksi::get();
        return view('realisasi-progres.create',compact('jenismodel', 'pemesanan'));
    }

    function getAjaxPemesanantoPemesananDetail($id){
        $pemesananDetail = DB::table('detail_pemesanan_model')
        ->join('jenis_model','detail_pemesanan_model.jenis_model_id','jenis_model.id')
        ->join('model','detail_pemesanan_model.model_id','model.id')
        ->where('pemesanan_id', $id)
        ->select(
            'detail_pemesanan_model.id',
            'detail_pemesanan_model.banyaknya',
            'jenis_model.nama_jenismodel',
            'model.nama_model',
        )
        ->get();
        return response()->json($pemesananDetail);
    }

    function getAjaxPemesananDetailtoPerencanaanProduksi($id){
        $pemesananDetail = DB::table('perencanaan_produksi')
        ->join('proses_produksi','perencanaan_produksi.proses_produksi_id','proses_produksi.id')
        ->join('detail_pemesanan_model', 'perencanaan_produksi.detail_pemesanan_model_id', 'detail_pemesanan_model.id')
        ->where('detail_pemesanan_model_id', $id)
        ->select(
            'perencanaan_produksi.*',
            'proses_produksi.nama_prosesproduksi',
        )
        ->get();
        return response()->json($pemesananDetail);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $prosesProduksiId = DB::table('perencanaan_produksi')
        ->where('id', $request->perencanaan_produksi_id)
        ->first()->proses_produksi_id;

        $request->request->add(['proses_produksi_id' => $prosesProduksiId]);
        $data = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'upload_image/foto_realisasi/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto'] = "$profileImage";
        }

        RealisasiProgres::create($data);

        return redirect()->route('realisasi-progres.index')->with('status','Data model Anda berhasil ditambah');
    }

    public function show(RealisasiProgres $modelAnda)
    {
        //
    }

    public function edit($modelAnda)
    {
        $jenismodel = RealisasiProgres::getJenisModel();
        $data = RealisasiProgres::find($modelAnda);
        return view('realisasi-progres.edit',compact('data', 'jenismodel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_model' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = request()->except(['_token', '_method']);

        if ($image = $request->file('foto_model')) {
            $destinationPath = 'upload_image/foto_realisasi/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_model'] = "$profileImage";
        }
        else{
            unset($data['foto_model']);
        }

        RealisasiProgres::where('id', $id)->update($data);
        return redirect()->route('realisasi-progres.index')->with('status','Data model Anda berhasil diubah');

    }

    public function destroy(RealisasiProgres $modelAnda)
    {
        RealisasiProgres::where('id', $modelAnda)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
