<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
	        $table->string('nama_panggilan');
	        $table->string('no_hp');
	        $table->string('email');
	        $table->string('jk');
	        $table->string('domisili');
	        $table->string('status_marital');
	        $table->string('tmpt_lahir');
	        $table->string('tgl_lahir');
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
        Schema::dropIfExists('master_anggota');
    }
}
