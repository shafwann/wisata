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
        Schema::create('profil_kabupaten', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kabupaten');
            $table->string('foto_kabupaten')->nullable();
            $table->unsignedBigInteger('admin_id')->unique();
            $table->char('province_id', 2);
            $table->char('regency_id', 4)->unique();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('regency_id')->references('id')->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_kabupaten');
    }
};
