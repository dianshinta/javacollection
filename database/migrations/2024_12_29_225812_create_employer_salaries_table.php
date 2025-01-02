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
            $table->foreign('user_nip')->references('nip')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('jabatan');
            $table->unsignedBigInteger('kehadiran_id'); // Foreign key
            $table->foreign('kehadiran_id')->references('id')->on('kehadiran');
            $table->integer('izin');
            $table->integer('absen');
            $table->integer('gaji_pokok');
            $table->integer('kasbon');
            $table->integer('denda')->default(0);
            $table->integer('total_gaji')->default(0);
            $table->date('bulan_gaji')->nullable();
            $table->timestamps();
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
