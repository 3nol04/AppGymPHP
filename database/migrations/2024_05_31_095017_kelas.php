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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->integer('kuota');
            $table->double('harga');
            $table->double('price');
            $table->unsignedBigInteger('id_instruktor')->nullable();
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->unsignedBigInteger('harga_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
