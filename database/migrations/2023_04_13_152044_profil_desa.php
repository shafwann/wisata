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
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('foto_desa')->nullable();
            $table->text('deskripsi_desa')->nullable();
            $table->string('alamat_desa')->nullable();
            $table->unsignedBigInteger('admin_id')->unique();
            $table->char('province_id', 2);
            $table->char('regency_id', 4);
            $table->char('district_id', 7);
            $table->char('village_id', 10)->unique();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_desa');
    }
};
