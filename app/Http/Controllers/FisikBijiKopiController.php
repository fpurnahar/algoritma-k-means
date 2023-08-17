<?php

namespace App\Http\Controllers;

use App\Models\FisikBijiKopi;
use Illuminate\Http\Request;

class FisikBijiKopiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_data_fisik = FisikBijiKopi::get();
        return view('pages.fisik.list-fisik', compact('get_data_fisik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.fisik.create-fisik');
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
            'deskripsi_fisik' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = new FisikBijiKopi();
        $newDataBijiKopi->deskripsi_fisik = $request->deskripsi_fisik;
        $newDataBijiKopi->save();

        return redirect()->route('list.fisik')->with('success', 'Data Fisik Berhasil Ditambahkan !');
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
        $edit_fisik = FisikBijiKopi::findOrfail($id);
        return view('pages.fisik.edit-fisik', compact('edit_fisik'));
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
            'deskripsi_fisik' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = FisikBijiKopi::findOrfail($id);
        $newDataBijiKopi->deskripsi_fisik = $request->deskripsi_fisik;
        $newDataBijiKopi->save();

        return redirect()->route('list.fisik')->with('success', 'Data Fisik Berhasil Ditambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FisikBijiKopi::destroy($id);
        return back()->with('success', 'Data Fisik Berhasil Hapus !');
    }
}
