<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Uptd;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        // 1. HITUNG TOTAL (Berdasarkan data yang kamu input di Penyerahan UPTD)
        $total_transmigran = Uptd::sum('jiwa_baru'); // Menjumlahkan semua kolom jiwa_baru
        $total_rekap_uptd  = Uptd::count();          // Menghitung berapa baris data UPTD
        $total_kabupaten   = Kabupaten::count();
        $total_kecamatan   = Kecamatan::count();

        // 2. DATA GRAFIK TREN (SEMUA TAHUN)
        // Kita ambil tahun_penyerahan secara unik dari database dan jumlahkan jiwanya
        $trendData = Uptd::select('tahun_penyerahan', DB::raw('SUM(jiwa_baru) as total'))
            ->groupBy('tahun_penyerahan')
            ->orderBy('tahun_penyerahan', 'asc') // Urutkan dari tahun tertua ke terbaru
            ->get();

        $labels    = $trendData->pluck('tahun_penyerahan'); // Isinya: [1975, 1980, 2023, ...]
        $dataWarga = $trendData->pluck('total');           // Isinya: [500, 1200, 300, ...]

        // 3. DATA GRAFIK SEBARAN KABUPATEN
        // Menghitung total jiwa per kabupaten dari tabel UPTD
        $kabupatenStats = Kabupaten::withSum('uptds as total_jiwa', 'jiwa_baru')->get();
        
        $label_kabupaten = $kabupatenStats->pluck('nama_kabupaten');
        $data_kabupaten  = $kabupatenStats->map(function($kab) {
            return $kab->total_jiwa ?? 0; // Jika kosong kasih 0
        });

        // 4. DATA TABEL TERBARU
        $rekap_uptd = Uptd::with(['kabupaten', 'kecamatan'])
            ->orderBy('tahun_penyerahan', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'total_transmigran', 
            'total_rekap_uptd', 
            'total_kabupaten', 
            'total_kecamatan',
            'labels', 
            'dataWarga', 
            'label_kabupaten', 
            'data_kabupaten', 
            'rekap_uptd'
        ));
    }
}