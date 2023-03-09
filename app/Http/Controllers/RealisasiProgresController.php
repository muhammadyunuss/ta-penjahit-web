<?php

namespace App\Http\Controllers;

use App\Models\ModelAnda;
use App\Models\PerencanaanProduksi;
use App\Models\ProsesProduksi;
use App\Models\RealisasiProgres;
use App\Models\User;
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
            ->leftjoin('pelanggan', 'pemesanan.pelanggan_id', 'pelanggan.id')
            ->leftjoin('proses_produksi', 'realisasi_produksi.proses_produksi_id', 'proses_produksi.id')
            ->leftjoin('perencanaan_produksi', 'realisasi_produksi.perencanaan_produksi_id', 'perencanaan_produksi.id')
            ->leftjoin('detail_pemesanan_model', 'perencanaan_produksi.detail_pemesanan_model_id', 'detail_pemesanan_model.id')
            ->leftjoin('penjahit', 'pemesanan.penjahit_id', 'penjahit.id')
            ->leftjoin('model', 'detail_pemesanan_model.model_id', 'model.id')
            ->leftjoin('jenis_model', 'detail_pemesanan_model.jenis_model_id', 'jenis_model.id')
            ->where('realisasi_produksi.pemesanan_id', 'LIKE', '%'.$pemesanan_id.'%')
            ->select(
                'realisasi_produksi.*',
                'proses_produksi.nama_prosesproduksi',
                'jenis_model.nama_jenismodel',
                'model.nama_model',
                'penjahit.nama_penjahit',
                'pelanggan.no_telepon'
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
            'pelanggan.nama_pelanggan',
        )
        ->get();
        $prosesProduksi = ProsesProduksi::get();
        $user = User::where('previledge', 'Kepala')->select(['id', 'name', 'email'])->get();
        return view('realisasi-progres.create',compact('jenismodel', 'pemesanan', 'user'));
    }

    function getAjaxPemesanantoPemesananDetail($id){
        $pemesananDetail = DB::table('detail_pemesanan_model')
        ->join('jenis_model','detail_pemesanan_model.jenis_model_id','jenis_model.id')
        ->join('model','detail_pemesanan_model.model_id','model.id')
        ->where('pemesanan_id', $id)
        ->select(
            'detail_pemesanan_model.id',
            'detail_pemesanan_model.nama_model_detail',
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
            'foto' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

    public function edit($id)
    {
        // dd($id);
        $jenismodel = ModelAnda::getJenisModel();
        $pemesanan = DB::table('pemesanan')
        ->join('pelanggan','pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();
        $data = RealisasiProgres::find($id);
        $perencanaan_produksi = PerencanaanProduksi::join('proses_produksi','perencanaan_produksi.proses_produksi_id', 'proses_produksi.id')
        ->select(
            'perencanaan_produksi.*',
            'proses_produksi.nama_prosesproduksi'
            )
        ->find($data->perencanaan_produksi_id);
        // $prosesProduksi = ProsesProduksi::find($perencanaan_produksi->proses_produksi_id);
        // $data = RealisasiProgres::join('perencanaan_produksi', 'realisasi_produksi')
        // dd($perencanaan_produksi);
        $user = User::where('previledge', 'Kepala_Penjahit')->select(['id', 'name', 'email'])->get();
        return view('realisasi-progres.edit',compact('data', 'jenismodel', 'user', 'pemesanan', 'perencanaan_produksi'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $data = request()->except(['_token', '_method', 'detail_pemesanan_model_id']);

        if ($image = $request->file('foto')) {
            $destinationPath = 'upload_image/foto_realisasi/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto'] = "$profileImage";
        }
        else{
            unset($data['foto']);
        }

        RealisasiProgres::where('id', $id)->update($data);
        return redirect()->route('realisasi-progres.index')->with('status','Data model Anda berhasil diubah');

    }

    public function destroy($realisasiProgres)
    {
        RealisasiProgres::where('id', $realisasiProgres)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
