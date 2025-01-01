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
            $table->integer('nip')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->integer('gaji_pokok');
            $table->integer('kasbon');  
            $table->integer('denda')->default(0); // Denda
            $table->integer('kehadiran'); // count kehadiran
            $table->integer('total_gaji')->nullable(); // Gaji akhir setelah perhitungan
            $table->timestamps();
            // $table->foreignId('nip')->constrained( // Relasi ke NIP di tabel Users
            //     table: 'users',
            //     indexName: 'ES_nip'
            // );
            // $table->foreignId('gaji_pokok')->constrained( //Relasi ke gaji pokok di tabel Users
            //     table: 'users',
            //     indexName: 'ES_gaji_pokok'
            // );
            // $table->foreignId('saldo_kasbon')->constrained(
            //     table: 'kasbon',
            //     indexName: 'ES_kasbon'
            // );
            
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
