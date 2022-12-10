<?php

namespace App\Http\Controllers;

use App\Models\ModelAnda;
use Illuminate\Http\Request;

class ModelAndaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelAnda::all();
        return view('modelanda.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenismodel = ModelAnda::getJenisModel();
        return view('modelanda.create',compact('jenismodel'));
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
            'foto_model' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($image = $request->file('foto_model')) {
            $destinationPath = 'upload_image/foto_model/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_model'] = "$profileImage";
        }

        ModelAnda::create($data);

        return redirect()->route('modelanda.index')->with('status','Data model Anda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModelAnda  $modelAnda
     * @return \Illuminate\Http\Response
     */
    public function show(ModelAnda $modelAnda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelAnda  $modelAnda
     * @return \Illuminate\Http\Response
     */
    public function edit($modelAnda)
    {
        $jenismodel = ModelAnda::getJenisModel();
        $data = ModelAnda::find($modelAnda);
        return view('modelanda.edit',compact('data', 'jenismodel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelAnda  $modelAnda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_model' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = request()->except(['_token', '_method']);

        if ($image = $request->file('foto_model')) {
            $destinationPath = 'upload_image/foto_model/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_model'] = "$profileImage";
        }
        else{
            unset($data['foto_model']);
        }

        ModelAnda::where('id', $id)->update($data);
        return redirect()->route('modelanda.index')->with('status','Data model Anda berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelAnda  $modelAnda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelAnda::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
