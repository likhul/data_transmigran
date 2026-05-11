<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('uptds', function (Blueprint $table) {
            // Menambahkan 3 laci baru untuk dokumen
            $table->string('file_sk_penyerahan')->nullable()->after('no_ba_penyerahan');
            $table->string('file_sk_penempatan')->nullable()->after('file_sk_penyerahan');
            $table->string('file_peta_lokasi')->nullable()->after('file_sk_penempatan');
        });
    }

    public function down(): void
    {
        Schema::table('uptds', function (Blueprint $table) {
            // Menghapus laci jika migrasi di-rollback
            $table->dropColumn([
                'file_sk_penyerahan', 
                'file_sk_penempatan', 
                'file_peta_lokasi'
            ]);
        });
    }
};