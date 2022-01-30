<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('status_keluarga');
            $table->integer('anak_ke');
            $table->integer('keluarga_id');
            $table->integer('anggota_id');
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
        Schema::dropIfExists('anggota_keluargas');
    }
}
