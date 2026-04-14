<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Siapa yang melakukan
            $table->string('aksi'); // Tambah, Edit, Hapus, dll
            $table->string('modul'); // Nama menu/modul (Berita, UPTD, dll)
            $table->text('keterangan'); // Detail aktivitas
            $table->timestamps();

            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_aktivitas');
    }
};