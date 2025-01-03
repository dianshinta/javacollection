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
        Schema::create('employer_salaries', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('user_nip'); // Foreign key
            $table->string('nama');
            $table->string('jabatan');
            $table->integer('hadir');
            $table->integer('absen');
            $table->integer('izin');
            $table->integer('gaji_pokok');
            $table->integer('kasbon');
            $table->integer('denda')->default(0);
            $table->integer('total_gaji')->default(0);
            $table->unsignedBigInteger('bulan_id');
            $table->timestamps();

            $table->foreign('user_nip')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('bulan_id')->references('id')->on('bulans');
            $table->unique(['user_nip', 'bulan_id']); // Tambahkan constraint unik, karena yang bikin unik dari tabel ini adalah user_nip dan bulan_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_salaries');
    }
};
