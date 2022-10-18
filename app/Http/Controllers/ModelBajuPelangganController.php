<?php

namespace App\Http\Controllers;

use App\Models\ModelAnda;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ModelBajuPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelAnda::whereNotNull('pelanggan_id')
            ->get();
        return view('modelpelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenismodel = ModelAnda::getJenisModel();
        $pelanggan = Pelanggan::all();
        return view('modelpelanggan.create',compact('jenismodel', 'pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_model' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $data = $request->all();

        if ($image = $request->file('foto_model')) {
            $destinationPath = 'upload_image/foto_model/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_model'] = "$profileImage";
        }

        ModelAnda::create($data);

        return redirect()->route('modelpelanggan.index')->with('status','Data model pelanggan berhasil ditambah');
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
    public function edit($modelAnda)
    {
        $data = ModelAnda::find($modelAnda);
        $jenismodel = ModelAnda::getJenisModel();
        $pelanggan = Pelanggan::all(); 

        return view('modelpelanggan.edit',compact('data', 'jenismodel', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelAnda $modelAnda)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        $data = $request->all();

        if ($image = $request->file('foto_model')) {
            $destinationPath = 'upload_image/foto_model/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_model'] = "$profileImage";
        }else{
            unset($data['foto_model']);
        }

        $modelAnda->update($data);

        return redirect()->route('modelpelanggan.index')->with('status','Data model pelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
