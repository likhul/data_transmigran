<?php
namespace App\Http\Controllers;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller {
    public function index(Request $request) {
        $kabupatens = Kabupaten::when($request->search, function($q) use ($request) {
            $q->where('nama_kabupaten', 'like', '%'.$request->search.'%');
        })->latest()->paginate(10);
        return view('kabupaten.index', compact('kabupatens'));
    }
    public function store(Request $request) {
        Kabupaten::create($request->validate(['nama_kabupaten' => 'required|unique:kabupatens']));
        return back()->with('success', 'Kabupaten berhasil ditambah!');
    }
    public function update(Request $request, Kabupaten $kabupaten) {
        $kabupaten->update($request->validate(['nama_kabupaten' => 'required']));
        return back()->with('success', 'Kabupaten berhasil diubah!');
    }
    public function destroy(Kabupaten $kabupaten) {
        if($kabupaten->kecamatans()->count() > 0) return back()->with('error', 'Gagal! Kabupaten ini masih memiliki data Kecamatan.');
        $kabupaten->delete();
        return back()->with('success', 'Kabupaten dihapus!');
    }
}