<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache; 

class GaleriController extends Controller
{
    // FUNGSI SIMPAN FOTO BARU
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120' // Max 5MB
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . "_" . $file->getClientOriginalName();
            
            // Simpan gambar ke folder public/galeri
            $file->move(public_path('galeri'), $nama_foto);

            Galeri::create([
                'judul' => $request->judul,
                'foto' => $nama_foto
            ]);

            // SANGAT PENTING: Hapus cache agar foto baru langsung muncul di Beranda!
            Cache::forget('galeri_terbaru');
        }

        return redirect()->back()->with('success', 'Foto berhasil diunggah!');
    }

    // FUNGSI HAPUS FOTO
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file fisik foto dari hardisk server agar tidak menumpuk
        if ($galeri->foto && File::exists(public_path('galeri/' . $galeri->foto))) {
            File::delete(public_path('galeri/' . $galeri->foto));
        }

        $galeri->delete();

        // SANGAT PENTING: Hapus cache agar foto yang dihapus hilang dari Beranda!
        Cache::forget('galeri_terbaru');

        return redirect()->back()->with('success', 'Foto galeri berhasil dihapus!');
    }
}