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
        Schema::create('uptds', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke tabel kabupaten
        $table->foreignId('kabupaten_id')->constrained('kabupatens')->onDelete('cascade');
        $table->string('nama_uptd');
        $table->integer('tahun');
        $table->integer('total_kk');
        $table->integer('total_jiwa');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uptds');
    }
};
