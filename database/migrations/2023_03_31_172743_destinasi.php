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
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_destinasi');
            $table->unsignedBigInteger('kategori_id');
            $table->char('village_id', 7);
            $table->string('deskripsi_destinasi');
            $table->string('alamat_destinasi');
            $table->string('htm_destinasi');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinasi');
    }
};
