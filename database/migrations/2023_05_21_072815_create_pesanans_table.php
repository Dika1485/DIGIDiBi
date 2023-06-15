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
            $table->string('check_id')->unique();
            $table->integer('packagetype_id');
            $table->string('name');
            $table->string('phonenumber');
            $table->integer('weight');
            $table->string('address');
            $table->tinyInteger('isshuttle');
            $table->tinyInteger('deleted');
            $table->dateTime('timeestimation');
            $table->dateTime('timeorder');
            $table->dateTime('timefinish')->nullable();
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
