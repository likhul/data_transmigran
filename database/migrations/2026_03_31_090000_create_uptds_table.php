<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('uptds', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_penyerahan');
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->onDelete('cascade');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('cascade');
            $table->string('nama_upt'); // UPT/Desa Trans
            $table->string('waktu_penempatan'); // Bulan/Tahun Penempatan
            
            // Data Penempatan Awal
            $table->integer('kk_awal');
            $table->integer('jiwa_awal');
            
            // Status Desa
            $table->enum('status_desa', ['SEM', 'DEF']); // SEM (Sementara) / DEF (Definitif)
            
            // Data Desa Baru
            $table->string('nama_desa_baru');
            $table->integer('kk_baru');
            $table->integer('jiwa_baru');
            
            // Administrasi & Lainnya
            $table->string('no_ba_penyerahan'); // Berita Acara
            $table->string('pola')->nullable(); // Pola TU, dll
            $table->text('permasalahan')->nullable();
            
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
