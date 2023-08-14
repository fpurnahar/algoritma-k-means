<?php

namespace App\Repositories;

class KMeansRepository
{
    public function cluster($samples, $k)
    {
        $centroids = $this->initializeCentroids($samples, $k);
        $iterations = 100;  // Set a reasonable number for max iterations

        while ($iterations--) {
            $clusters = array_fill(0, $k, []);

            foreach ($samples as $sample) {
                $clusterIdx = $this->nearestCentroid($sample, $centroids);
                $clusters[$clusterIdx][] = $sample;
            }

            $newCentroids = $this->recalculateCentroids($clusters);

            if ($newCentroids == $centroids) {
                return $clusters;
            }

            $centroids = $newCentroids;
        }

        return $clusters;
    }

    private function initializeCentroids($samples, $k)
    {
        shuffle($samples);
        return array_slice($samples, 0, $k);
    }

    private function nearestCentroid($sample, $centroids)
    {
        $nearest = null;
        $nearestDistance = INF;

        foreach ($centroids as $idx => $centroid) {
            $distance = $this->euclidean($sample, $centroid);
            if ($distance < $nearestDistance) {
                $nearestDistance = $distance;
                $nearest = $idx;
            }
        }

        return $nearest;
    }

    private function recalculateCentroids($clusters)
    {
        $centroids = [];

        foreach ($clusters as $cluster) {
            $centroids[] = $this->mean($cluster);
        }

        return $centroids;
    }

    private function euclidean($a, $b)
    {
        return sqrt(array_sum(array_map(function ($a_i, $b_i) {
            return pow($a_i - $b_i, 2);
        }, $a, $b)));
    }

    private function mean($samples)
    {
        $count = count($samples);
        if ($count === 0) {
            return [];
        }

        $dimension = count($samples[0]);
        $mean = array_fill(0, $dimension, 0);

        foreach ($samples as $sample) {
            foreach ($sample as $d => $value) {
                $mean[$d] += $value;
            }
        }

        foreach ($mean as $d => $value) {
            $mean[$d] /= $count;
        }

        return $mean;
    }
}
