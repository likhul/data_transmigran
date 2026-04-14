<?php

namespace App\Http\Controllers;

use App\Models\ProfilWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\LogAktivitas; 
use App\Models\Berita; 
use App\Models\Galeri; // 👈 1. Tambahkan import model Galeri di sini


class ProfilWebController extends Controller
{
    public function edit()
    {
        // Hanya Super Admin yang boleh mengubah tampilan depan website
        if (auth()->user()->role !== 'superadmin') {
            return redirect('/dashboard')->with('error', 'Akses Ditolak! Hanya Super Admin yang bisa mengatur profil website.');
        }

        // Ambil data profil pertama. Kalau database masih kosong, buatkan data awal otomatis!
        $profil = ProfilWeb::firstOrCreate(['id' => 1], [
            'judul_website' => 'Sistem Informasi Transmigran Jambi',
            'deskripsi_singkat' => 'Selamat datang di portal resmi informasi transmigrasi daerah Jambi.',
        ]);

        // Ambil data berita terbaru
        $beritas = Berita::latest()->get();

        // 👈 2. Tambahkan pemanggilan data galeri di sini agar variabel $galeris tersedia di view
        $galeris = Galeri::latest()->get();

        // 👈 3. Masukkan 'galeris' ke dalam compact
        return view('profil_web.edit', compact('profil', 'beritas', 'galeris'));
    }

    public function update(Request $request)
    {
        // Ambil data profil pertama (atau buat baru jika database masih kosong)
        $profil = ProfilWeb::first() ?? new ProfilWeb();

        // Simpan data teks
        $profil->judul_website = $request->judul_website;
        $profil->deskripsi_singkat = $request->deskripsi_singkat;
        $profil->alamat_kantor = $request->alamat_kantor;
        $profil->nomor_telepon = $request->nomor_telepon;
        $profil->link_facebook = $request->link_facebook;
        $profil->link_instagram = $request->link_instagram;
        $profil->link_youtube = $request->link_youtube;
        $profil->google_maps = $request->google_maps;

        // Proses Upload Logo Instansi
        if ($request->hasFile('logo_website')) {
            if ($profil->logo_website && file_exists(public_path('logo/' . $profil->logo_website))) {
                unlink(public_path('logo/' . $profil->logo_website));
            }
            $file = $request->file('logo_website');
            $nama_file = time() . "_logo." . $file->getClientOriginalExtension();
            $file->move(public_path('logo'), $nama_file);
            $profil->logo_website = $nama_file;
        }

        // Proses Upload Favicon (Ikon Tab Browser)
        if ($request->hasFile('favicon_website')) {
            if ($profil->favicon_website && file_exists(public_path('logo/' . $profil->favicon_website))) {
                unlink(public_path('logo/' . $profil->favicon_website));
            }
            $file = $request->file('favicon_website');
            $nama_file = time() . "_favicon." . $file->getClientOriginalExtension();
            $file->move(public_path('logo'), $nama_file);
            $profil->favicon_website = $nama_file;
        }

        $profil->save();

        return redirect()->back()->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}