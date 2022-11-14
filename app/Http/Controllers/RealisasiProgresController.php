<?php

namespace App\Http\Controllers;

use App\Models\ProsesProduksi;
use App\Models\RealisasiProgres;
use Illuminate\Http\Request;

class RealisasiProgresController extends Controller
{
    public function index()
    {
        $data = RealisasiProgres::all();
        return view('realisasi-progres.index', compact('data'));
    }

    public function create()
    {
        $jenismodel = RealisasiProgres::getJenisModel();
        $prosesProduksi = ProsesProduksi::get();
        dd($prosesProduksi);
        return view('realisasi-progres.create',compact('jenismodel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_model' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($image = $request->file('foto_model')) {
            $destinationPath = 'upload_image/foto_model/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['foto_model'] = "$profileImage";
        }

        RealisasiProgres::create($data);

        return redirect()->route('realisasi-progres.index')->with('status','Data model Anda berhasil ditambah');
    }

    public function show(RealisasiProgres $modelAnda)
    {
        //
    }

    public function edit($modelAnda)
    {
        $jenismodel = RealisasiProgres::getJenisModel();
        $data = RealisasiProgres::find($modelAnda);
        return view('realisasi-progres.edit',compact('data', 'jenismodel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_model' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        RealisasiProgres::where('id', $id)->update($data);
        return redirect()->route('realisasi-progres.index')->with('status','Data model Anda berhasil diubah');

    }

    public function destroy(RealisasiProgres $modelAnda)
    {
        RealisasiProgres::where('id', $modelAnda)->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
