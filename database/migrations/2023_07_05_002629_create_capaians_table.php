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
        Schema::create('capaians', function (Blueprint $table) {
            $table->id();
            $table->integer('timbulan_sampah');
            $table->integer('pengurangan_sampah');
            $table->integer('penanganan_sampah');
            $table->integer('sampah_terkelola');
            $table->integer('sampah_tidak_terkelola');
            $table->integer('pembatasan_timbulan');
            $table->integer('pemanfaatan_kembali');
            $table->integer('daur_ulang');
            $table->integer('pemilahan');
            $table->integer('pengangkutan');
            $table->integer('pengolahan');
            $table->integer('pemrosesan_akhir');
            $table->string('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capaians');
    }
};
