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
        Schema::table('capaians', function (Blueprint $table) {
            $table->integer('pembatasan_timbulan');
            $table->integer('pemanfaatan_kembali');
            $table->integer('daur_ulang');
            $table->integer('pemilahan');
            $table->integer('pengangkutan');
            $table->integer('pengolahan');
            $table->integer('pemrosesan_akhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capaians', function (Blueprint $table) {
            $table->dropColumn('pembatasan_timbulan');
            $table->dropColumn('pemanfaatan_kembali');
            $table->dropColumn('daur_ulang');
            $table->dropColumn('pemilahan');
            $table->dropColumn('pengangkutan');
            $table->dropColumn('pengolahan');
            $table->dropColumn('pemrosesan_akhir');
        });
    }
};
