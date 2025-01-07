<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->unsignedBigInteger('toko_id');
            $table->text('alamat');
            $table->string('no_telp', 15);
            $table->string('bank');
            $table->string('no_rek');
            $table->decimal('kasbon', 15, 2)->default(0);
            $table->timestamps();

            // Foreign key ke tabel toko (jika ada)
            $table->foreign('toko_id')->references('id')->on('tokos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
