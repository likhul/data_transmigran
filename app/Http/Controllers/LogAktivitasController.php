<?php

namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function index()
    {
        \App\Models\LogAktivitas::where('created_at', '<', now()->subDays(30))->delete();
        $logs = \App\Models\LogAktivitas::with('user')->latest()->paginate(50);
        
        return view('admin.log_aktivitas', compact('logs'));
    }
}