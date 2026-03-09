<?php

namespace App\Exports;

use App\Models\Transmigran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransmigranExport implements FromCollection, WithHeadings, WithMapping
{
    protected $request;

    // Menangkap request filter dari Controller
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Transmigran::with(['kabupaten', 'uptd']);

        // Logika Filter persis seperti di Cetak PDF
        if ($this->request->filled('search')) {
            $query->where('nama_kepala_keluarga', 'like', '%' . $this->request->search . '%');
        }
        if ($this->request->filled('kabupaten_id')) {
            $query->where('kabupaten_id', $this->request->kabupaten_id);
        }
        if ($this->request->filled('tahun')) {
            $query->where('tahun_penempatan', $this->request->tahun);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nama Kepala Keluarga', 'Jumlah Anggota (Jiwa)', 'Asal Daerah', 'Kabupaten', 'UPTD', 'Tahun', 'Status'];
    }

    public function map($transmigran): array
    {
        return [
            $transmigran->id,
            $transmigran->nama_kepala_keluarga,
            $transmigran->jumlah_anggota,
            $transmigran->asal_daerah,
            $transmigran->kabupaten->nama_kabupaten ?? '-',
            $transmigran->uptd->nama_uptd ?? '-',
            $transmigran->tahun_penempatan,
            $transmigran->status,
        ];
    }
}