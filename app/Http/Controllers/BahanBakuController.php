<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Http\Requests\StoreBahanBakuRequest;
use App\Http\Requests\UpdateBahanBakuRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BahanBaku::all();

        return view('bahanbaku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSupplier = Supplier::all();
        return view('bahanbaku.create',compact('dataSupplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBahanBakuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BahanBaku::create($request->all());

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
        return view('bahanbaku.edit',compact('bahanBaku', 'datasupplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanBakuRequest  $request
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBahanBakuRequest $request, $id)
    {
        $bahanBaku = BahanBaku::find($id);
        $bahanBaku->update($request->all());

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
