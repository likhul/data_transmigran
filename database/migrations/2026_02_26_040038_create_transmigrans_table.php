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
        Schema::create('transmigrans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_keluarga');
            $table->integer('jumlah_anggota');
            $table->string('asal_daerah');
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->onDelete('restrict');
            $table->year('tahun_penempatan');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes(); // Ini fitur agar data tidak terhapus permanen
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmigrans');
    }
};
