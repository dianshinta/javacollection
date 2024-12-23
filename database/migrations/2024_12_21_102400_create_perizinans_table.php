<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perizinan', function (Blueprint $table) {
            $table->string('nip', 20)->primary();
            $table->string('nama', 50);
            $table->string('lampiran')->nullable();
            $table->date('tanggal');
            $table->enum('jenis', ['Sakit', 'Cuti', 'Lainnya']);
            $table->text('keterangan');
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak']);
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perizinan');
    }
};