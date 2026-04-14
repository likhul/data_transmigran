<?php

namespace App\Exports;

use App\Models\Uptd;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UptdExport implements FromView, ShouldAutoSize
{
    protected $search;

    // Menangkap kata kunci dari Controller
    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function view(): View
    {
        // Logika pencarian yang SAMA PERSIS
        $uptds = Uptd::with(['kabupaten', 'kecamatan'])
            ->when($this->search, function($query) {
                $query->where('nama_upt', 'like', '%' . $this->search . '%')
                      ->orWhereHas('kecamatan', function($q) {
                          $q->where('nama_kecamatan', 'like', '%' . $this->search . '%');
                      })
                      ->orWhereHas('kabupaten', function($q) {
                          $q->where('nama_kabupaten', 'like', '%' . $this->search . '%');
                      });
            })
            ->orderBy('tahun_penyerahan', 'asc')
            ->get();

        return view('uptd.excel', compact('uptds'));
    }
}