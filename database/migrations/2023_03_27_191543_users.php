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
            $table->char('province_id', 2)->nullable();
            $table->char('regency_id', 4)->nullable();
            $table->char('district_id', 7)->nullable();
            $table->char('village_id', 10)->nullable();
            // $table->integer('province_id')->nullable();
            // $table->integer('regency_id')->nullable();
            // $table->integer('district_id')->nullable();
            // $table->integer('village_id')->nullable();
            $table->enum('edit_admin_desa', ['0', '1'])->default('0'); // Admin Kabupaten
            $table->enum('approve_wisata', ['0', '1'])->default('0'); // Admin Kabupaten & Admin Desa
            $table->enum('tambah_edit_admin_destinasi', ['0', '1'])->default('0'); // Admin Desa
            $table->enum('mengajukan_destinasi', ['0', '1'])->default('0'); // Admin Desa
            $table->enum('konfirmasi_tiket', ['0', '1'])->default('0'); // Admin Wisata
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role');
            // $table->foreign('province_id')
            //     ->references('id')
            //     ->on('provinces')
            //     ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('province_id')
                ->references('id')
                ->on('provinces');
            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts');
            $table->foreign('village_id')
                ->references('id')
                ->on('villages');
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
