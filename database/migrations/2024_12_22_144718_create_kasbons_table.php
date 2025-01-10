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
        Schema::create('kasbon', function (Blueprint $table) {
            $table->id(); // Membuat kolom id (integer, auto-increment, primary key)
            $table->string('nama', 50)->nullable();
            $table->string('nip', 20); // NIP dengan panjang maksimal 20 karakter
            $table->enum('status_kasbon', ['Lunas', 'Belum Lunas']); // Enum untuk status
            $table->enum('status_bayar', ['Diproses', 'Disetujui', 'Ditolak']); // Enum untuk status
            $table->text('alasan')->nullable(); // Alasan pengajuan kasbon
            $table->enum('keterangan', ['Pengajuan', 'Pembayaran']); // Keterangan
            $table->date('tanggal_pengajuan')->nullable(); // Tanggal pengajuan
            $table->date('tanggal_pembayaran')->nullable(); // Tanggal pembayaran
            $table->integer('nominal_diajukan')->nullable(); // Nominal diajukan
            $table->integer('nominal_dibayar')->nullable(); // Nominal dibayar
            $table->integer('saldo_akhir'); // Nominal diajukan
            $table->string('lampiran')->nullable();
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
            $table->unsignedBigInteger('bulan_id')->nullable();

            $table->foreign('bulan_id')->references('id')->on('bulans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasbon');
    }
};