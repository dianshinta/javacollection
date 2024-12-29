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
        Schema::create('chart', function (Blueprint $table) {
            $table->id();
            $table->string('idtoko'); // Menghapus after('id')
            $table->date('day');
            $table->integer('hadir')->default(0);
            $table->integer('izin')->default(0);
            $table->integer('terlambat')->default(0);
            $table->integer('tanpaketerangan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart');
    }
};
