<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id_pendaftaran');
            $table->integer('id_pengguna');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('perusahaan');
            $table->integer('no_hp');
            $table->string('agama');
            $table->string('nama_keluarga');
            $table->string('pekerjaan_keluarga');
            $table->string('jenis_pendaftaran');
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
        Schema::dropIfExists('pendaftarans');
    }
}
