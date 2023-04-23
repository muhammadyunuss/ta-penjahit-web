<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\BillOfMaterial;
use App\Models\BillOfMaterialDetail;
use App\Models\BillOfMaterialStandartUkuran;
use App\Models\ModelAnda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillOfMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BillOfMaterial::leftjoin('model', 'bom_model.model_id', 'model.id')
        ->leftjoin('bom_standart_ukuran', 'bom_model.bom_standart_ukuran_id', 'bom_standart_ukuran.id')
        ->select(
            'bom_model.*',
            'model.nama_model',
            'bom_standart_ukuran.ukuran',
            'bom_standart_ukuran.lebar_kain'
        )
        ->get();
        return view('bom.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = ModelAnda::get();
        $ukuran = BillOfMaterialStandartUkuran::get();

        return view('bom.create', compact('model', 'ukuran'));
    }

    public function createDetail($id)
    {
        $data = DB::table('bom_model')
        ->join('model', 'bom_model.model_id', 'model.id')
        ->join('bom_standart_ukuran', 'bom_model.bom_standart_ukuran_id', 'bom_standart_ukuran.id')
        ->where('bom_model.id', $id)
        ->select(
            'bom_model.*',
            'model.nama_model',
            'bom_standart_ukuran.ukuran',
            'bom_standart_ukuran.lebar_kain',
        )
        ->first();

        $bahan_baku = BahanBaku::all();

        return view('bom.create-detail', compact('data', 'bahan_baku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BillOfMaterial::create($request->all());
        $data = BillOfMaterial::latest()->first();

        if($request){
            return redirect()->route('bom.detail.create', $data->id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('bom.detail.create', $data->id)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function saveDetail(Request $request)
    {
        BillOfMaterialDetail::create($request->all());

        if($request){
            return redirect()->route('bom.show', $request->bom_id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('bom.detail.create', $request->bom_id)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillOfMaterial  $billOfMaterial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('bom_model')
        ->join('model', 'bom_model.model_id', 'model.id')
        ->join('bom_standart_ukuran', 'bom_model.bom_standart_ukuran_id', 'bom_standart_ukuran.id')
        ->where('bom_model.id', $id)
        ->select(
            'bom_model.*',
            'model.nama_model',
            'bom_standart_ukuran.ukuran',
            'bom_standart_ukuran.lebar_kain',
        )
        ->first();

        $data_detail = DB::table('bom_model_detail')
        ->join('bahan_baku', 'bom_model_detail.bahanbaku_id', 'bahan_baku.id')
        ->where('bom_model_detail.bom_id', $id)
        ->select(
            'bom_model_detail.*',
            'bahan_baku.nama_bahanbaku',
        )
        ->get();

        return view('bom.show', compact('data', 'data_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillOfMaterial  $billOfMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(BillOfMaterial $billOfMaterial)
    {
        //
    }

    public function editDetail($id)
    {
        $data_detail = DB::table('bom_model_detail')
        ->join('bahan_baku', 'bom_model_detail.bahanbaku_id', 'bahan_baku.id')
        ->where('bom_model_detail.id', $id)
        ->select(
            'bom_model_detail.*',
            'bahan_baku.nama_bahanbaku',
        )
        ->first();

        $data = DB::table('bom_model')
        ->join('model', 'bom_model.model_id', 'model.id')
        ->join('bom_standart_ukuran', 'bom_model.bom_standart_ukuran_id', 'bom_standart_ukuran.id')
        ->where('bom_model.id', $data_detail->bom_id)
        ->select(
            'bom_model.*',
            'model.nama_model',
            'bom_standart_ukuran.ukuran',
            'bom_standart_ukuran.lebar_kain',
        )
        ->first();

        $bahan_baku = BahanBaku::all();

        return view('bom.edit-detail', compact('data', 'data_detail', 'bahan_baku'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillOfMaterial  $billOfMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillOfMaterial $billOfMaterial)
    {
        //
    }
    public function updateDetail(Request $request, $id)
    {
        BillOfMaterialDetail::where('id', $id)->update(request()->except(['_token', '_method']));

        return redirect()->route('bom.show', $request->bom_id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillOfMaterial  $billOfMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillOfMaterial $billOfMaterial)
    {
        //
    }
}
