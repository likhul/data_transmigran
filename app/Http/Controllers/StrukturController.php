<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index() {
        $penguruses = Pengurus::orderBy('urutan', 'asc')->get();
        return view('profil_web.struktur_index', compact('penguruses'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('pengurus'), $fileName);

        Pengurus::create([
            'nama' => $request->nama,
            'gelar' => $request->gelar,
            'jabatan' => $request->jabatan,
            'urutan' => $request->urutan ?? 0,
            'foto' => $fileName
        ]);

        return redirect()->back()->with('success', 'Anggota struktur berhasil ditambahkan!');
    }

    public function destroy($id) {
        $p = Pengurus::findOrFail($id);
        if(file_exists(public_path('pengurus/' . $p->foto))) {
            unlink(public_path('pengurus/' . $p->foto));
        }
        $p->delete();
        return redirect()->back()->with('success', 'Anggota berhasil dihapus!');
    }
}