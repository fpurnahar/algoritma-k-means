<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnaBijiKopi extends Model
{
    use HasFactory;

    /**
     * The attributes protected table
     */
    protected $table = 'warna_biji_kopi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['deskripsi_warna'];
}
