<?php

namespace App\Http\Controllers;

use App\Models\BijiKopi;
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
}
