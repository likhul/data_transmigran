<?php

namespace App\Exports;

use App\Models\Mutasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MutasiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return Mutasi::with('transmigran')->latest()->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nama Transmigran', 'Tanggal Mutasi', 'Jenis Mutasi', 'Keterangan'];
    }

    public function map($mutasi): array
    {
        return [
            $mutasi->id,
            $mutasi->transmigran->nama_kepala_keluarga ?? '-',
            $mutasi->tanggal_mutasi,
            $mutasi->jenis_mutasi,
            $mutasi->keterangan,
        ];
    }
}