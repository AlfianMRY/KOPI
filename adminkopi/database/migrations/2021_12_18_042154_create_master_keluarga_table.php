<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('kode_keluarga');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
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
        Schema::dropIfExists('master_keluarga');
    }
}
