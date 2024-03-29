<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Http\Requests\StoreBahanBakuRequest;
use App\Http\Requests\UpdateBahanBakuRequest;
use App\Models\KolomRak;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BahanBaku::join('supplier', 'bahan_baku.supplier_id','supplier.id')
        ->join('kolom_rak', 'bahan_baku.kolom_rak_id', 'kolom_rak.id')
        ->select(
            'bahan_baku.*',
            'supplier.nama_supplier',
            'kolom_rak.nama_rak',
            'kolom_rak.nama_kolom'
        )
        ->get();

        return view('bahanbaku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letakBahanBaku = DB::table('letak_bahan_baku')->get();
        $dataSupplier = Supplier::all();
        $kolomrak = KolomRak::get();

        return view('bahanbaku.create',compact('dataSupplier', 'letakBahanBaku', 'kolomrak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBahanBakuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_bahanbaku' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($image = $request->file('foto_bahanbaku')) {
            $destinationPath = 'upload_image/foto_bahanbaku/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_bahanbaku'] = "$profileImage";
        }

        BahanBaku::create($data);

        if($request){
            return redirect()->route('bahanbaku.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('bahanbaku.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(BahanBaku $bahanBaku)
    {
        return view('bahanbaku.show',compact('bahanBaku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahanBaku = BahanBaku::find($id);
        $datasupplier = Supplier::get();
        $letakBahanBaku = DB::table('letak_bahan_baku')->get();
        $kolomrak = KolomRak::get();

        return view('bahanbaku.edit',compact('bahanBaku', 'datasupplier', 'kolomrak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanBakuRequest  $request
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except(['_token', '_method']);

        if ($image = $request->file('foto_bahanbaku')) {
            $destinationPath = 'upload_image/foto_bahanbaku/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_bahanbaku'] = "$profileImage";
        }
        else{
            unset($data['foto_bahanbaku']);
        }

        $bahanBaku = BahanBaku::find($id);
        $bahanBaku->update($data);

        if($bahanBaku){
            return redirect()->route('bahanbaku.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('bahanbaku.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahanBaku = BahanBaku::find($id);
        $bahanBaku->delete();

        if($bahanBaku){
            return redirect()->route('bahanbaku.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('bahanbaku.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
