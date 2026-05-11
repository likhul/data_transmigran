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

        $penguruses = Cache::remember('pengurus_list', now()->addHours(1), function () {
            return Pengurus::all();
        });

        // UBAH DISINI: Ambil 10 berita agar cukup untuk dibagi-bagi di Blade
        $beritas = Cache::remember('berita_terbaru_home', now()->addMinutes(30), function () {
            // Kita ambil 10 berita terbaru
            return Berita::latest()->get(); 
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

            // 1. Tren Populasi Tahunan (Line Chart) - DATA PER TAHUN
            $allTrendData = Uptd::whereNotNull('tahun_penyerahan')
                ->where('tahun_penyerahan', '!=', '-')
                ->where('tahun_penyerahan', '!=', '')
                ->select('tahun_penyerahan', 'kabupaten_id', 'jiwa_baru')
                ->get();

            $semuaKab = Kabupaten::all();
            $kabMap = $semuaKab->pluck('nama_kabupaten', 'id');

            $aggregatedGlobal = [];
            $aggregatedKab = [];
            
            foreach($semuaKab as $kab) {
                $aggregatedKab[$kab->nama_kabupaten] = [];
            }

            foreach ($allTrendData as $item) {
                // Paksa ubah ke angka
                $thn = (int) trim($item->tahun_penyerahan); 
                
                // VALIDASI KETAT: Hanya proses jika tahun masuk akal (di atas 1900)
                if ($thn > 1900) { 
                    // PENTING: Jangan pakai kelompok 5 tahun lagi, langsung cetak tahun aslinya!
                    $label = (string) $thn; 

                    if (!isset($aggregatedGlobal[$label])) $aggregatedGlobal[$label] = 0;
                    $aggregatedGlobal[$label] += (int)$item->jiwa_baru;

                    $namaKab = $kabMap[$item->kabupaten_id] ?? null;
                    if ($namaKab) {
                        if (!isset($aggregatedKab[$namaKab][$label])) {
                            $aggregatedKab[$namaKab][$label] = 0;
                        }
                        $aggregatedKab[$namaKab][$label] += (int)$item->jiwa_baru;
                    }
                }
            }

            // Urutkan tahun dari terkecil ke terbesar
            if (!empty($aggregatedGlobal)) {
                ksort($aggregatedGlobal);
            }
            
            $labels = array_keys($aggregatedGlobal);
            $totals = array_values($aggregatedGlobal);

            // Susun data per kabupaten agar sinkron dengan sumbu X (labels)
            $trenKabupaten = [];
            foreach ($semuaKab as $kab) {
                $namaKab = $kab->nama_kabupaten;
                $trenKabupaten[$namaKab] = [];
                foreach ($labels as $lbl) {
                    $trenKabupaten[$namaKab][] = $aggregatedKab[$namaKab][$lbl] ?? 0;
                }
            }

            // 2 & 3. Sebaran Kabupaten & Komparasi KK vs Jiwa
            $kabupatenStats = Kabupaten::withSum('uptds as total_jiwa', 'jiwa_baru')
                                       ->withSum('uptds as total_kk', 'kk_baru')
                                       ->get();
            $kabLabels = $kabupatenStats->pluck('nama_kabupaten');
            $kabTotals = $kabupatenStats->pluck('total_jiwa');
            $kabKkTotals = $kabupatenStats->pluck('total_kk'); 

            // 4. Top 5 UPTD
            $topUptd = Uptd::orderBy('jiwa_baru', 'desc')->take(5)->get(['nama_upt', 'jiwa_baru']);
            $uptdLabels = $topUptd->pluck('nama_upt');
            $uptdTotals = $topUptd->pluck('jiwa_baru');

            // 5. Era Penyerahan UPTD (Polar Area) - KELOMPOK 10 TAHUN
            $eras = [];
            foreach($allTrendData as $u) {
                $thn = (int) trim($u->tahun_penyerahan);
                if($thn > 1900) {
                    $dekade = floor($thn / 10) * 10;
                    $label = 'Era ' . $dekade . 'an';
                    if(!isset($eras[$label])) $eras[$label] = 0;
                    $eras[$label]++;
                }
            }
            if (!empty($eras)) {
                ksort($eras);
            }
            $eraLabels = array_keys($eras);
            $eraTotals = array_values($eras);

            // Return Data
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
        
        $query = Uptd::with(['kabupaten', 'kecamatan'])->latest();

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

    public function galeri()
    {
        $profil = $this->getProfil();

        $galeris = Galeri::latest()->paginate(12);

        return view('frontend.galeri', compact('profil', 'galeris'));
    }
}