<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_webs', function (Blueprint $table) {
            $table->string('logo_website')->nullable();
            $table->string('favicon_website')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_youtube')->nullable();
            $table->text('google_maps')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profil_webs', function (Blueprint $table) {
            $table->dropColumn(['logo_website', 'favicon_website', 'link_facebook', 'link_instagram', 'link_youtube', 'google_maps']);
        });
    }
};