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
            $table->string('day');
            $table->integer('present')->default(0);
            $table->integer('leave')->default(0);
            $table->integer('late')->default(0);
            $table->integer('absent')->default(0);
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
