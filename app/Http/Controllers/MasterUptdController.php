<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterUptd;
use App\Models\Kecamatan;

class MasterUptdController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $master_uptds = MasterUptd::with(['kecamatan.kabupaten'])
            ->when($search, function ($query) use ($search) {
                $query->where('nama_uptd', 'like', '%' . $search . '%')
                    // Mencari di tabel Kecamatan
                    ->orWhereHas('kecamatan', function ($q) use ($search) {
                        $q->where('nama_kecamatan', 'like', '%' . $search . '%')
                        // Mencari di tabel Kabupaten (melalui tabel Kecamatan)
                        ->orWhereHas('kabupaten', function ($q2) use ($search) {
                            $q2->where('nama_kabupaten', 'like', '%' . $search . '%');
                        });
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->appends(['search' => $search]); // Agar saat pindah halaman (pagination) pencarian tidak hilang

        $kecamatans = Kecamatan::with('kabupaten')->orderBy('nama_kecamatan', 'asc')->get();

        return view('master_uptd.index', compact('master_uptds', 'kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_uptd' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        MasterUptd::create($request->all());

        return redirect()->route('master-uptd.index')->with('success', 'Data Master UPTD berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_uptd' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        $uptd = MasterUptd::findOrFail($id);
        $uptd->update($request->all());

        return redirect()->route('master-uptd.index')->with('success', 'Data Master UPTD berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $uptd = MasterUptd::findOrFail($id);
        $uptd->delete();

        return redirect()->route('master-uptd.index')->with('success', 'Data Master UPTD berhasil dihapus!');
    }
}