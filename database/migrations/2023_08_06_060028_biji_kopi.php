<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biji_kopi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_biji_kopi');
            $table->integer('aroma_id')->unsigned();
            $table->integer('warna_id')->unsigned();
            $table->integer('fisik_id')->unsigned();
            $table->integer('kadar_air_id')->unsigned();
            $table->timestamps();

            $table->foreign('aroma_id')->references('id')->on('aroma_biji_kopi');
            $table->foreign('warna_id')->references('id')->on('warna_biji_kopi');
            $table->foreign('fisik_id')->references('id')->on('fisik_biji_kopi');
            $table->foreign('kadar_air_id')->references('id')->on('kadar_air_biji_kopi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biji_kopi');
    }
};
