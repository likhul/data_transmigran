<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $profil->judul_website ?? 'SI-Trans Jambi')</title>
    <meta name="description" content="@yield('meta_description', $profil->deskripsi_singkat ?? 'Portal Informasi Data')">
    
    @if(isset($profil) && $profil->favicon_website)
        <link rel="icon" href="{{ asset('logo/' . $profil->favicon_website) }}">
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --md-primary: #2563eb;
            --navy-deep: #0f172a;
            --soft-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc; 
            display: flex; flex-direction: column; min-height: 100vh;
        }

        /* --- NAVBAR BASE --- */
        .navbar { 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
            padding: 25px 0; z-index: 2000; 
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95) !important; 
            backdrop-filter: blur(15px); 
            box-shadow: var(--soft-shadow); 
            padding: 12px 0;
        }

        /* --- NAV LINKS LOGIC --- */
        .nav-link { 
            font-weight: 700; font-size: 0.95rem; 
            transition: 0.3s; padding: 10px 18px !important;
            position: relative;
        }

        /* Keadaan di Atas (Dark/Transparent) */
        .navbar-dark .nav-link { color: rgba(255,255,255,0.8) !important; }
        .navbar-dark .nav-link:hover, 
        .navbar-dark .nav-link.active { 
            color: #ffffff !important; 
        }
        .navbar-dark .nav-link.active::after {
            content: ""; position: absolute; bottom: 5px; left: 18px; right: 18px;
            height: 3px; background: white; border-radius: 10px;
        }

        /* Keadaan di Bawah (Light/Scrolled) */
        .navbar-light .nav-link { color: var(--navy-deep) !important; }
        .navbar-light .nav-link:hover, 
        .navbar-light .nav-link.active { 
            color: var(--md-primary) !important; 
        }
        .navbar-light .nav-link.active::after {
            content: ""; position: absolute; bottom: 5px; left: 18px; right: 18px;
            height: 3px; background: var(--md-primary); border-radius: 10px;
        }

        /* --- LOGIN BUTTON LOGIC --- */
        .btn-login-nav {
            border-radius: 50px; padding: 8px 25px !important;
            font-weight: 800; font-size: 0.8rem; text-transform: uppercase;
            letter-spacing: 0.5px; transition: 0.3s;
        }
        /* Button di Atas */
        .navbar-dark .btn-login-nav {
            border: 2px solid rgba(255,255,255,0.4); color: white !important;
        }
        /* Button di Bawah */
        .navbar-light .btn-login-nav {
            background: var(--md-primary); color: white !important;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }
        .btn-login-nav:hover { transform: translateY(-2px); opacity: 0.9; }

        /* --- BURGER SVG --- */
        .navbar-toggler { border: none !important; padding: 8px; }
        .burger-svg { stroke: white; transition: 0.3s; }
        .navbar.scrolled .burger-svg { stroke: var(--navy-deep); }

        /* --- MOBILE MENU --- */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--navy-deep); margin-top: 15px; padding: 20px; border-radius: 20px;
            }
            .navbar.scrolled .navbar-collapse {
                background: white; border: 1px solid #e2e8f0;
            }
            .nav-link { text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05); }
            .navbar-light .nav-link { border-bottom: 1px solid #f1f5f9; }
            .nav-link.active::after { display: none; } /* Matikan underline di mobile */
            .btn-login-nav { margin-top: 15px; width: 100%; text-align: center; }
        }

        /* --- FOOTER --- */
        .footer-premium { background: white; border-top: 1px solid #e2e8f0; padding: 60px 0 30px; margin-top: auto; }
        .footer-title { font-weight: 800; font-size: 1rem; color: var(--navy-deep); text-transform: uppercase; margin-bottom: 25px; }
        .footer-link { display: flex; align-items: center; padding: 10px 0; color: #475569 !important; text-decoration: none; font-size: 0.95rem; font-weight: 600; transition: 0.3s; }
        .footer-link:hover { color: var(--md-primary) !important; transform: translateX(8px); }
        .footer-link i { margin-right: 12px; color: var(--md-primary); }
    </style>
    @stack('css')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container px-3">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                @if(isset($profil) && $profil->logo_website)
                    <img src="{{ asset('logo/' . $profil->logo_website) }}" height="32" class="me-2 rounded">
                @endif
                <span class="text-white" id="brandText">SI-Trans Jambi</span>
            </a>
            
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="burger-svg" d="M5 7H25M5 15H25M5 23H25" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('direktori*') ? 'active' : '' }}" href="{{ route('direktori.index') }}">Direktori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('statistik*') ? 'active' : '' }}" href="{{ url('/statistik') }}">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="nav-link btn-login-nav">Panel Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link btn-login-nav">Masuk</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="footer-premium">
        <div class="container px-4">
            <div class="row g-4">
                <div class="col-6">
                    <h6 class="footer-title">Eksplorasi Data</h6>
                    <a href="{{ url('/') }}" class="footer-link"><i class="bi bi-house-door"></i> Beranda</a>
                    <a href="{{ url('/statistik') }}" class="footer-link"><i class="bi bi-bar-chart"></i> Statistik</a>
                    <a href="{{ route('direktori.index') }}" class="footer-link"><i class="bi bi-geo-alt"></i> Direktori</a>
                </div>
                <div class="col-6">
                    <h6 class="footer-title">Layanan Publik</h6>
                    <a href="{{ route('berita.semua') }}" class="footer-link"><i class="bi bi-newspaper"></i> Berita</a>
                    <a href="{{ url('/kontak') }}" class="footer-link"><i class="bi bi-headset"></i> Kontak</a>
                    <a href="{{ route('galeri.semua') }}" class="footer-link"><i class="bi bi-images"></i> Galeri</a>
                </div>
            </div>
            <div class="mt-5 pt-4 border-top text-center small text-muted">
                &copy; {{ date('Y') }} <b>SI-Trans Jambi</b>. Pemerintah Provinsi Jambi.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        const nav = document.getElementById('mainNav');
        const brandText = document.getElementById('brandText');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                nav.classList.add('scrolled');
                nav.classList.replace('navbar-dark', 'navbar-light');
                brandText.style.color = '#0f172a';
            } else {
                nav.classList.remove('scrolled');
                nav.classList.replace('navbar-light', 'navbar-dark');
                brandText.style.color = '#ffffff';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>