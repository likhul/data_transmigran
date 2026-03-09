<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transmigran;
use App\Models\Kabupaten;
use App\Models\Mutasi;
use App\Models\Uptd;

class DashboardController extends Controller
{
    public function index()
{
    // 1. Data Ringkasan (Card)
    $total_transmigran = Transmigran::count();
    $total_kabupaten = Kabupaten::count();
    $total_mutasi = Mutasi::count();

    // 2. Data Grafik & Tabel Agregat (Transmigran Individu)
    $grafik_kabupaten = Kabupaten::with('transmigrans')->withCount('transmigrans')->get();
    $label_kabupaten = $grafik_kabupaten->pluck('nama_kabupaten');
    $data_kabupaten = $grafik_kabupaten->pluck('transmigrans_count');

    // 3. AMBIL DATA UPTD (Data Rekap Manual/Historis)
    // Inilah yang tadi terlewat sehingga muncul error
    $rekap_uptd = Uptd::with('kabupaten')->orderBy('tahun', 'desc')->get();

    $tahunSekarang = date('Y');
    $labels = [];
    $dataWarga = [];

    for ($i = 4; $i >= 0; $i--) {
        $tahun = $tahunSekarang - $i;
        $labels[] = $tahun;
        $dataWarga[] = \App\Models\Transmigran::where('tahun_penempatan', $tahun)->count();
    }

    // 4. KIRIM SEMUA KE VIEW
    return view('dashboard', compact(
        'total_transmigran', 
        'total_kabupaten', 
        'total_mutasi',
        'label_kabupaten',
        'data_kabupaten',
        'grafik_kabupaten',
        'rekap_uptd',
        'labels',
        'dataWarga'      // <-- Pastikan variabel ini tertulis di sini!
    ));
}   
}