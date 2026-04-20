<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SI Transmigran Jambi')</title>
    
    {{-- Fonts & Libraries --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @stack('css')
    
    <style>
        /* VARIABEL WARNA MATERIAL DESIGN 3 & NEUMORPHISM */
        :root {
            --md-surface: #ffffff;
            --md-background: #f8fafc;
            --md-primary: #2563eb;
            --navy-deep: #0f172a; /* Warna Navy Asli */
            --soft-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
            --hover-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
        }

        body { 
            background-color: var(--md-background); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            font-size: 14px; 
            color: var(--navy-deep);
        }
        
        /* --- SIDEBAR FIX (ANTI-PUTIH) --- */
        .sidebar { 
            min-height: 100vh; 
            background-color: var(--navy-deep) !important; /* Paksa tetap Navy */
            padding: 20px 15px 30px; 
            box-shadow: 4px 0 15px rgba(0,0,0,0.1); 
            z-index: 1050;
            border-right: 1px solid rgba(255,255,255,0.05);
        }
        
        /* Mengatasi background offcanvas di Mobile */
        .offcanvas-md.offcanvas-start {
            background-color: var(--navy-deep) !important;
        }

        .sidebar-brand { 
            font-size: clamp(1.1rem, 2vw, 1.25rem); 
            font-weight: 800; color: #ffffff; 
            text-align: center; margin-bottom: 30px; 
            letter-spacing: -0.5px; 
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 20px;
        }
        .sidebar-brand span { color: #60a5fa; }
        
        /* Label Menu (Menu Utama, Data Master) */
        .menu-label { 
            font-size: 0.65rem; font-weight: 800; 
            color: #475569; text-transform: uppercase; 
            letter-spacing: 1px; padding: 10px 15px 5px; 
            margin-top: 15px; 
        }
        
        /* Link Menu Kapsul */
        .sidebar a.nav-link-custom { 
            color: #94a3b8 !important; /* Warna teks abu-abu terang */
            text-decoration: none; 
            padding: 12px 16px; margin-bottom: 4px;
            display: flex; align-items: center; 
            font-weight: 600; font-size: 0.85rem; 
            border-radius: 12px; 
            transition: all 0.3s ease;
        }
        .sidebar a.nav-link-custom i { font-size: 1.1rem; margin-right: 12px; width: 24px; text-align: center; opacity: 0.7; }
        
        /* Hover State */
        .sidebar a.nav-link-custom:hover { 
            background-color: rgba(255,255,255,0.08); 
            color: #ffffff !important; 
            transform: translateX(4px); 
        }
        .sidebar a.nav-link-custom:hover i { opacity: 1; color: #60a5fa; }

        /* Active State */
        .sidebar a.nav-link-custom.active { 
            background-color: var(--md-primary) !important; 
            color: #ffffff !important; 
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4); 
        }
        .sidebar a.nav-link-custom.active i { opacity: 1; color: #ffffff; }
        
        /* --- MAIN CONTENT & NAVBAR --- */
        .main-content { padding: clamp(15px, 3vw, 30px); }
        
        .navbar-custom { 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            box-shadow: var(--soft-shadow); 
            border-bottom: 1px solid rgba(226,232,240,0.6); 
            padding: 12px clamp(15px, 3vw, 30px) !important; 
        }
        
        .btn-profile {
            border-radius: 50px !important; background: #f1f5f9 !important;
            padding: 6px 16px 6px 6px !important; transition: 0.3s;
            border: 1px solid #e2e8f0 !important;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        
        <div class="col-md-2 sidebar offcanvas-md offcanvas-start position-fixed h-100 overflow-auto" tabindex="-1" id="sidebarMenu">
            
            <div class="d-md-none d-flex justify-content-between align-items-center mb-4">
                <div class="sidebar-brand mb-0 text-start ps-2 border-0">
                    <i class="bi bi-compass-fill"></i> SI <span>Trans</span>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"></button>
            </div>

            <div class="sidebar-brand d-none d-md-block">
                <i class="bi bi-compass-fill"></i> SI <span>Transmigran</span>
            </div>

            <div class="menu-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            
            <a href="{{ url('/transmigran') }}" class="nav-link-custom {{ request()->is('transmigran*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Data Penduduk
            </a>
            
            <a href="{{ url('/uptd') }}" class="nav-link-custom {{ request()->is('uptd*') ? 'active' : '' }}">
                <i class="bi bi-buildings-fill"></i> Penyerahan UPTD
            </a>

            <div class="menu-label mt-4">Data Master</div>
            <a href="{{ route('master-uptd.index') }}" class="nav-link-custom {{ request()->routeIs('master-uptd.*') ? 'active' : '' }}">
                <i class="bi bi-database-fill-gear"></i> Master UPTD/Desa
            </a>

            <a href="{{ route('kabupaten.index') }}" class="nav-link-custom {{ request()->is('kabupaten*') ? 'active' : '' }}">
                <i class="bi bi-map-fill"></i> Master Kabupaten
            </a>
            
            <a href="{{ route('kecamatan.index') }}" class="nav-link-custom {{ request()->is('kecamatan*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt-fill"></i> Master Kecamatan
            </a>

            @if(auth()->check() && auth()->user()->role === 'superadmin')
                <div class="menu-label mt-4">Pengaturan Sistem</div>
                <a href="{{ url('/pengaturan-admin') }}" class="nav-link-custom {{ request()->is('pengaturan-admin*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill"></i> Kelola Admin
                </a>
                <a href="{{ route('admin.log') }}" class="nav-link-custom {{ request()->routeIs('admin.log') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i> Log Aktivitas
                </a>
                <a href="{{ route('profil.edit') }}" class="nav-link-custom {{ request()->routeIs('profil.edit') ? 'active' : '' }}">
                    <i class="bi bi-globe"></i> Setup Website
                </a>
            @endif
            
            <div style="height: 80px;"></div> 
        </div>

        <div class="col-md-10 offset-md-2 p-0 min-vh-100 d-flex flex-column">
            
            <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
                <div class="container-fluid px-0">
                    
                    <button class="btn btn-light border-0 shadow-sm d-md-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" style="border-radius: 12px;">
                        <i class="bi bi-list" style="font-size: 1.5rem;"></i>
                    </button>

                    <span class="navbar-brand mb-0 h1 fw-bold text-dark d-none d-lg-block" style="font-size: 1rem;">
                        <i class="bi bi-shield-check text-primary me-2"></i> Panel Kendali Administrasi
                    </span>
                    
                    <div class="d-flex align-items-center ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-light fw-bold border-0 d-flex align-items-center gap-2 btn-profile shadow-sm" type="button" data-bs-toggle="dropdown">
                                <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; border-radius: 50%;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="text-start d-none d-sm-block ms-1">
                                    <div style="font-size: 0.75rem; color: #0f172a; line-height: 1.2;">{{ Auth::user()->name ?? 'Admin' }}</div>
                                    <div style="font-size: 0.6rem; color: #64748b; text-transform: uppercase;">{{ Auth::user()->role ?? 'Staff' }}</div>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-2" style="border-radius: 15px; margin-top: 15px;">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger fw-bold rounded-3 py-2">
                                            <i class="bi bi-box-arrow-right me-2"></i> Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="main-content flex-grow-1">
                @yield('content')
            </div>
            
            <footer class="text-center py-4 mt-auto" style="border-top: 1px solid #e2e8f0; color: #94a3b8; font-size: 0.75rem;">
                &copy; {{ date('Y') }} <b>SI-Trans Jambi</b>. Dikembangkan dengan Presisi.
            </footer>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
        toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true,
        customClass: { popup: 'colored-toast' }
    });

    @if(session('success'))
        Toast.fire({ icon: 'success', title: "{{ session('success') }}" });
    @endif
    @if(session('error'))
        Toast.fire({ icon: 'error', title: "{{ session('error') }}" });
    @endif
</script>
    
@stack('scripts')
</body>
</html>