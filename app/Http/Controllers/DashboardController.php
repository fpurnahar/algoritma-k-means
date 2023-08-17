<?php

namespace App\Http\Controllers;

use App\Models\AromaBijiKopi;
use App\Models\BijiKopi;
use App\Models\FisikBijiKopi;
use App\Models\KadarAirBijiKopi;
use App\Models\WarnaBijiKopi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $get_data_biji_kopi = BijiKopi::join('aroma_biji_kopi', 'aroma_biji_kopi.id', '=', 'biji_kopi.aroma_id')
            ->join('warna_biji_kopi', 'warna_biji_kopi.id', '=', 'biji_kopi.warna_id')
            ->join('fisik_biji_kopi', 'fisik_biji_kopi.id', '=', 'biji_kopi.fisik_id')
            ->join('kadar_air_biji_kopi', 'kadar_air_biji_kopi.id', '=', 'biji_kopi.kadar_air_id')
            ->select(
                'biji_kopi.id as id',
                'biji_kopi.nama_biji_kopi as nama_biji_kopi',
                // 'biji_kopi.aroma_id as aroma_id',
                'aroma_biji_kopi.deskripsi_aroma as deskripsi_aroma',
                // 'biji_kopi.warna_id as warna_id',
                'warna_biji_kopi.deskripsi_warna as deskripsi_warna',
                // 'biji_kopi.fisik_id as fisik_id',
                'fisik_biji_kopi.deskripsi_fisik as deskripsi_fisik',
                // 'biji_kopi.kadar_air_id as kadar_air_id',
                'kadar_air_biji_kopi.deskripsi_kadar_air as deskripsi_kadar_air'
            )
            ->orderBy('biji_kopi.id', 'DESC')
            ->paginate(10);
        return view('dashboard', compact('get_data_biji_kopi'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            if ($request->search == null) {
                $filter = BijiKopi::join('aroma_biji_kopi', 'aroma_biji_kopi.id', '=', 'biji_kopi.aroma_id')
                    ->join('warna_biji_kopi', 'warna_biji_kopi.id', '=', 'biji_kopi.warna_id')
                    ->join('fisik_biji_kopi', 'fisik_biji_kopi.id', '=', 'biji_kopi.fisik_id')
                    ->join('kadar_air_biji_kopi', 'kadar_air_biji_kopi.id', '=', 'biji_kopi.kadar_air_id')
                    ->orderBy('biji_kopi.id', 'DESC')
                    ->paginate(10);
            } else {
                $filter = BijiKopi::join('aroma_biji_kopi', 'aroma_biji_kopi.id', '=', 'biji_kopi.aroma_id')
                    ->join('warna_biji_kopi', 'warna_biji_kopi.id', '=', 'biji_kopi.warna_id')
                    ->join('fisik_biji_kopi', 'fisik_biji_kopi.id', '=', 'biji_kopi.fisik_id')
                    ->join('kadar_air_biji_kopi', 'kadar_air_biji_kopi.id', '=', 'biji_kopi.kadar_air_id')
                    ->where('nama_biji_kopi', 'LIKE', '%' . $request->search . "%")
                    ->orderBy('biji_kopi.id', 'DESC')
                    ->paginate(10);
            }

            if ($filter) {
                return response($filter);
            }
        }
    }

    public function createBijiKopi()
    {
        $get_aroma_biji_kopi = AromaBijiKopi::get();
        $get_warna_biji_kopi = WarnaBijiKopi::get();
        $get_fisik_biji_kopi = FisikBijiKopi::get();
        $get_kadar_air_biji_kopi = KadarAirBijiKopi::get();
        return view('pages.biji-kopi.create-biji-kopi', compact('get_aroma_biji_kopi', 'get_warna_biji_kopi', 'get_fisik_biji_kopi', 'get_kadar_air_biji_kopi'));
    }

    public function storeBijiKopi(Request $request)
    {
        $request->validate([
            'nama_biji_kopi' => 'required|min:10|max:50',
            'aroma_id' => 'required|numeric|max:5',
            'warna_id' => 'required|numeric|max:5',
            'fisik_id' => 'required|numeric|max:5',
            'kadar_air_id' => 'required|numeric|max:5',
        ]);

        $newDataBijiKopi = new BijiKopi();
        $newDataBijiKopi->nama_biji_kopi = $request->nama_biji_kopi;
        $newDataBijiKopi->aroma_id = $request->aroma_id;
        $newDataBijiKopi->warna_id = $request->warna_id;
        $newDataBijiKopi->fisik_id = $request->fisik_id;
        $newDataBijiKopi->kadar_air_id = $request->kadar_air_id;
        $newDataBijiKopi->save();

        return redirect()->route('dashboard')->with('success', 'Data Biji Kopi Berhasil Ditambahkan !');
    }

    public function editBijiKopi($id)
    {
        $edit_biji_kopi = BijiKopi::join('aroma_biji_kopi', 'aroma_biji_kopi.id', '=', 'biji_kopi.aroma_id')
            ->join('warna_biji_kopi', 'warna_biji_kopi.id', '=', 'biji_kopi.warna_id')
            ->join('fisik_biji_kopi', 'fisik_biji_kopi.id', '=', 'biji_kopi.fisik_id')
            ->join('kadar_air_biji_kopi', 'kadar_air_biji_kopi.id', '=', 'biji_kopi.kadar_air_id')
            ->select(
                'biji_kopi.id as id',
                'biji_kopi.nama_biji_kopi as nama_biji_kopi',
                'biji_kopi.aroma_id as aroma_id',
                'aroma_biji_kopi.deskripsi_aroma as deskripsi_aroma',
                'biji_kopi.warna_id as warna_id',
                'warna_biji_kopi.deskripsi_warna as deskripsi_warna',
                'biji_kopi.fisik_id as fisik_id',
                'fisik_biji_kopi.deskripsi_fisik as deskripsi_fisik',
                'biji_kopi.kadar_air_id as kadar_air_id',
                'kadar_air_biji_kopi.deskripsi_kadar_air as deskripsi_kadar_air'
            )->findOrFail($id);
        $get_aroma_biji_kopi = AromaBijiKopi::get();
        $get_warna_biji_kopi = WarnaBijiKopi::get();
        $get_fisik_biji_kopi = FisikBijiKopi::get();
        $get_kadar_air_biji_kopi = KadarAirBijiKopi::get();
        return view('pages.biji-kopi.edit-biji-kopi', compact('edit_biji_kopi', 'get_aroma_biji_kopi', 'get_warna_biji_kopi', 'get_fisik_biji_kopi', 'get_kadar_air_biji_kopi'));
    }

    public function updateBijiKopi(Request $request, $id)
    {

        $request->validate([
            'nama_biji_kopi' => 'required|min:10|max:50',
            'aroma_id' => 'required|numeric|max:5',
            'warna_id' => 'required|numeric|max:5',
            'fisik_id' => 'required|numeric|max:5',
            'kadar_air_id' => 'required|numeric|max:5',
        ]);

        $editDataBijiKopi = BijiKopi::findOrfail($id);
        $editDataBijiKopi->nama_biji_kopi = $request->nama_biji_kopi;
        $editDataBijiKopi->aroma_id = $request->aroma_id;
        $editDataBijiKopi->warna_id = $request->warna_id;
        $editDataBijiKopi->fisik_id = $request->fisik_id;
        $editDataBijiKopi->kadar_air_id = $request->kadar_air_id;
        $editDataBijiKopi->save();

        return redirect()->route('dashboard')->with('success', 'Data Biji Kopi Berhasil Di Edit !');
    }

    public function destroyBijiKopi($id)
    {
        BijiKopi::destroy($id);
        return back()->with('success', 'Data Biji Kopi Berhasil Hapus !');
    }
}
