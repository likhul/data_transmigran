<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\ProfilWeb;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

// Import Library Intervention Image Versi 3
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BeritaController extends Controller
{
    // FUNGSI UNTUK MENYIMPAN BERITA BARU
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,webp|max:5120' // Max 5MB dari Admin
        ]);

        $nama_gambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_gambar = time() . "_" . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            
            $destinationPath = public_path('berita_images');
            
            // Buat folder jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // PROSES KOMPRESI GAMBAR VERSI 3 (RESIZE & OPTIMIZE)
            $manager = new ImageManager(new Driver());
            $img = $manager->read($file->getRealPath());
            
            // scaleDown mencegah gambar yang sudah kecil jadi pecah
            $img->scaleDown(width: 800);
            
            // Simpan gambar dengan kualitas 75%
            $img->save($destinationPath . '/' . $nama_gambar, quality: 75);
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'gambar' => $nama_gambar,
            'user_id' => auth()->id() // Mengambil ID admin yang sedang login
        ]);

        // HAPUS CACHE AGAR BERANDA LANGSUNG UPDATE!
        Cache::forget('berita_terbaru');
        // Hapus juga cache pagination halaman semua berita
        $this->clearBeritaPaginationCache();

        return redirect()->back()->with('success', 'Berita berhasil diterbitkan dan gambar otomatis dikompres!');
    }

    // FUNGSI UNTUK MENYIMPAN HASIL EDIT
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);

        $berita = Berita::findOrFail($id);

        // Jika admin mengupload gambar baru saat edit
        if ($request->hasFile('gambar')) {
            $destinationPath = public_path('berita_images');

            // Hapus gambar lama dari folder
            if ($berita->gambar && File::exists($destinationPath . '/' . $berita->gambar)) {
                File::delete($destinationPath . '/' . $berita->gambar);
            }

            // Proses gambar baru & kompres Versi 3
            $file = $request->file('gambar');
            $nama_gambar = time() . "_" . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            
            $manager = new ImageManager(new Driver());
            $img = $manager->read($file->getRealPath());
            $img->scaleDown(width: 800);
            $img->save($destinationPath . '/' . $nama_gambar, quality: 75);
            
            $berita->gambar = $nama_gambar;
        }

        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul);
        $berita->konten = $request->konten;
        $berita->save();

        // HAPUS CACHE AGAR BERANDA LANGSUNG UPDATE!
        Cache::forget('berita_terbaru');
        Cache::forget("berita_detail_{$berita->slug}");
        $this->clearBeritaPaginationCache();

        return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
    }

    // FUNGSI UNTUK MENGHAPUS BERITA
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus foto dari folder agar hardisk tidak penuh
        if ($berita->gambar && File::exists(public_path('berita_images/' . $berita->gambar))) {
            File::delete(public_path('berita_images/' . $berita->gambar));
        }
        
        Cache::forget("berita_detail_{$berita->slug}");
        $berita->delete();

        // HAPUS CACHE AGAR BERANDA LANGSUNG UPDATE!
        Cache::forget('berita_terbaru');
        $this->clearBeritaPaginationCache();

        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }

    // Fungsi untuk menampilkan halaman detail berita kepada publik
    public function show($slug)
    {
        // Fitur Caching Opsional: Ingat isi artikel selama 6 jam untuk hemat database
        $berita = Cache::remember("berita_detail_{$slug}", now()->addHours(6), function () use ($slug) {
            return Berita::where('slug', $slug)->firstOrFail();
        });
        
        return view('berita.show', compact('berita'));
    }

    // Fungsi untuk menampilkan halaman daftar semua berita (Publik)
    public function indexPublik() 
    {
        $profil = ProfilWeb::first();
        
        // Karena ada fitur paginasi bawaan, kita cache halamannya berdasar nomor "page=X" di URL
        $page = request()->get('page', 1);
        $beritas = Cache::remember("semua_berita_page_{$page}", now()->addHours(2), function () {
            return Berita::latest()->paginate(9);
        });

        return view('berita.index', compact('beritas', 'profil'));
    }

    // FUNGSI BANTUAN: Menghapus semua cache halaman pagination berita
    private function clearBeritaPaginationCache()
    {
        // Menghapus cache untuk beberapa halaman pertama untuk memastikan data terbaru tampil
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget("semua_berita_page_{$i}");
        }
    }
}