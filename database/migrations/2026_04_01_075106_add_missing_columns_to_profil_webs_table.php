<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('profil_webs', function (Blueprint $table) {
            // Mengecek dan menambahkan kolom satu per satu secara aman
            if (!Schema::hasColumn('profil_webs', 'judul_website')) {
                $table->string('judul_website')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'deskripsi_singkat')) {
                $table->text('deskripsi_singkat')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'logo_website')) {
                $table->string('logo_website')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'favicon_website')) {
                $table->string('favicon_website')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'alamat_kantor')) {
                $table->string('alamat_kantor')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'nomor_telepon')) {
                $table->string('nomor_telepon')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'link_facebook')) {
                $table->string('link_facebook')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'link_instagram')) {
                $table->string('link_instagram')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'link_youtube')) {
                $table->string('link_youtube')->nullable();
            }
            if (!Schema::hasColumn('profil_webs', 'google_maps')) {
                $table->text('google_maps')->nullable();
            }
        });
    }

    public function down()
    {
        // Tidak perlu diisi untuk skenario aman ini
    }
};