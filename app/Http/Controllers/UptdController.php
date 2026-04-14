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
use Barryvdh\DomPDF\Facade\Pdf as PDF; // Pastikan package dompdf terinstall

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
            ->orderBy('tahun_penyerahan', 'desc') 
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
            'tahun_penyerahan' => 'required|digits:4',
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
        ]);

        $uptd = Uptd::create($request->all());

        // Catat Log
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Tambah',
            'modul' => 'Data UPTD',
            'keterangan' => 'Menambahkan data penyerahan UPT: ' . $request->nama_upt
        ]);

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
        $request->validate([
            'tahun_penyerahan' => 'required|digits:4',
            'kabupaten_id'     => 'required',
            'kecamatan_id'     => 'required',
            'nama_upt'         => 'required',
            'kk_awal'          => 'required|numeric',
            'jiwa_awal'        => 'required|numeric',
            'nama_desa_baru'   => 'required',
            'kk_baru'          => 'required|numeric',
            'jiwa_baru'        => 'required|numeric',
        ]);

        $uptd = Uptd::findOrFail($id);
        $uptd->update($request->all());

        // Catat Log
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Edit',
            'modul' => 'Data UPTD',
            'keterangan' => 'Memperbarui data penyerahan UPT: ' . $uptd->nama_upt
        ]);

        return redirect()->route('uptd.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $uptd = Uptd::findOrFail($id);
        $nama_upt = $uptd->nama_upt;
        $uptd->delete();

        // Catat Log
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Hapus',
            'modul' => 'Data UPTD',
            'keterangan' => 'Menghapus data penyerahan UPT: ' . $nama_upt
        ]);

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
            ->orderBy('tahun_penyerahan', 'asc')
            ->get();

        $pdf = PDF::loadView('uptd.pdf', compact('uptds'))->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan_Penyerahan_UPTD.pdf');
    }

    /**
     * Export ke Excel
     */
    public function excel(Request $request)
    {
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