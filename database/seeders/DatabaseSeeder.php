<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AromaBijiKopi;
use App\Models\BijiKopi;
use App\Models\FisikBijiKopi;
use App\Models\KadarAirBijiKopi;
use App\Models\KategoriBijiKopi;
use App\Models\User;
use App\Models\WarnaBijiKopi;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('P@ssw0rd'), // P@ssw0rd
            'remember_token' => Str::random(10),
        ]);

        // Aroma Kopi
        AromaBijiKopi::create([
            'deskripsi_aroma' => 'Tidak Pekat'
        ]);
        AromaBijiKopi::create([
            'deskripsi_aroma' => 'Kurang Pekat'
        ]);
        AromaBijiKopi::create([
            'deskripsi_aroma' => 'Cukup Pekat'
        ]);
        AromaBijiKopi::create([
            'deskripsi_aroma' => 'Pekat'
        ]);
        AromaBijiKopi::create([
            'deskripsi_aroma' => 'Sangat Pekat'
        ]);

        // Warna
        WarnaBijiKopi::create([
            'deskripsi_warna' => 'Green Bean'
        ]);
        WarnaBijiKopi::create([
            'deskripsi_warna' => 'Light Roast'
        ]);
        WarnaBijiKopi::create([
            'deskripsi_warna' => 'Medium Roast'
        ]);
        WarnaBijiKopi::create([
            'deskripsi_warna' => 'Dark Roast'
        ]);
        WarnaBijiKopi::create([
            'deskripsi_warna' => 'Black Roast'
        ]);

        // Fisik
        FisikBijiKopi::create([
            'deskripsi_fisik' => 'Kasar'
        ]);
        FisikBijiKopi::create([
            'deskripsi_fisik' => 'Kurang Halus'
        ]);
        FisikBijiKopi::create([
            'deskripsi_fisik' => 'Cukup Halus'
        ]);
        FisikBijiKopi::create([
            'deskripsi_fisik' => 'Sangat Halus'
        ]);
        FisikBijiKopi::create([
            'deskripsi_fisik' => 'Halus'
        ]);

        // Fisik
        KadarAirBijiKopi::create([
            'deskripsi_kadar_air' => '11.01%-12,5%'
        ]);
        KadarAirBijiKopi::create([
            'deskripsi_kadar_air' => '7,1%-11%'
        ]);
        KadarAirBijiKopi::create([
            'deskripsi_kadar_air' => '4,1%-7%'
        ]);
        KadarAirBijiKopi::create([
            'deskripsi_kadar_air' => '2.01%-4%'
        ]);
        KadarAirBijiKopi::create([
            'deskripsi_kadar_air' => '0,5%-2%'
        ]);


        BijiKopi::factory(1000)->create();
    }
}
