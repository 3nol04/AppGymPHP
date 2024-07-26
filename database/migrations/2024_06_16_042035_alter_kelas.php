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
        Schema::table('kelas', function (Blueprint $table) {
            Schema:: table ('kelas', function (Blueprint $table) {
                $table->foreign('id_instruktor')->references('id')->on('instructors');
                $table->foreign('id_jadwal')->references('id')->on('jadwals');
                $table->foreign('harga_id')->references('id')->on('kelas_harga');
                $table->foreign('member_id')->references('id')->on('members');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            //
        });
    }
};
