<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransmigranController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\UptdController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Awal (Langsung arahkan ke halaman Login bawaan Breeze)
Route::get('/', function () {
    return redirect('/login');
});

// 2. Halaman Dashboard (Hanya setelah login)
Route::get('/dashboard', function () {
    $totalTransmigran = \App\Models\Transmigran::count();
    $totalMutasi = \App\Models\Mutasi::count();
    $totalUptd = \App\Models\Uptd::count();

    return view('dashboard', compact('totalTransmigran', 'totalMutasi', 'totalUptd'));
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Kelompok Rute Terproteksi (Wajib Login)
Route::middleware('auth')->group(function () {
    
    // Rute Profil User (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- FITUR SI TRANSMIGRAN ---

    // Rute Transmigran (Excel, PDF, Import + CRUD)
    Route::get('/transmigran/export/excel', [TransmigranController::class, 'exportExcel'])->name('transmigran.export');
    Route::get('/transmigran/cetak/pdf', [TransmigranController::class, 'cetakPdf'])->name('transmigran.pdf');
    Route::post('/transmigran/import/excel', [TransmigranController::class, 'importExcel'])->name('transmigran.import');
    Route::resource('transmigran', TransmigranController::class);

    // Rute Mutasi (Excel, PDF + CRUD)
    Route::get('/mutasi/cetak/pdf', [MutasiController::class, 'cetakPdf'])->name('mutasi.pdf');
    Route::get('/mutasi/export/excel', [MutasiController::class, 'exportExcel'])->name('mutasi.export');
    Route::resource('mutasi', MutasiController::class);

    // Rute UPTD (Excel, PDF + CRUD)
    Route::get('/uptd/cetak/pdf', [UptdController::class, 'cetakPdf'])->name('uptd.pdf');
    Route::get('/uptd/export/excel', [UptdController::class, 'exportExcel'])->name('uptd.export');
    Route::get('/get-uptd/{kabupaten_id}', [UptdController::class, 'getUptdByKabupaten']);
    Route::resource('uptd', UptdController::class);

    // --- Rute Manajemen Admin (Super Admin Only) ---
    Route::get('/pengaturan-admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::post('/pengaturan-admin', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::delete('/pengaturan-admin/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
    
    Route::get('/log-aktivitas', [App\Http\Controllers\AdminController::class, 'log'])->name('admin.log');
});

require __DIR__.'/auth.php';