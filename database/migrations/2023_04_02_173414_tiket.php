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
            $table->string('nama_pemesan');
            $table->integer('jumlah_tiket');
            $table->date('tanggal_kunjungan');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('destinasi_id');
            $table->unsignedBigInteger('wahana_id')->nullable();
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->enum('konfirmasi', [0, 1]);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('destinasi_id')->references('id')->on('destinasi');
            $table->foreign('wahana_id')->references('id')->on('wahana');
            $table->foreign('paket_id')->references('id')->on('paket');
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
