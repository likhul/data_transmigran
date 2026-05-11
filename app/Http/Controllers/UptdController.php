<?php

namespace App\Http\Controllers;

use App\Models\Uptd;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\MasterUptd;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Cache;

class UptdController extends Controller
{
    /**
     * Menampilkan daftar penyerahan UPTD dengan fitur pencarian
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $uptds = Uptd::with(['kabupaten', 'kecamatan'])
            ->when($search, function($query) use ($search) {
                $query->where('nama_upt', 'like', '%' . $search . '%')
                    ->orWhere('no_ba_penyerahan', 'like', '%' . $search . '%')
                    ->orWhereHas('kecamatan', function($q) use ($search) {
                        $q->where('nama_kecamatan', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('kabupaten', function($q) use ($search) {
                        $q->where('nama_kabupaten', 'like', '%' . $search . '%');
                    });
            })
            ->latest() // Diganti dari orderBy('tahun_penyerahan') menjadi latest() (created_at desc)
            ->paginate(10)
            ->appends(request()->query());

        return view('uptd.index', compact('uptds'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::orderBy('nama_kabupaten', 'asc')->get();
        return view('uptd.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_penyerahan' => 'required|string|max:20',
            'kabupaten_id'     => 'required|exists:kabupatens,id',
            'kecamatan_id'     => 'required|exists:kecamatans,id',
            'nama_upt'         => 'required',
            'waktu_penempatan' => 'required',
            'kk_awal'          => 'required|numeric',
            'jiwa_awal'        => 'required|numeric',
            'status_desa'      => 'required|in:SEM,DEF',
            'nama_desa_baru'   => 'required',
            'kk_baru'          => 'required|numeric',
            'jiwa_baru'        => 'required|numeric',
            'no_ba_penyerahan' => 'required',
            'file_sk_penyerahan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_sk_penempatan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_peta_lokasi'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();

        $dokumens = ['file_sk_penyerahan', 'file_sk_penempatan', 'file_peta_lokasi'];
        foreach ($dokumens as $dok) {
            if ($request->hasFile($dok)) {
                $file = $request->file($dok);
                // Buat nama file unik: timestamp_namafield.ekstensi
                $nama_file = time() . '_' . $dok . '.' . $file->getClientOriginalExtension();
                // Pindahkan ke folder public/arsip_uptd
                $file->move(public_path('arsip_uptd'), $nama_file);
                $data[$dok] = $nama_file;
            }
        }

        $uptd = Uptd::create($data);

        // Catat Log
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Tambah',
            'modul' => 'Data UPTD',
            'keterangan' => 'Menambahkan data penyerahan UPT: ' . $request->nama_upt
        ]);

        Cache::flush();

        return redirect()->route('uptd.index')->with('success', 'Data penyerahan berhasil disimpan!');
    }

    public function edit($id)
    {
        $uptd = Uptd::findOrFail($id);
        $kabupatens = Kabupaten::orderBy('nama_kabupaten', 'asc')->get();
        
        // Data pendukung dropdown agar saat edit posisi dropdown langsung terisi benar
        $kecamatans = Kecamatan::where('kabupaten_id', $uptd->kabupaten_id)->get();
        $master_uptds = MasterUptd::where('kecamatan_id', $uptd->kecamatan_id)->get();

        return view('uptd.edit', compact('uptd', 'kabupatens', 'kecamatans', 'master_uptds'));
    }

    public function update(Request $request, $id)
    {
        // 1. CARI DATANYA DULU (Ini yang tadi terlewat dan menyebabkan error)
        $uptd = Uptd::findOrFail($id);

        // 2. VALIDASI
        $request->validate([
            'tahun_penyerahan' => 'nullable|string|max:20',
            'kabupaten_id'     => 'required',
            'kecamatan_id'     => 'required',
            'nama_upt'         => 'required',
            'kk_awal'          => 'required|numeric',
            'jiwa_awal'        => 'required|numeric',
            'nama_desa_baru'   => 'required',
            'kk_baru'          => 'required|numeric',
            'jiwa_baru'        => 'required|numeric',
            'file_sk_penyerahan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_sk_penempatan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_peta_lokasi'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();
        $dokumens = ['file_sk_penyerahan', 'file_sk_penempatan', 'file_peta_lokasi'];

        // 3. PROSES FILE
        foreach ($dokumens as $dok) {
            if ($request->hasFile($dok)) {
                // Cek dan Hapus file lama jika memang ada di folder
                if ($uptd->$dok && file_exists(public_path('arsip_uptd/' . $uptd->$dok))) {
                    unlink(public_path('arsip_uptd/' . $uptd->$dok));
                }
                
                // Upload file baru
                $file = $request->file($dok);
                $nama_file = time() . '_' . $dok . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('arsip_uptd'), $nama_file);
                
                // Masukkan nama file baru ke dalam array data untuk disimpan
                $data[$dok] = $nama_file;
            }
        }

        // 4. SIMPAN PERUBAHAN
        $uptd->update($data);

        // 5. CATAT LOG
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Edit',
            'modul' => 'Data UPTD',
            'keterangan' => 'Memperbarui data penyerahan UPT: ' . $uptd->nama_upt
        ]);

        Cache::flush();

        return redirect()->route('uptd.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $uptd = Uptd::findOrFail($id);
        $nama_upt = $uptd->nama_upt;
        
        // Opsional: Hapus juga file fisiknya saat data dihapus
        $dokumens = ['file_sk_penyerahan', 'file_sk_penempatan', 'file_peta_lokasi'];
        foreach ($dokumens as $dok) {
            if ($uptd->$dok && file_exists(public_path('arsip_uptd/' . $uptd->$dok))) {
                unlink(public_path('arsip_uptd/' . $uptd->$dok));
            }
        }

        $uptd->delete();

        // Catat Log
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Hapus',
            'modul' => 'Data UPTD',
            'keterangan' => 'Menghapus data penyerahan UPT: ' . $nama_upt
        ]);

        Cache::flush();

        return redirect()->route('uptd.index')->with('success', 'Data UPTD berhasil dihapus!');
    }

    /**
     * Export ke PDF dengan filter pencarian yang sama
     */
    public function pdf(Request $request)
    {
        $search = $request->search;

        $uptds = Uptd::with(['kabupaten', 'kecamatan'])
            ->when($search, function($query) use ($search) {
                $query->where('nama_upt', 'like', '%' . $search . '%')
                    ->orWhereHas('kecamatan', function($q) use ($search) {
                        $q->where('nama_kecamatan', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('kabupaten', function($q) use ($search) {
                        $q->where('nama_kabupaten', 'like', '%' . $search . '%');
                    });
            })
            ->latest() // Disamakan dengan index agar export PDF merepresentasikan urutan data yang valid
            ->get();

        $pdf = PDF::loadView('uptd.pdf', compact('uptds'))->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan_Penyerahan_UPTD.pdf');
    }

    /**
     * Export ke Excel
     */
    public function excel(Request $request)
    {
        // Pastikan Anda juga menerapkan ->latest() pada class App\Exports\UptdExport jika query-nya terpisah
        return Excel::download(new \App\Exports\UptdExport($request->search), 'Laporan_Penyerahan_UPTD.xlsx');
    }

    /* |--------------------------------------------------------------------------
    | API ENDPOINTS (Untuk Dependent Dropdown / AJAX)
    |--------------------------------------------------------------------------
    */

    // Ambil Kecamatan berdasarkan Kabupaten
    public function getKecamatan($kabupaten_id)
    {
        $data = Kecamatan::where('kabupaten_id', $kabupaten_id)->orderBy('nama_kecamatan', 'asc')->get();
        return response()->json($data);
    }
    

    // Ambil Master UPTD berdasarkan Kecamatan
    public function getMasterUptd($kecamatan_id)
    {
        $data = MasterUptd::where('kecamatan_id', $kecamatan_id)->orderBy('nama_uptd', 'asc')->get(); 
        return response()->json($data);
    }
}