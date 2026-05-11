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
        // 1. Tambahkan validasi ketat, termasuk 'unique' untuk urutan
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'urutan' => 'required|numeric|unique:penguruses,urutan', // <-- KUNCI ANTI-DUPLIKAT
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            // 2. Pesan Error Custom (Ramah Pengguna)
            'urutan.unique' => 'Angka urutan ini sudah digunakan. Silakan masukkan angka urutan yang berbeda.',
            'urutan.required' => 'Urutan tampil wajib diisi.',
            'urutan.numeric' => 'Urutan tampil harus berupa angka.',
            'nama.required' => 'Nama lengkap wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'foto.required' => 'Foto profil wajib diupload.',
            'foto.image' => 'File harus berupa gambar (JPG, JPEG, PNG).',
            'foto.max' => 'Ukuran foto maksimal adalah 2MB.'
        ]);

        // 3. Proses Upload File
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('pengurus'), $fileName);

        // 4. Simpan ke Database
        Pengurus::create([
            'nama' => $request->nama,
            'gelar' => $request->gelar,
            'jabatan' => $request->jabatan,
            'urutan' => $request->urutan, // Tidak perlu "?? 0" lagi karena sudah di-required di atas
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'urutan' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $pengurus = Pengurus::findOrFail($id); // Sesuaikan dengan nama Model Komandan
        
        $pengurus->nama = $request->nama;
        $pengurus->gelar = $request->gelar;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->urutan = $request->urutan;

        if($request->hasFile('foto')){
            // Hapus foto lama
            if(file_exists(public_path('pengurus/'.$pengurus->foto))) {
                unlink(public_path('pengurus/'.$pengurus->foto));
            }
            // Upload foto baru
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('pengurus'), $nama_file);
            $pengurus->foto = $nama_file;
        }

        $pengurus->save();
        return redirect()->back()->with('success', 'Data pengurus berhasil diperbarui!');
    }
}