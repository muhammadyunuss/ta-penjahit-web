<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\ProsesProduksi;
use App\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProsesProduksi::all();
        return view('daftar-progres.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftar-progres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProsesProduksi::create($request->all());

        if($request){
            return redirect()->route('daftar-progres.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('daftar-progres.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = ProsesProduksi::find($id);

        return view('daftar-progres.edit',compact('data'));
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
        $data = new ProsesProduksi();
        $data->where('id', $id)->update(request()->except(['_token', '_method']));

        if($request){
            return redirect()->route('daftar-progres.index', $id )->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            return redirect()->route('daftar-progres.index', $id )->with(['error' => 'Data Gagal Diupdate!']);
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
        ProsesProduksi::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
