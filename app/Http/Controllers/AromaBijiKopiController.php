<?php

namespace App\Http\Controllers;

use App\Models\AromaBijiKopi;
use Illuminate\Http\Request;

class AromaBijiKopiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_data_aroma = AromaBijiKopi::get();
        return view('pages.aroma.list-aroma', compact('get_data_aroma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.aroma.create-aroma');
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
            'deskripsi_aroma' => 'required|min:3|max:50',
        ]);

        $newDataBijiKopi = new AromaBijiKopi();
        $newDataBijiKopi->deskripsi_aroma = $request->deskripsi_aroma;
        $newDataBijiKopi->save();

        return redirect()->route('list.aroma')->with('success', 'Data Aroma Berhasil Ditambahkan !');
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
        $edit_aroma = AromaBijiKopi::findOrfail($id);
        return view('pages.aroma.edit-aroma', compact('edit_aroma'));
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
            'deskripsi_aroma' => 'required|min:5|max:50',
        ]);

        $newDataBijiKopi = AromaBijiKopi::findOrfail($id);
        $newDataBijiKopi->deskripsi_aroma = $request->deskripsi_aroma;
        $newDataBijiKopi->save();

        return redirect()->route('list.aroma')->with('success', 'Data Aroma Berhasil Ditambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AromaBijiKopi::destroy($id);
        return back()->with('success', 'Data Aroma Berhasil Hapus !');
    }
}
