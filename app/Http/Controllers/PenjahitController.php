<?php

namespace App\Http\Controllers;

use App\Models\Penjahit;
use App\Http\Requests\StorePenjahitRequest;
use App\Http\Requests\UpdatePenjahitRequest;

class PenjahitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenjahitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjahitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjahit  $penjahit
     * @return \Illuminate\Http\Response
     */
    public function show(Penjahit $penjahit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjahit  $penjahit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjahit $penjahit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjahitRequest  $request
     * @param  \App\Models\Penjahit  $penjahit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjahitRequest $request, Penjahit $penjahit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjahit  $penjahit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjahit $penjahit)
    {
        //
    }
}
