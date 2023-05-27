<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('paket_id');
            $table->string('nama');
            $table->string('no_hp');
            $table->integer('berat');
            $table->string('alamat');
            $table->tinyInteger('isantarjemput');
            $table->dateTime('estimasi');
            $table->dateTime('tgl_pesan');
            $table->dateTime('tgl_selesai');
            $table->timestamps();
            //$table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
