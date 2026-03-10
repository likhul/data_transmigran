<?php

namespace App\Http\Controllers;

use App\Models\ProfilWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\LogAktivitas; // Memanggil CCTV kita

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

        return view('profil_web.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul_website' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'alamat_kantor' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:50',
            'foto_struktur' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        $profil = ProfilWeb::first();
        $data = $request->except('foto_struktur');

        if ($request->hasFile('foto_struktur')) {
            $file = $request->file('foto_struktur');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // PINDAHKAN LANGSUNG KE FOLDER PUBLIC/STRUKTUR (Anti Ribet)
            $file->move(public_path('struktur'), $fileName);
            
            $data['foto_struktur'] = $fileName;
        }

        $profil->update($data);

        // Rekam di CCTV
        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi' => 'Edit',
            'modul' => 'Profil Website',
            'keterangan' => 'Mengubah informasi & tampilan website publik'
        ]);

        return redirect()->back()->with('success', 'Profil Website berhasil diperbarui!');
    }
}