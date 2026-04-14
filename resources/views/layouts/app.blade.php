<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SI Transmigran Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @stack('css')
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        /* Sidebar Styling */
        .sidebar { min-height: 100vh; background-color: #0f172a; padding-top: 30px; box-shadow: 4px 0 10px rgba(0,0,0,0.05); }
        .sidebar-brand { font-size: 1.25rem; font-weight: 800; color: #f8fafc; text-align: center; margin-bottom: 30px; letter-spacing: 0.5px; }
        .sidebar-brand span { color: #3b82f6; }
        
        /* Menu Label/Header */
        .menu-label { font-size: 0.65rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1px; padding: 10px 20px 5px 20px; margin-top: 15px; }
        
        /* Menu Link */
        .sidebar a { color: #94a3b8; text-decoration: none; padding: 12px 20px; display: flex; align-items: center; font-weight: 500; font-size: 0.95rem; transition: 0.2s ease-in-out; border-left: 4px solid transparent; }
        .sidebar a i { font-size: 1.1rem; margin-right: 12px; width: 20px; text-align: center; }
        .sidebar a:hover { background-color: rgba(255,255,255,0.05); color: #f8fafc; }
        .sidebar a.active { background-color: rgba(59, 130, 246, 0.1); color: #60a5fa; border-left: 4px solid #3b82f6; font-weight: 600; }
        
        /* Content & Navbar */
        .main-content { padding: 30px; }
        .navbar-custom { background-color: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border-bottom: 1px solid #f1f5f9; padding: 15px 30px !important; }
        
        /* Scrollbar Halus */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

    </style>

    <style>
        /* Mengubah Toast SweetAlert menjadi lebih modern dan melengkung */
        .colored-toast.swal2-icon-success { background-color: #f0fdf4 !important; color: #166534 !important; }
        .colored-toast.swal2-icon-error { background-color: #fef2f2 !important; color: #991b1b !important; }
        .colored-toast { border-radius: 12px !important; box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important; }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-md-2 sidebar d-none d-md-block position-fixed h-100 overflow-auto">
            <div class="sidebar-brand">
                <i class="bi bi-compass"></i> SI <span>Transmigran</span>
            </div>

            <div class="menu-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            
            <a href="{{ url('/transmigran') }}" class="{{ request()->is('transmigran*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Data Penduduk
            </a>
            
            <a href="{{ url('/uptd') }}" class="{{ request()->is('uptd*') ? 'active' : '' }}">
                <i class="bi bi-buildings-fill"></i> Penyerahan UPTD
            </a>

            <div class="menu-label mt-4">Data Master</div>
            <a href="{{ route('master-uptd.index') }}" class="{{ request()->routeIs('master-uptd.*') ? 'active' : '' }}">
                <i class="bi bi-database-fill-gear"></i> Master UPTD/Desa
            </a>

            <a href="{{ route('kabupaten.index') }}" class="{{ request()->is('kabupaten*') ? 'active' : '' }}">
                <i class="bi bi-map-fill"></i> Master Kabupaten
            </a>
            
            <a href="{{ route('kecamatan.index') }}" class="{{ request()->is('kecamatan*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt-fill"></i> Master Kecamatan
            </a>

            @if(auth()->check() && auth()->user()->role === 'superadmin')
                <div class="menu-label mt-4">Pengaturan Sistem</div>
                <a href="{{ url('/pengaturan-admin') }}" class="{{ request()->is('pengaturan-admin*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill"></i> Kelola Admin
                </a>
                <a href="{{ route('admin.log') }}" class="{{ request()->routeIs('admin.log') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i> Log Aktivitas
                </a>
                <a href="{{ route('profil.edit') }}" class="{{ request()->routeIs('profil.edit') ? 'active' : '' }}">
                    <i class="bi bi-globe"></i> Setup Website
                </a>
            @endif
            
            <div style="height: 50px;"></div> </div>

        <div class="col-md-10 offset-md-2 p-0 bg-light min-vh-100">
            <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
                <div class="container-fluid px-0">
                    <span class="navbar-brand mb-0 h1 fw-bold text-dark d-none d-lg-block" style="font-size: 1.1rem;">
                        Dinas Tenaga Kerja dan Transmigrasi Provinsi Jambi
                    </span>
                    
                    <div class="d-flex align-items-center ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-light fw-bold border-0 d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 12px; background: #f1f5f9;">
                                <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; border-radius: 8px;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="text-start d-none d-md-block">
                                    <div style="font-size: 0.85rem; color: #1e293b;">{{ Auth::user()->name ?? 'Administrator' }}</div>
                                    <div style="font-size: 0.7rem; color: #64748b; line-height: 1;">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</div>
                                </div>
                                <i class="bi bi-chevron-down ms-2 text-muted" style="font-size: 0.8rem;"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="border-radius: 12px; margin-top: 10px;">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger fw-bold py-2">
                                            <i class="bi bi-box-arrow-right me-2"></i> Keluar Sistem
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="main-content">
                @yield('content')
            </div>
            
            <footer class="text-center py-4 mt-auto" style="border-top: 1px solid #e2e8f0; color: #94a3b8; font-size: 0.85rem;">
                &copy; {{ date('Y') }} Sistem Informasi Transmigran - Provinsi Jambi.
            </footer>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Konfigurasi bawaan Toast
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end', // Muncul di pojok kanan atas
            showConfirmButton: false,
            timer: 3000, // Hilang otomatis dalam 3 detik
            timerProgressBar: true,
            customClass: {
                popup: 'colored-toast'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // Menangkap Session Success dari Controller
        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            });
        @endif

        // Menangkap Session Error dari Controller
        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            });
        @endif
    </script>
    
    @stack('scripts')
</body>
</html>
