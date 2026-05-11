<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transmigrans', function (Blueprint $table) {
            // Menambah kolom kecamatan_id setelah kabupaten_id
            $table->unsignedBigInteger('kecamatan_id')->nullable()->after('kabupaten_id');
            
            // Menambah kolom nama_desa setelah kecamatan_id
            $table->string('nama_desa')->nullable()->after('kecamatan_id');

            // Opsional: Buat foreign key agar data kecamatan valid
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('transmigrans', function (Blueprint $table) {
            $table->dropForeign(['kecamatan_id']);
            $table->dropColumn(['kecamatan_id', 'nama_desa']);
        });
    }
};