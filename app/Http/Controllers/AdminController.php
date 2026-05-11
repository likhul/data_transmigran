<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        // PENGAMAN: Cek apakah yang akses ini Super Admin atau bukan
        if (auth()->user()->role !== 'superadmin') {
            return redirect('/dashboard')->with('error', 'Akses Ditolak! Hanya Super Admin yang boleh masuk ke halaman ini.');
        }

        $admins = \App\Models\User::all();
        return view('admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        // PROSES VALIDASI KERAS
        $request->validate([
            'name' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email', // Cek apakah email sudah ada di tabel users
            'password' => 'required|string|min:8', // Minimal 8 karakter
            'role'     => 'required'
        ], [
            // Pesan Error Custom (Bahasa Indonesia)
            'email.unique' => 'Email ini sudah terdaftar, gunakan email lain.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        // Jika lolos validasi, baru simpan
        \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => \Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // PENGAMAN: Jangan biarkan Super Admin menghapus dirinya sendiri (bisa bunuh diri sistem 🤣)
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Akun Admin berhasil dihapus!');
    }

    public function log()
    {
        // Hanya Super Admin yang boleh lihat ruang CCTV
        if (auth()->user()->role !== 'superadmin') {
            return redirect('/dashboard')->with('error', 'Akses Ditolak!');
        }

        // Ambil data log dari yang paling terbaru
        $logs = \App\Models\LogAktivitas::with('user')->latest()->get();
        return view('admin.log', compact('logs'));
    }
}