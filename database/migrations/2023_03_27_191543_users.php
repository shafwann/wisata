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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('role_id')->default('5');
            $table->enum('edit_admin_desa', ['0', '1'])->default('0'); // Admin Kabupaten
            $table->enum('approve_wisata', ['0', '1'])->default('0'); // Admin Kabupaten & Admin Desa
            $table->enum('tambah_edit_admin_destinasi', ['0', '1'])->default('0'); // Admin Desa
            $table->enum('mengajukan_destinasi', ['0', '1'])->default('0'); // Admin Desa
            $table->enum('konfirmasi_tiket', ['0', '1'])->default('0'); // Admin Wisata
            $table->unsignedBigInteger('kabupaten_id');
            $table->unsignedBigInteger('desa_id');
            $table->unsignedBigInteger('destinasi_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('kabupaten_id')->references('id')->on('kabupaten');
            $table->foreign('desa_id')->references('id')->on('desa');
            $table->foreign('destinasi_id')->references('id')->on('destinasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
