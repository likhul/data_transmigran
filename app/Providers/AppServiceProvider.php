<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\LogAktivitas;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // --- KUNCI ANTI LOOP (SANGAT PENTING) ---
        static $sedangMencatat = false;

        Event::listen([
            'eloquent.created: *',
            'eloquent.updated: *',
            'eloquent.deleted: *',
        ], function ($event, $models) use (&$sedangMencatat) {
            
            // 1. Jika kunci sedang aktif, abaikan aksi ini
            if ($sedangMencatat) {
                return;
            }

            // 2. Cek apakah ada admin yang login
            if (!Auth::check()) {
                return;
            }

            foreach ($models as $model) {
                // 3. Jangan catat jika yang berubah adalah tabel log itu sendiri
                if ($model instanceof LogAktivitas) {
                    continue;
                }

                $aksi = '';
                if (str_contains($event, 'created:')) $aksi = 'Tambah';
                elseif (str_contains($event, 'updated:')) $aksi = 'Edit';
                elseif (str_contains($event, 'deleted:')) $aksi = 'Hapus';

                if ($aksi !== '') {
                    $modul = class_basename($model);
                    $item = $model->nama_kabupaten 
                            ?? $model->nama_kecamatan 
                            ?? $model->nama_upt 
                            ?? $model->judul 
                            ?? $model->name 
                            ?? $model->nama 
                            ?? 'ID: ' . $model->id;

                    // --- PROSES PENGUNCIAN ---
                    $sedangMencatat = true; 

                    try {
                        LogAktivitas::create([
                            'user_id'    => Auth::id(),
                            'aksi'       => $aksi,
                            'modul'      => $modul,
                            'keterangan' => "$aksi data $modul: $item",
                        ]);
                    } finally {
                        // Buka kembali kuncinya setelah selesai
                        $sedangMencatat = false; 
                    }
                }
            }
        });
    }
}