<?php

namespace App\Http\Controllers;

use App\Models\PerencanaanProduksi;
use App\Models\ProsesProduksi;
use App\Models\User;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $data = DB::table('perencanaan_produksi')
        ->join('proses_produksi','perencanaan_produksi.proses_produksi_id','proses_produksi.id')
        ->leftjoin('users','perencanaan_produksi.user_id','users.id');
        if($id){
            $data->where('perencanaan_produksi.detail_pemesanan_model_id', $id);
        }
        $data = $data->select(
            'perencanaan_produksi.*',
            'proses_produksi.nama_prosesproduksi as nama_prosesproduksi',
            'users.name as nama_kepalapenjahit'
        )
        ->get();

        $viewTransaksiPemesanan = ViewRepository::view_transaksi_pemesanan_model();

        return view('jadwal-progres.index', compact('data', 'viewTransaksiPemesanan', 'id'));
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
        $user = User::where('previledge', 'Kepala')->orwhere('previledge', 'Finishing')->select(['id', 'name', 'email'])->get();
        $prosesProduksi = ProsesProduksi::get();

        return view('jadwal-progres.create', compact('pemesanan', 'prosesProduksi', 'user'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PerencanaanProduksi::create($request->all());

        if($request){
            return redirect()->route('jadwal-progres.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('jadwal-progres.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $perencanaanProduksi = DB::table('perencanaan_produksi')
        ->join('proses_produksi','perencanaan_produksi.proses_produksi_id','proses_produksi.id')
        ->join('detail_pemesanan_model','perencanaan_produksi.detail_pemesanan_model_id','detail_pemesanan_model.id')
        ->join('pemesanan','detail_pemesanan_model.pemesanan_id','pemesanan.id')
        ->leftjoin('jenis_model','detail_pemesanan_model.pemesanan_id','jenis_model.id')
        ->where('perencanaan_produksi.id', $id)
        ->select(
            'perencanaan_produksi.*',
            'pemesanan.id as pemesanan_id'
            )
            ->first();
        $prosesProduksi = ProsesProduksi::get();
        $pemesanan = DB::table('pemesanan')
        ->join('pelanggan','pemesanan.pelanggan_id','pelanggan.id')
        ->select(
            'pemesanan.*',
            'pelanggan.nama_pelanggan'
        )
        ->get();

        return view('jadwal-progres.edit', compact('perencanaanProduksi', 'pemesanan','prosesProduksi'));
    }

    public function getAjaxPerencanaanProduksitoPemesananDetailEdit($id)
    {
        $pemesananDetail = DB::table('perencanaan_produksi')
        ->join('detail_pemesanan_model','perencanaan_produksi.detail_pemesanan_model_id','detail_pemesanan_model.id')
        ->join('model','detail_pemesanan_model.model_id','model.id')
        ->join('jenis_model','detail_pemesanan_model.jenis_model_id','jenis_model.id')
        ->where('perencanaan_produksi.detail_pemesanan_model_id', $id)
        ->select(
            'detail_pemesanan_model.id',
            'detail_pemesanan_model.banyaknya',
            'detail_pemesanan_model.nama_model_detail',
            'jenis_model.nama_jenismodel',
            'model.nama_model'
        )
        ->get();
        return response()->json($pemesananDetail);
    }

    public function getAjaxPerencanaanProduksitoPemesananDetailEditFirst($id)
    {
        $pemesananDetail = DB::table('perencanaan_produksi')
        ->join('detail_pemesanan_model','perencanaan_produksi.detail_pemesanan_model_id','detail_pemesanan_model.id')
        ->join('model','detail_pemesanan_model.model_id','model.id')
        ->leftjoin('jenis_model','detail_pemesanan_model.jenis_model_id','jenis_model.id')
        ->where('perencanaan_produksi.id', $id)
        ->select(
            'detail_pemesanan_model.id',
            'detail_pemesanan_model.banyaknya',
            'detail_pemesanan_model.nama_model_detail',
            'jenis_model.nama_jenismodel',
            'model.nama_model'
        )
        ->first();
        return response()->json($pemesananDetail);
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
        $data = new PerencanaanProduksi();
        $data->where('id', $id)->update(request()->except(['_token', '_method','pemesanan_id']));

        if($request){
            return redirect()->route('jadwal-progres.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('jadwal-progres.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        PerencanaanProduksi::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
