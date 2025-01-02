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
            $table->string('toko', 50);
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade'); //menghubungkan nip dari DB kehadiran ke users
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
