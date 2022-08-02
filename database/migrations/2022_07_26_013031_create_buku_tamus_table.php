<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_tamus', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->integer('user_id');
            $table->bigInteger('instansi_id')->unsigned();
            $table->foreign('instansi_id')->references('id')->on('instansis')->onDelete('cascade');
            $table->string('no_token')->unique();
            $table->integer('jumlah_tamu');
            $table->string('nama_tamu');
            $table->string('alamat');
            $table->string('nama_instansi');
            $table->date('tanggal_kunjungan');
            $table->time('sunrise', $precision = 0);
            $table->string('tujuan_pegawai');
            $table->string('tujuan_kunjungan');
            $table->string('status')->default('In Progress');
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
        Schema::dropIfExists('buku_tamus');
    }
}
