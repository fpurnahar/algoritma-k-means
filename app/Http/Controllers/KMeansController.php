<?php

namespace App\Http\Controllers;

use App\Models\BijiKopi;
use Illuminate\Http\Request;
use App\Repositories\KMeansRepository;
use Illuminate\Support\Facades\DB;
use stdClass;

class KMeansController extends Controller
{
    private $kmeans_repository;
    private $coffeeBeans;

    public function __construct(KMeansRepository $kmeans_repository)
    {
        $this->kmeans_repository = $kmeans_repository;
    }

    public function cluster()
    {
        $result_data = BijiKopi::get();
        $k = 3;  // Number of clusters

        $feature = [];
        foreach ($result_data as $key => $item) {
            $feature[] = [$item->aroma_id, $item->warna_id, $item->fisik_id, $item->kadar_air_id];
        }

        $clusters = $this->kmeans_repository->cluster($feature, $k);

        $result_cluster = array();
        $result_point = array();
        foreach ($clusters as $index_1 => $cluster) {
            foreach ($cluster as $index_2 => $point) {
                $filter_data_cluster = DB::table('biji_kopi')
                    ->join('aroma_biji_kopi', 'aroma_biji_kopi.id', 'biji_kopi.aroma_id')
                    ->join('warna_biji_kopi', 'warna_biji_kopi.id', 'biji_kopi.warna_id')
                    ->join('fisik_biji_kopi', 'fisik_biji_kopi.id', 'biji_kopi.fisik_id')
                    ->join('kadar_air_biji_kopi', 'kadar_air_biji_kopi.id', 'biji_kopi.kadar_air_id')
                    ->where('aroma_id', $point[0])->where('warna_id', $point[1])->where('fisik_id', $point[2])->where('kadar_air_id', $point[3])
                    ->get()
                    ->toArray();
                $result_point[$index_2] = $filter_data_cluster;
            }
            $result_cluster["cluster_" . $index_1 + 1] = array_unique(array_merge(...$result_point), SORT_REGULAR);
        }
        return view('k-means', compact('result_cluster'));
    }
}
