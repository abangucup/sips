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
        Schema::disableForeignKeyConstraints();
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kenderaan_id')->constrained()->onDelete('cascade');
            $table->string('jenis');
            $table->string('hari_pelayanan');
            $table->string('jalur');
            $table->foreignId('desa_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('jadwals');
    }
};
