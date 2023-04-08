<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesanan');
            $table->date('tanggal_pemesanan');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('destinasi_id');
            $table->unsignedBigInteger('wahana_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('destinasi_id')->references('id')->on('destinasi');
            $table->foreign('wahana_id')->references('id')->on('wahana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket');
    }
};
