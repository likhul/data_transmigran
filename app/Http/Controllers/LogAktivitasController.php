<?php

namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function index()
    {
        \App\Models\LogAktivitas::where('created_at', '<', now()->subDays(30))->delete();
        // Ambil semua log dari yang terbaru, bawa serta data usernya
        $logs = \App\Models\LogAktivitas::with('user')->latest()->paginate(50);
        
        // Sesuaikan nama folder view Anda (misal: log.index atau admin.log)
        return view('admin.log_aktivitas', compact('logs'));
    }
}