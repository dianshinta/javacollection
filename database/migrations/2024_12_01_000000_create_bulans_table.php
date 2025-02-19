<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bulans', function (Blueprint $table) {
            $table->id();
            $table->integer('bulan'); // Bulan dalam format angka (1-12)
            $table->integer('tahun'); // Tahun
            $table->string('bulan_tahun')->nullable(); // Tanggal untuk pengurutan berdasarkan bulan dan tahun
            $table->timestamps(); // Menyimpan kapan data ini ditambahkan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulans');
    }
};
