<?php

namespace App\Http\Controllers;

use App\Models\KolomRak;
use Illuminate\Http\Request;

class KolomRakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = KolomRak::all();
          return view('kolomrak.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kolomrak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KolomRak::create($request->all());

        if($request){
            return redirect()->route('kolomrak.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('kolomrak.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataMaster\KolomRak  $kolomrak
     * @return \Illuminate\Http\Response
     */
    public function show(KolomRak $kolomrak)
    {
        return view('kolomrak.show',compact('kolomrak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMaster\KolomRak  $kolomrak
     * @return \Illuminate\Http\Response
     */
    public function edit(KolomRak $kolomrak)
    {
        return view('kolomrak.edit',compact('kolomrak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierRequest  $request
     * @param  \App\Models\DataMaster\KolomRak  $kolomrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KolomRak $kolomrak)
    {
        $kolomrak->update($request->all());

        if($kolomrak){
            return redirect()->route('kolomrak.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('kolomrak.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMaster\KolomRak  $kolomrak
     * @return \Illuminate\Http\Response
     */
    public function destroy(KolomRak $kolomrak)
    {
        $kolomrak->delete();

        if($kolomrak){
            return redirect()->route('kolomrak.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('kolomrak.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
