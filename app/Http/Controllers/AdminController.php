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

        $admins = User::all();
        return view('admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:superadmin,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password otomatis
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Akun Admin baru berhasil ditambahkan!');
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