<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeanggotaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keanggotaan', function (Blueprint $table) {
            $table->id();
            $table->integer('anggota_id');
            $table->integer('tingkat_id');
            $table->integer('area_id');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->date('tgl_aktif')->nullable();
            $table->date('tgl_nonaktif')->nullable();
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
        Schema::dropIfExists('keanggotaan');
    }
}
