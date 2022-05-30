<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputsakit', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nis', 255);
            $table->string('nama', 255);
            $table->string('rayon', 255);
            $table->string('rombel', 255);
            $table->string('tanggal', 255);
            $table->string('pukul', 255);
            $table->string('suhutubuh', 255);
            $table->string('diagnosa', 255);
            $table->string('keterangan', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inputsakit');
    }
}
