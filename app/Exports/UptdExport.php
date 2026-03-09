<?php

namespace App\Exports;

use App\Models\Uptd;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UptdExport implements FromCollection, WithHeadings, WithMapping
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return Uptd::with('kabupaten')->latest()->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nama UPTD', 'Kabupaten', 'Tahun', 'Kapasitas (KK)', 'Keterangan'];
    }

    public function map($uptd): array
    {
        return [
            $uptd->id,
            $uptd->nama_uptd,
            $uptd->kabupaten->nama_kabupaten ?? '-',
            $uptd->tahun,
            $uptd->kapasitas_kk ?? '-',
            $uptd->keterangan,
        ];
    }
}