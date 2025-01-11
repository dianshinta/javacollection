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
            $table->string('karyawan_nip'); // Foreign key
            $table->unsignedBigInteger('bulan_id');
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->integer('hadir')->default(0)->nullable();
            $table->integer('absen')->default(0)->nullable();
            $table->integer('izin')->default(0)->nullable();
            $table->integer('gaji_pokok')->default(0)->nullable();
            $table->integer('kasbon')->default(0)->nullable();
            $table->integer('denda')->default(0)->nullable();
            $table->integer('total_gaji')->default(0)->nullable();
            $table->timestamps();
            $table->enum('status', ['Telah Dikirim', 'Belum Dikirim'])->default('Belum Dikirim');

            $table->foreign('karyawan_nip')->references('nip')->on('karyawans')->onDelete('cascade');
            $table->foreign('bulan_id')->references('id')->on('bulans');
            $table->unique(['karyawan_nip', 'bulan_id']); // Tambahkan constraint unik, karena yang bikin unik dari tabel ini adalah user_nip dan bulan_id
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
