<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perizinan', function (Blueprint $table) {
            $table->id(); 
            $table->string('nip', 20);
            $table->string('nama', 50)->nullable();
            $table->string('lampiran')->nullable();
            $table->date('tanggal');
            $table->enum('jenis', ['Sakit', 'Cuti', 'Lainnya']);
            $table->text('keterangan');
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak']);
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
            $table->unsignedBigInteger('bulan_id')->nullable();

            $table->foreign('bulan_id')->references('id')->on('bulans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perizinan');
    }
};