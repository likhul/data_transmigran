<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\ProfilWeb;
use App\Models\Uptd;
use App\Models\Pengurus;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Memuat profil website (Dipakai di semua halaman)
     * Data ini juga di-cache agar tidak query database terus-menerus
     */
    private function getProfil()
    {
        return Cache::remember('profil_web', now()->addDay(), function () {
            return ProfilWeb::first() ?? (object)[
                'judul_website' => 'Sistem Informasi Transmigran',
                'deskripsi_singkat' => 'Selamat datang di portal informasi kami.',
                'alamat_kantor' => '-',
                'nomor_telepon' => '-',
                'logo_website' => null,
                'favicon_website' => null,
                'link_facebook' => '#',
                'link_instagram' => '#',
                'link_youtube' => '#',
                'google_maps' => null
            ];
        });
    }

    /**
     * 1. HALAMAN BERANDA UTAMA (/)
     */
    public function index()
    {
        $profil = $this->getProfil();

        // Data dinamis di Beranda di-cache selama 1 jam untuk performa maskimal
        $penguruses = Cache::remember('pengurus_list', now()->addHours(1), function () {
            return Pengurus::all();
        });

        // Ingat: Berita dan Galeri biasanya sering update, cache cukup 30 menit
        $beritas = Cache::remember('berita_terbaru', now()->addMinutes(30), function () {
            return Berita::latest()->take(3)->get();
        });

        $galeris = Cache::remember('galeri_terbaru', now()->addMinutes(30), function () {
            return Galeri::latest()->take(8)->get();
        });

        return view('welcome', compact('profil', 'penguruses', 'beritas', 'galeris'));
    }

    /**
     * 2. HALAMAN STATISTIK & DEMOGRAFI (/statistik)
     * Menggunakan Caching penuh karena kalkulasinya sangat berat
     */
    public function statistik()
    {
        $profil = $this->getProfil();

        // Ambil semua data statistik terhitung dari Cache (Masa simpan 1 hari)
        $dataStatistik = Cache::remember('statistik_full_dashboard', now()->addDay(), function () {
            
            $statistik = [
                'transmigran' => Uptd::sum('jiwa_baru'), 
                'kk'          => Uptd::sum('kk_baru'),
                'uptd'        => Uptd::count(),
                'kabupaten'   => Kabupaten::count(),
                'kecamatan'   => Kecamatan::count(),
            ];

            // DATA MODAL
            $kabupaten_list = Kabupaten::with('uptds')->get()->map(function($kab) {
                return [
                    'nama' => $kab->nama_kabupaten,
                    'jiwa' => $kab->uptds->sum('jiwa_baru'),
                    'kk'   => $kab->uptds->sum('kk_baru'),
                    'total_uptd' => $kab->uptds->count()
                ];
            });

            $kecamatan_list = Kecamatan::withSum('uptds as total_jiwa', 'jiwa_baru')
                ->withSum('uptds as total_kk', 'kk_baru')
                ->withCount('uptds as jml_uptd')
                ->get();

            $uptd_list = Uptd::select('nama_upt', 'jiwa_baru', 'kk_baru', 'tahun_penyerahan')->get();

            // ==========================================
            // DATA UNTUK 5 GRAFIK DASHBOARD
            // ==========================================
            
            // 1. Tren Populasi Tahunan (Line Chart)
            $dataJiwa = Uptd::select('tahun_penyerahan', DB::raw('SUM(jiwa_baru) as jumlah'))
                ->groupBy('tahun_penyerahan')->orderBy('tahun_penyerahan', 'asc')->get(); 
            
            $labels = $dataJiwa->pluck('tahun_penyerahan')->map(function($item) { return "Thn " . $item; });
            $totals = $dataJiwa->pluck('jumlah');

            $trenKabupaten = [];
            $semuaKab = Kabupaten::all();
            foreach($semuaKab as $kab) {
                $dataTren = Uptd::where('kabupaten_id', $kab->id)
                    ->select('tahun_penyerahan', DB::raw('SUM(jiwa_baru) as jumlah'))
                    ->groupBy('tahun_penyerahan')
                    ->pluck('jumlah', 'tahun_penyerahan')
                    ->toArray();

                $trenKabupaten[$kab->nama_kabupaten] = [];
                foreach ($dataJiwa->pluck('tahun_penyerahan') as $thn) {
                    $trenKabupaten[$kab->nama_kabupaten][] = $dataTren[$thn] ?? 0;
                }
            }

            // 2 & 3. Sebaran Kabupaten & Komparasi KK vs Jiwa (Doughnut & Grouped Bar)
            $kabupatenStats = Kabupaten::withSum('uptds as total_jiwa', 'jiwa_baru')
                                       ->withSum('uptds as total_kk', 'kk_baru')
                                       ->get();
            $kabLabels = $kabupatenStats->pluck('nama_kabupaten');
            $kabTotals = $kabupatenStats->pluck('total_jiwa');
            $kabKkTotals = $kabupatenStats->pluck('total_kk'); 

            // 4. Top 5 UPTD (Horizontal Bar)
            $topUptd = Uptd::orderBy('jiwa_baru', 'desc')->take(5)->get(['nama_upt', 'jiwa_baru']);
            $uptdLabels = $topUptd->pluck('nama_upt');
            $uptdTotals = $topUptd->pluck('jiwa_baru');

            // 5. Era Penyerahan UPTD (Polar Area)
            $allUptds = Uptd::select('tahun_penyerahan')->get();
            $eras = ['Era 1980an' => 0, 'Era 1990an' => 0, 'Era 2000an' => 0, 'Era 2010an' => 0, 'Era 2020an' => 0];
            
            foreach($allUptds as $u) {
                $thn = (int)$u->tahun_penyerahan;
                if($thn >= 1980 && $thn < 1990) $eras['Era 1980an']++;
                elseif($thn >= 1990 && $thn < 2000) $eras['Era 1990an']++;
                elseif($thn >= 2000 && $thn < 2010) $eras['Era 2000an']++;
                elseif($thn >= 2010 && $thn < 2020) $eras['Era 2010an']++;
                elseif($thn >= 2020) $eras['Era 2020an']++;
            }
            
            $eraLabels = []; $eraTotals = [];
            foreach($eras as $label => $total) {
                if($total > 0) { $eraLabels[] = $label; $eraTotals[] = $total; } 
            }

            // Kembalikan semua data komputasi ini ke dalam satu paket Cache
            return compact(
                'statistik', 'kabupaten_list', 'kecamatan_list', 'uptd_list', 
                'labels', 'totals', 'trenKabupaten', 'kabLabels', 'kabTotals', 'kabKkTotals',
                'uptdLabels', 'uptdTotals', 'eraLabels', 'eraTotals'
            );
        });

        // Ekstrak data dari Cache agar bisa dilempar ke View
        extract($dataStatistik);

        return view('frontend.statistik', compact(
            'profil', 'statistik', 'kabupaten_list', 'kecamatan_list', 'uptd_list', 
            'labels', 'totals', 'trenKabupaten', 'kabLabels', 'kabTotals', 'kabKkTotals',
            'uptdLabels', 'uptdTotals', 'eraLabels', 'eraTotals'
        ));
    }

    /**
     * 3. HALAMAN KONTAK (/kontak)
     */
    public function kontak()
    {
        $profil = $this->getProfil();
        return view('frontend.kontak', compact('profil'));
    }

    /**
     * 4. HALAMAN DIREKTORI UPTD (Daftar & Pencarian)
     */
    public function direktori(Request $request)
    {
        $profil = $this->getProfil();
        
        $query = Uptd::with(['kabupaten', 'kecamatan']);

        // Jika ada pencarian, kita TIDAK MENGGUNAKAN Cache karena datanya spesifik
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_upt', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_desa_baru', 'like', '%' . $request->search . '%');
            $uptds = $query->paginate(6);
            $uptds->appends(['search' => $request->search]); // Agar tombol paginasi tetap membawa kata kunci pencarian
        } else {
            // Jika tidak ada pencarian (hanya halaman biasa), kita Cache halamannya!
            // Cache disesuaikan dengan nomor halaman URL (page=1, page=2, dst)
            $page = $request->get('page', 1);
            $uptds = Cache::remember("direktori_uptd_page_{$page}", now()->addHours(6), function () use ($query) {
                return $query->paginate(6);
            });
        }

        return view('frontend.direktori', compact('uptds', 'profil'));
    }

    /**
     * 5. HALAMAN DETAIL UPTD (Metagoal)
     */
    public function direktoriDetail($id)
    {
        $profil = $this->getProfil();
        
        // Detail UPTD juga di-cache per ID selama 1 hari
        $uptd = Cache::remember("uptd_detail_{$id}", now()->addDay(), function () use ($id) {
            return Uptd::with(['kabupaten', 'kecamatan'])->findOrFail($id);
        });

        return view('frontend.direktori_detail', compact('uptd', 'profil'));
    }
}