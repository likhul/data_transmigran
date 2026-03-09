<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransmigranExport;
use App\Imports\TransmigranImport;
use Illuminate\Http\Request;
use App\Models\Transmigran;
use App\Models\Kabupaten;
use Barryvdh\DomPDF\Facade\Pdf; // Taruh di baris paling atas

class TransmigranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil data untuk pilihan filter kabupaten
        $kabupatens = Kabupaten::all();

        // Mulai query transmigran dengan relasi kabupaten
        $transmigrans = Transmigran::with('kabupaten')
            // Filter berdasarkan Nama Kepala Keluarga
            ->when($request->search, function($query) use ($request) {
                $query->where('nama_kepala_keluarga', 'like', '%' . $request->search . '%');
            })
            // Filter berdasarkan Kabupaten
            ->when($request->kabupaten_id, function($query) use ($request) {
                $query->where('kabupaten_id', $request->kabupaten_id);
            })
            // Filter berdasarkan Tahun Penempatan
            ->when($request->tahun, function($query) use ($request) {
                $query->where('tahun_penempatan', $request->tahun);
            })
            ->latest()
            ->get();

        return view('transmigran.index', compact('transmigrans', 'kabupatens'));
    }

    // 1. Menampilkan halaman formulir tambah data
    public function create()
    {
        // Ambil semua data kabupaten untuk pilihan di formulir (Dropdown)
        $kabupatens = Kabupaten::all(); 
        return view('transmigran.create', compact('kabupatens'));
    }

    // 2. Memproses data yang dikirim dari formulir dan menyimpannya ke database
    public function store(Request $request)
    {
        // Validasi: pastikan data yang diisi tidak kosong dan sesuai format
        $request->validate([
            'nama_kepala_keluarga' => 'required|string|max:255',
            'jumlah_anggota' => 'required|integer|min:1',
            'asal_daerah' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'tahun_penempatan' => 'required|digits:4|integer',
            'status' => 'required|string',
        ]);

        // Simpan data ke tabel transmigrans
        Transmigran::create([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'jumlah_anggota' => $request->jumlah_anggota,
            'asal_daerah' => $request->asal_daerah,
            'kabupaten_id' => $request->kabupaten_id,
            'tahun_penempatan' => $request->tahun_penempatan,
            'status' => $request->status,
        ]);

        // Kembalikan ke halaman daftar transmigran dengan pesan sukses
        return redirect()->route('transmigran.index')->with('success', 'Data Transmigran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // 3. Menampilkan halaman form edit data
    public function edit($id)
    {
        $transmigran = Transmigran::findOrFail($id);
        $kabupatens = Kabupaten::all();
        return view('transmigran.edit', compact('transmigran', 'kabupatens'));
    }

    // 4. Memproses perubahan data ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kepala_keluarga' => 'required|string|max:255',
            'jumlah_anggota' => 'required|integer|min:1',
            'asal_daerah' => 'required|string|max:255',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'tahun_penempatan' => 'required|digits:4|integer',
            'status' => 'required|string',
        ]);

        $transmigran = Transmigran::findOrFail($id);
        
        // Update data
        $transmigran->update([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'jumlah_anggota' => $request->jumlah_anggota,
            'asal_daerah' => $request->asal_daerah,
            'kabupaten_id' => $request->kabupaten_id,
            'tahun_penempatan' => $request->tahun_penempatan,
            'status' => $request->status,
        ]);

        return redirect()->route('transmigran.index')->with('success', 'Data Transmigran berhasil diperbarui!');
    }

    // 5. Menghapus data (Soft Delete)
    public function destroy($id)
    {
        $transmigran = Transmigran::findOrFail($id);
        $transmigran->delete(); // Karena pakai SoftDeletes, data tidak hilang permanen

        return redirect()->route('transmigran.index')->with('success', 'Data Transmigran berhasil dihapus!');
    }


    public function cetakPdf(Request $request)
    {
        // Mengambil data dengan relasi agar tidak error saat cetak
        $query = \App\Models\Transmigran::with(['kabupaten', 'uptd']);

        // Logika Filter sesuai Form Index Anda
        if ($request->filled('search')) {
            $query->where('nama_kepala_keluarga', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('kabupaten_id')) {
            $query->where('kabupaten_id', $request->kabupaten_id);
        }
        
        if ($request->filled('tahun')) {
            $query->where('tahun_penempatan', $request->tahun);
        }

        $transmigrans = $query->get();

        // Memanggil view khusus PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('transmigran.pdf', compact('transmigrans'));
        
        return $pdf->stream('Laporan_Transmigran_Jambi_' . date('Ymd') . '.pdf');
    }

    // FUNGSI EXPORT (DOWNLOAD) YANG SUDAH DIPERBAIKI
    public function exportExcel(Request $request)
    {
        // Menangkap request filter agar data Excel yang didownload sesuai dengan pencarian
        return Excel::download(new TransmigranExport($request), 'Data_Transmigran_Jambi.xlsx');
    }

    // FUNGSI IMPORT (UPLOAD) YANG SUDAH DIPERBAIKI
    public function importExcel(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new TransmigranImport, $request->file('file_excel'));

        // Setelah selesai import, kembalikan user ke halaman dengan pesan sukses
        return redirect()->back()->with('success', '✨ Ratusan data berhasil di-import dari Excel!');
    }
}