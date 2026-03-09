<?php

namespace App\Http\Controllers;

use App\Models\Transmigran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Memanggil library PDF

class LaporanController extends Controller
{
    public function cetakPdf(Request $request)
    {
        // Kita ambil data transmigran (jika sedang difilter, laporan akan mengikuti filter tersebut)
        $transmigrans = Transmigran::with('kabupaten')
            ->when($request->search, function($query) use ($request) {
                $query->where('nama_kepala_keluarga', 'like', '%' . $request->search . '%');
            })
            ->when($request->kabupaten_id, function($query) use ($request) {
                $query->where('kabupaten_id', $request->kabupaten_id);
            })
            ->when($request->tahun, function($query) use ($request) {
                $query->where('tahun_penempatan', $request->tahun);
            })
            ->get();

        // Menyiapkan data untuk dikirim ke tampilan PDF
        $data = [
            'judul' => 'Laporan Data Transmigran Provinsi Jambi',
            'tanggal' => date('d/m/Y'),
            'transmigrans' => $transmigrans
        ];

        // Memuat file 'laporan_pdf.blade.php' dan mengisinya dengan data
        $pdf = Pdf::loadView('laporan_pdf', $data);

        // Mendownload file dengan nama tertentu
        return $pdf->download('laporan-transmigran-' . date('Ymd') . '.pdf');
    }
}