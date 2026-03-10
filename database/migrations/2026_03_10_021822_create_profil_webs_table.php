<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_webs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_website')->default('Sistem Informasi Transmigran Jambi');
            $table->text('deskripsi_singkat')->nullable();
            $table->string('foto_struktur')->nullable(); // Untuk nyimpan nama file gambar
            $table->string('alamat_kantor')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_webs');
    }
};