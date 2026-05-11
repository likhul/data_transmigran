<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('uptds', function (Blueprint $table) {
            // Menambahkan laci teks sejarah
            $table->text('sejarah_desa')->nullable()->after('permasalahan');
        });
    }

    public function down(): void
    {
        Schema::table('uptds', function (Blueprint $table) {
            $table->dropColumn('sejarah_desa');
        });
    }
};