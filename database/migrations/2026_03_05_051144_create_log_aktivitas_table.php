<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Siapa pelakunya?
            $table->string('aksi'); // Ngapain dia? (Tambah, Edit, Hapus)
            $table->string('modul'); // Di halaman mana? (Transmigran, UPTD, Mutasi)
            $table->text('keterangan'); // Detailnya (Misal: "Menghapus data atas nama Budi")
            $table->timestamps(); // Kapan kejadiannya? (Waktu persisnya)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};