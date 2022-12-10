<?php

namespace App\Http\Controllers;

use App\Models\JasaEkspedisi;
use Illuminate\Http\Request;

class JasaEkspedisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = JasaEkspedisi::all();
          return view('jasaekspedisi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasaekspedisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JasaEkspedisi::create($request->all());

        if($request){
            return redirect()->route('jasaekspedisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('jasaekspedisi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataMaster\JasaEkspedisi  $jasaekspedisi
     * @return \Illuminate\Http\Response
     */
    public function show(JasaEkspedisi $jasaekspedisi)
    {
        return view('jasaekspedisi.show',compact('jasaekspedisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataMaster\JasaEkspedisi  $jasaekspedisi
     * @return \Illuminate\Http\Response
     */
    public function edit(JasaEkspedisi $jasaekspedisi)
    {
        return view('jasaekspedisi.edit',compact('jasaekspedisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\DataMaster\JasaEkspedisi  $jasaekspedisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JasaEkspedisi $jasaekspedisi)
    {
        $jasaekspedisi->update($request->all());

        if($jasaekspedisi){
            return redirect()->route('jasaekspedisi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('jasaekspedisi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataMaster\JasaEkspedisi  $jasaekspedisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JasaEkspedisi $jasaekspedisi)
    {
        $jasaekspedisi->delete();

        if($jasaekspedisi){
            return redirect()->route('jasaekspedisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('jasaekspedisi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
