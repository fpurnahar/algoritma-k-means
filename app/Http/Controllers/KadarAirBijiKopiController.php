<?php

namespace App\Http\Controllers;

use App\Models\KadarAirBijiKopi;
use Illuminate\Http\Request;

class KadarAirBijiKopiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_data_kadar_air = KadarAirBijiKopi::get();
        return view('pages.kadar-air.list-kadar-air', compact('get_data_kadar_air'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kadar-air.create-kadar-air');
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
            'deskripsi_kadar_air' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = new KadarAirBijiKopi();
        $newDataBijiKopi->deskripsi_kadar_air = $request->deskripsi_kadar_air;
        $newDataBijiKopi->save();

        return redirect()->route('list.kadar.air')->with('success', 'Data Kadar Air Berhasil Ditambahkan !');
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
        $edit_kadar_air = KadarAirBijiKopi::findOrfail($id);
        return view('pages.kadar-air.edit-kadar-air', compact('edit_kadar_air'));
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
        $request->validate([
            'deskripsi_kadar_air' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = KadarAirBijiKopi::findOrfail($id);
        $newDataBijiKopi->deskripsi_kadar_air = $request->deskripsi_kadar_air;
        $newDataBijiKopi->save();

        return redirect()->route('list.kadar.air')->with('success', 'Data Kadar Air Berhasil Ditambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KadarAirBijiKopi::destroy($id);
        return back()->with('success', 'Data Kadar Air Berhasil Hapus !');
    }
}
