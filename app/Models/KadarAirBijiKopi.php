<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KadarAirBijiKopi extends Model
{
    use HasFactory;

    /**
     * The attributes protected table
     */
    protected $table = 'kadar_air_biji_kopi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['deskripsi_kadar_air'];
}
