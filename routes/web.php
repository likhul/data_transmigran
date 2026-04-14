<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransmigranController;
use App\Http\Controllers\UptdController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilWebController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LogAktivitasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AREA PUBLIK (Bisa diakses semua orang tanpa login)
|--------------------------------------------------------------------------
*/
// Beranda Utama (Berita, Struktur, Galeri)
Route::get('/', [FrontController::class, 'index'])->name('home');

// Halaman Statistik & Demografi (Baru)
Route::get('/statistik', [FrontController::class, 'statistik'])->name('statistik');

// Halaman Kontak & Maps (Baru)
Route::get('/kontak', [FrontController::class, 'kontak'])->name('kontak');

// Halaman Warta/Berita
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.baca');
Route::get('/semua-berita', [BeritaController::class, 'indexPublik'])->name('berita.semua');

// Halaman Direktori UPTD Publik
Route::get('/direktori-uptd', [FrontController::class, 'direktori'])->name('direktori.index');
Route::get('/direktori-uptd/{id}', [FrontController::class, 'direktoriDetail'])->name('direktori.show');


/*
|--------------------------------------------------------------------------
| AREA TERPROTEKSI (Wajib Login / Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // 2. Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. Master Data (Wilayah & UPTD Dasar)
    Route::resource('kabupaten', App\Http\Controllers\KabupatenController::class);
    Route::resource('kecamatan', App\Http\Controllers\KecamatanController::class);
    Route::resource('master-uptd', App\Http\Controllers\MasterUptdController::class);

    // 4. Modul Penyerahan UPTD (Data Utama)
    Route::get('/uptd/pdf', [UptdController::class, 'pdf'])->name('uptd.pdf');
    Route::get('/uptd/excel', [UptdController::class, 'excel'])->name('uptd.excel');
    Route::resource('uptd', UptdController::class);

    // 5. Modul Transmigran (Individu)
    Route::get('/transmigran/export/excel', [TransmigranController::class, 'exportExcel'])->name('transmigran.export');
    Route::get('/transmigran/cetak/pdf', [TransmigranController::class, 'cetakPdf'])->name('transmigran.pdf');
    Route::post('/transmigran/import/excel', [TransmigranController::class, 'importExcel'])->name('transmigran.import');
    Route::resource('transmigran', TransmigranController::class);

    // --- RUTE AJAX DROPDOWN (SINKRON DENGAN CONTROLLER) ---
    // Gunakan rute ini di JavaScript kamu
    Route::get('/get-kecamatan/{kabupaten_id}', [UptdController::class, 'getKecamatan']);
    Route::get('/get-master-uptd/{kecamatan_id}', [UptdController::class, 'getMasterUptd']);

    // 6. Manajemen Admin & Log
    Route::get('/pengaturan-admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/pengaturan-admin', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/pengaturan-admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    
    // Log Aktivitas menggunakan LogAktivitasController (Duplikat sudah dibersihkan)
    Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('admin.log');

    // 7. Konten Website
    Route::get('/pengaturan-website', [ProfilWebController::class, 'edit'])->name('profil.edit');
    Route::put('/pengaturan-website', [ProfilWebController::class, 'update'])->name('profil.update');
    Route::resource('berita', BeritaController::class);
    
    Route::get('/manajemen-struktur', [StrukturController::class, 'index'])->name('struktur.index');
    Route::post('/manajemen-struktur', [StrukturController::class, 'store'])->name('struktur.store');
    Route::delete('/manajemen-struktur/{id}', [StrukturController::class, 'destroy'])->name('struktur.destroy');

    // Ubah /galeri menjadi /galeri-simpan agar tidak bentrok dengan folder public/galeri
    Route::post('/galeri-simpan', [GaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri-hapus/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
});

require __DIR__.'/auth.php';