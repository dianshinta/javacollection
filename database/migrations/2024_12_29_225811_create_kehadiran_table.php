<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Hadir', 'Terlambat', 'Tidak Hadir']);
            $table->date('tanggal');
            $table->time('waktu');
            $table->unsignedBigInteger('toko_id')->nullable();
            $table->string('nip');
            $table->unsignedBigInteger('bulan_id')->nullable();

            $table->foreign('nip')->references('nip')->on('karyawans')->onDelete('cascade'); //menghubungkan nip dari DB kehadiran ke users
            $table->foreign('bulan_id')->references('id')->on('bulans')->onDelete('cascade'); //menghubungkan nip dari DB kehadiran ke users
            $table->foreign('toko_id')->references('id')->on('toko')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran');
    }
}
