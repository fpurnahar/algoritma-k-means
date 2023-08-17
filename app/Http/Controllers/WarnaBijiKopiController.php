<?php

namespace App\Http\Controllers;

use App\Models\WarnaBijiKopi;
use Illuminate\Http\Request;

class WarnaBijiKopiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_data_warna = WarnaBijiKopi::get();
        return view('pages.warna.list-warna', compact('get_data_warna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.warna.create-warna');
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
            'deskripsi_warna' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = new WarnaBijiKopi();
        $newDataBijiKopi->deskripsi_warna = $request->deskripsi_warna;
        $newDataBijiKopi->save();

        return redirect()->route('list.warna')->with('success', 'Data Warna Berhasil Ditambahkan !');
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
        $edit_warna = WarnaBijiKopi::findOrfail($id);
        return view('pages.warna.edit-warna', compact('edit_warna'));
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
            'deskripsi_warna' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = WarnaBijiKopi::findOrfail($id);
        $newDataBijiKopi->deskripsi_warna = $request->deskripsi_warna;
        $newDataBijiKopi->save();

        return redirect()->route('list.warna')->with('success', 'Data Warna Berhasil Ditambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WarnaBijiKopi::destroy($id);
        return back()->with('success', 'Data Warna Berhasil Hapus !');
    }
}
