<?php

namespace App\Http\Controllers;

use App\Models\Uptd;
use App\Models\Kabupaten;
use App\Exports\UptdExport;
use App\Models\LogAktivitas; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 


class UptdController extends Controller
{
    public function index()
    {
        $uptds = Uptd::with('kabupaten')->orderBy('tahun', 'desc')->get();
        return view('uptd.index', compact('uptds'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::all();
        return view('uptd.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'nama_uptd' => 'required|string|max:255',
            'tahun' => 'required|integer|digits:4',
            'total_kk' => 'required|integer|min:0',
            'total_jiwa' => 'required|integer|min:0',
        ]);

        Uptd::create($request->all());

        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Tambah',
            'modul' => 'Data UPTD',
            'keterangan' => 'Menambahkan UPTD baru: ' . $request->nama_uptd
        ]);

        return redirect()->route('uptd.index')->with('success', 'Data UPTD berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Uptd::findOrFail($id)->delete();

        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Hapus',
            'modul' => 'Data UPTD',
            'keterangan' => 'Menghapus UPTD: ' . $uptd->nama_uptd
        ]);

        return redirect()->route('uptd.index')->with('success', 'Data UPTD berhasil dihapus!');
    }

    public function getUptdByKabupaten($kabupaten_id)
    {
        // Mencari semua UPTD yang memiliki kabupaten_id tersebut
        $uptds = \App\Models\MasterUptd::where('kabupaten_id', $kabupaten_id)->get();
        
        return response()->json($uptds);
        
    }

    // Tambahkan ini di dalam class UptdController

    public function edit($id)
    {
        // Cari data rekap UPTD berdasarkan ID
        $uptd = \App\Models\Uptd::findOrFail($id); 
        
        // Ambil data kabupaten untuk dropdown
        $kabupatens = \App\Models\Kabupaten::all(); 
        
        return view('uptd.edit', compact('uptd', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kabupaten_id' => 'required',
            'nama_uptd'    => 'required',
            'tahun'        => 'required|numeric',
            'total_kk'     => 'required|numeric',
            'total_jiwa'   => 'required|numeric',
        ]);

        $uptd = \App\Models\Uptd::findOrFail($id);
        $uptd->update($request->all()); // Simpan perubahan

        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aksi' => 'Edit',
            'modul' => 'Data UPTD',
            'keterangan' => 'Mengubah data UPTD ID: ' . $uptd->id
        ]);
        return redirect()->route('uptd.index')->with('success', 'Laporan agregat berhasil diperbarui!');
    }

    public function cetakPdf(Request $request)
    {
        $uptds = \App\Models\Uptd::with('kabupaten')->latest()->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('uptd.pdf', compact('uptds'));
        return $pdf->stream('Laporan_UPTD_' . date('Ymd') . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new UptdExport($request), 'Data_UPTD.xlsx');
    }
}