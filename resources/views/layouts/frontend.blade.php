<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO & GOOGLE SEARCH ENGINE OPTIMIZATION --}}
    <title>@yield('title', $profil->judul_website ?? 'SI-Trans Jambi')</title>
    <meta name="description" content="@yield('meta_description', $profil->deskripsi_singkat ?? 'Portal Informasi Data Transmigrasi Provinsi Jambi')">
    <meta name="keywords" content="Transmigrasi Jambi, Data UPTD, Disnakertrans Jambi, SI-Trans, Jambi">
    <meta name="author" content="Pemerintah Provinsi Jambi">

    @if(isset($profil) && $profil->favicon_website)
        <link rel="icon" href="{{ asset('logo/' . $profil->favicon_website) }}">
    @endif

    {{-- Fonts & Libraries --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --navy-deep: #0f172a; --blue-main: #2563eb; --blue-hover: #1d4ed8;
            --blue-soft: #eff6ff; --white: #ffffff; --bg-light: #f8fafc;
            --text-dark: #334155; --text-muted: #64748b;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-light); color: var(--text-dark);
            line-height: 1.7; overflow-x: hidden;
            display: flex; flex-direction: column; min-height: 100vh; /* Agar footer selalu di bawah */
        }

        /* Navbar & Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-light); }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        .navbar { transition: 0.4s; padding: 15px 0; z-index: 1050; border-bottom: 1px solid transparent;}
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(20px);
            padding: 10px 0; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border-bottom: 1px solid #f1f5f9;
        }
        .navbar.scrolled .navbar-brand, .navbar.scrolled .nav-link { color: var(--navy-deep) !important; }
        .nav-link { font-weight: 600; font-size: 0.95rem; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--blue-main) !important; }

        /* Mobile Navbar */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: #ffffff; padding: 15px 20px; border-radius: 16px;
                margin-top: 15px; box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            }
            .navbar-dark .navbar-nav .nav-link { color: var(--navy-deep) !important; padding: 12px 0; border-bottom: 1px solid #f1f5f9; }
            .navbar-dark .navbar-nav .nav-item:last-child .nav-link { border-bottom: none; }
            .navbar-dark .navbar-toggler { border: none; background: rgba(255,255,255,0.15); padding: 8px 12px; border-radius: 8px; }
            .navbar.scrolled .navbar-toggler { background: rgba(15, 23, 42, 0.05); }
            .navbar.scrolled .navbar-toggler-icon { filter: invert(1); }
        }

        /* Komponen Global */
        .section-padding { padding: 80px 0; }
        .tag-premium {
            display: inline-block; background: var(--blue-soft); color: var(--blue-main);
            padding: 6px 16px; border-radius: 50px; font-weight: 700; font-size: 0.7rem;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px;
        }
        .heading-large { font-weight: 800; font-size: 2.2rem; letter-spacing: -1px; margin-bottom: 30px; color: var(--navy-deep);}
        
        /* --- FOOTER BARU (LEBIH CLEAN & MODERN) --- */
        main { flex: 1; } /* Mendorong footer ke bawah */
        .footer-premium { background: var(--white); border-top: 1px solid #e2e8f0; padding: 70px 0 30px; margin-top: auto; }
        
        .social-btn {
            width: 40px; height: 40px; background: #f8fafc; color: var(--text-dark); border: 1px solid #e2e8f0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 12px; transition: all 0.3s; margin-right: 10px; text-decoration: none;
        }
        .social-btn:hover { background: var(--blue-main); color: white; transform: translateY(-4px); border-color: var(--blue-main); box-shadow: 0 5px 15px rgba(37,99,235,0.2); }
        
        .footer-link { transition: all 0.3s ease; display: inline-block; }
        .footer-link:hover { color: var(--blue-main) !important; transform: translateX(5px); }
    </style>
    @stack('css')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                @if(isset($profil) && $profil->logo_website)
                    <img src="{{ asset('logo/' . $profil->logo_website) }}" height="35" class="me-2 bg-white rounded p-1 shadow-sm">
                @endif
                <span class="fs-5 fw-800" style="letter-spacing: -0.5px;">SI-Trans Jambi</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('direktori.*') ? 'active' : '' }}" href="{{ route('direktori.index') }}">Direktori UPTD</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('statistik*') ? 'active' : '' }}" href="{{ url('/statistik') }}">Statistik & Analisis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('kontak*') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak Kami</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-3 mt-lg-0">
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm w-100" style="font-size: 0.85rem;">Login Portal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-premium">
        <div class="container">
            <div class="row g-4 justify-content-between">
                
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center mb-3">
                        @if(isset($profil) && $profil->logo_website)
                            <img src="{{ asset('logo/' . $profil->logo_website) }}" height="35" class="me-2 bg-white rounded p-1 shadow-sm border">
                        @endif
                        <h5 class="fw-800 mb-0 text-dark" style="letter-spacing: -0.5px;">SI-TRANS JAMBI</h5>
                    </div>
                    <p class="small text-muted mb-4 pe-lg-4" style="line-height: 1.8;">Portal Resmi Integrasi Data Transmigrasi Provinsi Jambi. Berkomitmen menyajikan data secara transparan, akurat, dan terpercaya.</p>

                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h6 class="fw-bold mb-4 small text-uppercase text-dark" style="letter-spacing: 1px;">Eksplorasi Data</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-3"><a href="{{ url('/') }}" class="text-decoration-none text-muted footer-link"><i class="bi bi-chevron-right text-primary me-2"></i> Beranda Utama</a></li>
                        <li class="mb-3"><a href="{{ url('/statistik') }}" class="text-decoration-none text-muted footer-link"><i class="bi bi-chevron-right text-primary me-2"></i> Pusat Analitik Data</a></li>
                        <li class="mb-3"><a href="{{ route('direktori.index') }}" class="text-decoration-none text-muted footer-link"><i class="bi bi-chevron-right text-primary me-2"></i> Direktori UPTD</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-4 small text-uppercase text-dark" style="letter-spacing: 1px;">Layanan Publik</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-3"><a href="{{ route('berita.semua') }}" class="text-decoration-none text-muted footer-link"><i class="bi bi-newspaper text-primary me-2"></i> Warta Terkini</a></li>
                        <li class="mb-3"><a href="{{ url('/kontak') }}" class="text-decoration-none text-muted footer-link"><i class="bi bi-headset text-primary me-2"></i> Hubungi Kami</a></li>
                    </ul>
                </div>

            </div>
            
            <hr class="mt-5 mb-4 border-secondary opacity-10">
            
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="small text-muted mb-0 fw-bold">&copy; {{ date('Y') }} SI-Trans Jambi. Hak Cipta Dilindungi.</p>
                <p class="small text-muted mb-0 mt-2 mt-md-0">Dikelola oleh Pemerintah Provinsi Jambi</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 40) {
                nav.classList.add('scrolled'); nav.classList.replace('navbar-dark', 'navbar-light');
            } else {
                nav.classList.remove('scrolled'); nav.classList.replace('navbar-light', 'navbar-dark');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>