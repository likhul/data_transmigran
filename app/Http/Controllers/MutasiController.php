<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Transmigran;
use App\Exports\MutasiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class MutasiController extends Controller
{
    // Menampilkan halaman tabel daftar mutasi
    public function index()
    {
        // Mengambil data mutasi dan disambungkan dengan nama transmigrannya
        $mutasis = Mutasi::with('transmigran')->orderBy('tanggal_mutasi', 'desc')->get();
        return view('mutasi.index', compact('mutasis'));
    }

    // 1. Menampilkan formulir tambah mutasi
    public function create()
    {
        // Ambil semua data transmigran untuk ditampilkan di pilihan dropdown
        $transmigrans = Transmigran::all();
        return view('mutasi.create', compact('transmigrans'));
    }

    // 2. Memproses dan menyimpan data mutasi ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'transmigran_id' => 'required|exists:transmigrans,id',
            'jenis_mutasi' => 'required|in:Masuk,Keluar',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string', // nullable berarti boleh dikosongkan
        ]);

        // Simpan ke database
        Mutasi::create([
            'transmigran_id' => $request->transmigran_id,
            'jenis_mutasi' => $request->jenis_mutasi,
            'tanggal_mutasi' => $request->tanggal_mutasi,
            'keterangan' => $request->keterangan,
        ]);

        

        return redirect()->route('mutasi.index')->with('success', 'Riwayat mutasi berhasil dicatat!');
    }

    public function destroy($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();

        return redirect()->route('mutasi.index')->with('success', 'Riwayat mutasi berhasil dihapus!');
    }

    // Tambahkan ini di dalam class MutasiController

    public function edit($id)
    {
        // Mengambil data mutasi beserta data transmigran terkait
        $mutasi = \App\Models\Mutasi::findOrFail($id);
        
        // Mengambil semua transmigran untuk pilihan dropdown
        $transmigrans = \App\Models\Transmigran::all();
        
        return view('mutasi.edit', compact('mutasi', 'transmigrans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transmigran_id' => 'required',
            'jenis_mutasi'   => 'required',
            'tanggal_mutasi' => 'required|date',
            'keterangan'     => 'nullable|string',
        ]);

        $mutasi = \App\Models\Mutasi::findOrFail($id);
        
        // Sesuaikan nama kolom database Anda (apakah 'tanggal' atau 'tanggal_mutasi')
        $mutasi->update([
            'transmigran_id' => $request->transmigran_id,
            'jenis_mutasi'   => $request->jenis_mutasi,
            'tanggal'        => $request->tanggal_mutasi, // Sesuaikan dengan kolom DB Anda
            'keterangan'     => $request->keterangan,
        ]);

        return redirect()->route('mutasi.index')->with('success', 'Riwayat mutasi berhasil diperbarui! ✨');
    }

    public function cetakPdf(Request $request)
    {
        $mutasis = \App\Models\Mutasi::with('transmigran')->latest()->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('mutasi.pdf', compact('mutasis'));
        return $pdf->stream('Laporan_Mutasi_' . date('Ymd') . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new MutasiExport($request), 'Data_Mutasi.xlsx');
    }

    // Fungsi create, store, edit, dll biarkan kosong dulu
}