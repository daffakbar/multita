<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nis');
            $table->string('namaSiswa');
            $table->string('kelas');
            $table->string('jenisKelamin');
            $table->string('agama');
            $table->string('password');
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
        Schema::dropIfExists('master_siswa');
    }
}
