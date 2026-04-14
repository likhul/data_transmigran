<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profil_webs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_website')->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->string('logo_website')->nullable();
            $table->string('favicon_website')->nullable();
            $table->string('alamat_kantor')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_youtube')->nullable();
            $table->text('google_maps')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_webs');
    }
};