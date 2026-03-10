<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilWeb;
use App\Models\Transmigran;
use App\Models\Uptd;
use App\Models\Mutasi;

class FrontController extends Controller
{
    public function index()
    {
        $profil = ProfilWeb::first() ?? (object)[
            'judul_website' => 'Sistem Informasi Transmigran',
            'deskripsi_singkat' => 'Selamat datang di portal informasi kami.',
            'foto_struktur' => null,
            'alamat_kantor' => '-',
            'nomor_telepon' => '-'
        ];

        $statistik = [
            'transmigran' => Transmigran::count(),
            'uptd' => Uptd::count(),
            'mutasi' => Mutasi::count(),
        ];

        // MENGAMBIL DATA GRAFIK: Jumlah transmigran per tahun
        $dataKK = \App\Models\Transmigran::selectRaw('tahun_penempatan as tahun, count(*) as jumlah')
        ->groupBy('tahun_penempatan')
        ->orderBy('tahun_penempatan', 'asc')
        ->get();

        $labels = [];
        $totals = [];
        $totalAkumulasi = 0;

        foreach ($dataKK as $item) {
            $labels[] = $item->tahun;
            $totalAkumulasi += $item->jumlah; // Menambahkan jumlah KK tahun ini ke total sebelumnya
            $totals[] = $totalAkumulasi;     // Hasilnya akan ribuan
        }

        $penguruses = \App\Models\Pengurus::orderBy('urutan', 'asc')->get();

    return view('welcome', compact('profil', 'statistik', 'labels', 'totals', 'penguruses'));

    }
}