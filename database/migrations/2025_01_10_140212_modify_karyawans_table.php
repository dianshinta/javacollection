<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->enum('gender', ['L', 'P'])->nullable()->change();
            $table->string('toko_id')->nullable()->change();
            $table->text('alamat')->nullable()->change();
            $table->string('no_telp', 15)->nullable()->change();
            $table->string('bank')->nullable()->change();
            $table->string('no_rek')->nullable()->change();
            $table->integer('gaji_pokok', 15, 2)->default(0)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            // Revert changes if needed (define the original column properties here)
        });
    }
}
