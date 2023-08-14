<?php

namespace App\Http\Controllers;

use App\Models\BijiKopi;
use Illuminate\Http\Request;
use App\Repositories\KMeansRepository;
use stdClass;

class KMeansController extends Controller
{
    private $kmeans_repository;

    public function __construct(KMeansRepository $kmeans_repository)
    {
        $this->kmeans_repository = $kmeans_repository;
    }

    public function cluster()
    {
        $get_data = BijiKopi::get();
        $k = 3;  // Number of clusters

        $newDataArray = [];
        foreach ($get_data as $key => $value) {
            $newData = [
                $value->aroma_id,
                $value->warna_id,
                $value->fisik_id,
                $value->kadar_air_id
            ];
            $newDataArray[] = $newData;
        }
        $clusters = $this->kmeans_repository->cluster($newDataArray, $k);

        $result_data_clustering = [];

        foreach ($clusters as $key1 => $value) {
            foreach ($value as $key2 => $point) {
                $filter_data_cluster = BijiKopi::join('aroma_biji_kopi', 'aroma_biji_kopi.id', 'biji_kopi.aroma_id')
                    ->join('warna_biji_kopi', 'warna_biji_kopi.id', 'biji_kopi.warna_id')
                    ->join('fisik_biji_kopi', 'fisik_biji_kopi.id', 'biji_kopi.fisik_id')
                    ->join('kadar_air_biji_kopi', 'kadar_air_biji_kopi.id', 'biji_kopi.kadar_air_id')
                    ->where('aroma_id', $point[0])
                    ->where('warna_id', $point[1])
                    ->where('fisik_id', $point[2])
                    ->where('kadar_air_id', $point[3])
                    ->groupBy('biji_kopi.id')
                    ->get()
                    ->toArray();
                // print_r($filter_data_cluster);
                $result_data_clustering[$key1][$key2] = $filter_data_cluster;
            }
        }
        echo "<pre>";
        print_r($result_data_clustering);
        exit;
        return view('k-means', compact('result_data_clustering'));
    }
}
