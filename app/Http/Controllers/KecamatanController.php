<?php
namespace App\Http\Controllers;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KecamatanController extends Controller {
    public function index(Request $request) {
        $kecamatans = Kecamatan::with('kabupaten')->when($request->search, function($q) use ($request) {
            $q->where('nama_kecamatan', 'like', '%'.$request->search.'%')
              ->orWhereHas('kabupaten', fn($k) => $k->where('nama_kabupaten', 'like', '%'.$request->search.'%'));
        })->latest()->paginate(10);
        $kabupatens = Kabupaten::all();
        return view('kecamatan.index', compact('kecamatans', 'kabupatens'));
    }
    public function store(Request $request) {
        Kecamatan::create($request->validate(['nama_kecamatan' => 'required', 'kabupaten_id' => 'required']));
        return back()->with('success', 'Kecamatan berhasil ditambah!');
    }
    public function update(Request $request, Kecamatan $kecamatan) {
        $kecamatan->update($request->validate(['nama_kecamatan' => 'required', 'kabupaten_id' => 'required']));
        return back()->with('success', 'Kecamatan berhasil diubah!');
    }
    public function destroy(Kecamatan $kecamatan) {
        if($kecamatan->uptds()->count() > 0) return back()->with('error', 'Gagal! Kecamatan ini masih memiliki data UPTD.');
        $kecamatan->delete();
        return back()->with('success', 'Kecamatan dihapus!');
    }
}