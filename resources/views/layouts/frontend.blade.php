@php
    $profilGlobal = \App\Models\ProfilWeb::first();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $profilGlobal->judul_website ?? 'SI-Trans Jambi')</title>
    <meta name="description" content="@yield('meta_description', $profilGlobal->deskripsi_singkat ?? 'Portal Informasi Data')">
    
    {{-- KODE FAVICON FRONTEND (Dengan Anti-Cache) --}}
    @if($profilGlobal && $profilGlobal->favicon_website && file_exists(public_path('logo/' . $profilGlobal->favicon_website)))
        <link rel="icon" type="image/x-icon" href="{{ asset('logo/' . $profilGlobal->favicon_website) }}?v={{ time() }}">
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --md-primary: #2563eb; /* Biru Utama Tema */
            --navy-deep: #0f172a;  /* Warna Footer */
            --soft-shadow: 0 10px 30px -10px rgba(0,0,0,0.3);
        }

        /* --- STYLING ANIMASI OPENING (EFEK 5 TIANG BERGESER MENGHILANG) --- */
        #opening-jambi {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh; /* Fallback untuk browser lama */
            height: 100dvh; /* Memastikan pas di tengah pada layar HP tanpa terhalang address bar */
            z-index: 999999;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Latar putih dihapus dari sini dan dipindah ke masing-masing tiang */
        }

        .opening-hidden {
            pointer-events: none; /* Mencegah layar menghalangi klik saat animasi keluar */
        }

        /* --- WADAH 5 TIANG VERTIKAL --- */
        .opening-columns {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            z-index: 1; /* Berada di belakang teks dan ring */
        }

        /* BUNGKUSAN TIANG KUNCI: overflow: hidden agar tiang hilang saat keluar garisnya */
        .col-wrapper {
            flex: 1;
            height: 100%;
            overflow: hidden; 
            position: relative;
        }

        /* TIANG PUTIH FISIKNYA */
        .col-slide {
            width: 100%;
            height: 100%;
            background-color: #ffffff; /* Latar Putih Bersih ada di tiang ini */
            transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1);
        }

        /* --- ANIMASI TIANG BERGESER KE KIRI (SEUKURAN DIRINYA SENDIRI) BERGANTIAN --- */
        .opening-hidden .col-wrapper:nth-child(1) .col-slide { transform: translateX(-100%); transition-delay: 0.0s; }
        .opening-hidden .col-wrapper:nth-child(2) .col-slide { transform: translateX(-100%); transition-delay: 0.1s; }
        .opening-hidden .col-wrapper:nth-child(3) .col-slide { transform: translateX(-100%); transition-delay: 0.2s; }
        .opening-hidden .col-wrapper:nth-child(4) .col-slide { transform: translateX(-100%); transition-delay: 0.3s; }
        .opening-hidden .col-wrapper:nth-child(5) .col-slide { transform: translateX(-100%); transition-delay: 0.4s; }

        /* --- BUNGKUSAN KONTEN TENGAH (TEKS & RING) --- */
        .opening-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: opacity 0.3s ease; /* Konten akan memudar cepat saat opening selesai */
        }

        .opening-hidden .opening-content {
            opacity: 0;
        }

        /* Ring Biru Tipis */
        .ring-loader {
            width: 70px;
            height: 70px;
            border: 2px solid #f1f5f9;
            border-top: 2px solid var(--md-primary);
            border-radius: 50%;
            animation: spin-opening 1s linear infinite;
            margin-bottom: 30px;
        }

        /* Teks SITRANSJAMBI */
        .brand-opening-text {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 8px;
            display: flex;
            gap: 2px;
        }

        .brand-opening-text span {
            display: inline-block;
            color: #cbd5e1; /* Warna abu-abu awal (Standby) */
            /* Animasi huruf akan muter 360 derajat */
            animation: text-muter 0.8s ease-in-out forwards;
        }

        @keyframes spin-opening {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Keyframes untuk Teks Muter lalu menghitam */
        @keyframes text-muter {
            0% { 
                transform: rotateY(0deg); 
                color: #cbd5e1; 
            }
            50% { 
                transform: rotateY(90deg); /* Miring 90 derajat */
                color: #cbd5e1; 
            }
            100% { 
                transform: rotateY(360deg); /* Selesai muter 1 putaran penuh */
                color: var(--navy-deep); /* Berubah menjadi warna Hitam / Navy Pekat */
            }
        }

        /* TAMBAHAN BARU: RESPONSIF KHUSUS UNTUK LAYAR HP (DISEMPURNAKAN AGAR PAS & GAGAH) */
        @media (max-width: 768px) {
            .ring-loader {
                width: 60px;
                height: 60px;
                margin-bottom: 25px;
            }
            .brand-opening-text {
                /* clamp membuat ukuran elastis: min 1.4rem, ideal 6vw (ikut lebar layar HP), max 1.8rem */
                font-size: clamp(1.4rem, 6vw, 1.8rem); 
                letter-spacing: 5px; /* Spasi dilonggarkan sedikit agar tetap elegan */
                gap: 2px;
            }
        }
        /* --- END STYLING OPENING --- */

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            display: flex; flex-direction: column; min-height: 100vh;
        }

        /* --- STYLING TEKS DINAS (BRAND) --- */
        .brand-text-wrapper {
            line-height: 1.1;
            margin-left: 10px;
        }
        .brand-main {
            font-weight: 800;
            font-size: clamp(1rem, 2vw, 1.25rem);
            display: block;
        }
        .brand-sub {
            font-weight: 600;
            font-size: clamp(0.55rem, 1.5vw, 0.7rem);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            transition: 0.3s;
        }

        /* --- NAVBAR BASE --- */
        .navbar {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 20px 0; z-index: 2000;
            background: transparent !important; /* Menjamin transparan sebelum scroll */
        }

        /* --- NAVBAR SCROLLED (Warna Seperti Footer) --- */
        .navbar.scrolled {
            background: var(--navy-deep) !important; /* Dirubah ke Navy Deep */
            backdrop-filter: blur(15px);
            box-shadow: var(--soft-shadow);
            padding: 10px 0;
        }

        /* --- NAV LINKS LOGIC --- */
        .nav-link {
            font-weight: 700; font-size: 0.95rem;
            transition: 0.3s; padding: 10px 18px !important;
            position: relative;
            color: rgba(255,255,255,0.8) !important; /* Selalu Putih Lembut */
        }

        .nav-link:hover,
        .nav-link.active {
            color: #ffffff !important;
        }

        .nav-link.active::after {
            content: ""; position: absolute; bottom: 5px; left: 18px; right: 18px;
            height: 3px; background: white; border-radius: 10px;
        }

        /* Underline Biru saat di-scroll (Opsional, agar tetap ada aksen biru) */
        .navbar.scrolled .nav-link.active::after {
            background: var(--md-primary);
        }

        /* --- LOGIN BUTTON LOGIC --- */
        .btn-login-nav {
            border-radius: 50px; padding: 8px 25px !important;
            font-weight: 800; font-size: 0.8rem; text-transform: uppercase;
            letter-spacing: 0.5px; transition: 0.3s;
            border: 2px solid rgba(255,255,255,0.4); color: white !important;
        }
        
        .navbar.scrolled .btn-login-nav {
            background: var(--md-primary);
            border-color: var(--md-primary);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }
        
        .btn-login-nav:hover { transform: translateY(-2px); opacity: 0.9; background: white; color: var(--navy-deep) !important; }

        /* --- BURGER SVG --- */
        .navbar-toggler { border: none !important; padding: 8px; }
        .burger-svg { stroke: white; transition: 0.3s; }

        /* --- MOBILE MENU --- */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--navy-deep); margin-top: 15px; padding: 20px; border-radius: 20px;
                border: 1px solid rgba(255,255,255,0.1);
            }
            .nav-link { text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05); }
            .nav-link.active::after { display: none; }
            .btn-login-nav { margin-top: 15px; width: 100%; text-align: center; }
        }

        /* --- FOOTER --- */
        .footer-premium {
            background: var(--navy-deep);
            border-top: none;
            padding: 40px 0 20px;
            margin-top: auto;
            color: white;
        }
        
        .footer-title {
            font-weight: 800; font-size: 1.05rem;
            color: white;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 1px;
            border-bottom: 2px solid rgba(255,255,255,0.1);
            padding-bottom: 8px;
        }
        
        .footer-link {
            display: flex; align-items: center;
            padding: 6px 0;
            color: rgba(255,255,255,0.7) !important;
            text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: 0.3s;
        }
        .footer-link.active {
            color: var(--md-primary) !important; font-weight: 800;
        }
        .footer-link:hover {
            color: var(--md-primary) !important;
            transform: translateX(6px);
        }
        .footer-link i {
            margin-right: 10px;
            color: rgba(255,255,255,0.4);
        }

        .copyright-section {
             margin-top: 25px !important;
             padding-top: 15px !important;
             border-top: 1px solid rgba(255,255,255,0.1);
             color: rgba(255,255,255,0.5) !important;
             font-size: 0.8rem;
        }
        .copyright-section b { color: white; }
    </style>
    @stack('css')

    {{-- BYPASS SCRIPT: Mencegah kedipan saat pindah halaman --}}
    <script>
        (function() {
            if (sessionStorage.getItem('openingSudahTampil')) {
                var style = document.createElement('style');
                style.innerHTML = '#opening-jambi { display: none !important; }';
                document.head.appendChild(style);
            }
        })();
    </script>
</head>
<body>

    <div id="opening-jambi">
        <div class="opening-columns">
            <div class="col-wrapper"><div class="col-slide"></div></div>
            <div class="col-wrapper"><div class="col-slide"></div></div>
            <div class="col-wrapper"><div class="col-slide"></div></div>
            <div class="col-wrapper"><div class="col-slide"></div></div>
            <div class="col-wrapper"><div class="col-slide"></div></div>
        </div>

        <div class="opening-content">
            <div class="ring-loader"></div>
            <div class="brand-opening-text">
                <span style="animation-delay: 0.1s;">S</span>
                <span style="animation-delay: 0.2s;">I</span>
                <span style="animation-delay: 0.3s;">T</span>
                <span style="animation-delay: 0.4s;">R</span>
                <span style="animation-delay: 0.5s;">A</span>
                <span style="animation-delay: 0.6s;">N</span>
                <span style="animation-delay: 0.7s;">S</span>
                <span style="animation-delay: 0.8s;">J</span>
                <span style="animation-delay: 0.9s;">A</span>
                <span style="animation-delay: 1.0s;">M</span>
                <span style="animation-delay: 1.1s;">B</span>
                <span style="animation-delay: 1.2s;">I</span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container px-3">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                @if($profilGlobal && $profilGlobal->logo_website && file_exists(public_path('logo/' . $profilGlobal->logo_website)))
                    <img src="{{ asset('logo/' . $profilGlobal->logo_website) }}" alt="Logo" style="height: 60px;">
                @endif
                
                <div class="brand-text-wrapper">
                    <span class="brand-main text-primary">SI-Trans Jambi</span>
                    <span class="brand-sub text-white-80" id="brandSubText">
                        Dinas Tenaga Kerja dan Transmigrasi Provinsi Jambi
                    </span>
                </div>
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
            <div class="mt-5 pt-4 border-top text-center small text-muted copyright-section">
                &copy; {{ date('Y') }} <b>SI-Trans Jambi</b>. All Rights Reserved Develop by TIM
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        const nav = document.getElementById('mainNav');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // SCRIPT PEMICU ANIMASI KELUAR
        window.addEventListener('load', function() {
            const opening = document.getElementById('opening-jambi');
            if (!sessionStorage.getItem('openingSudahTampil')) {
                setTimeout(function() {
                    // Memicu ke-5 tiang bergeser dan menghilang
                    opening.classList.add('opening-hidden');
                    sessionStorage.setItem('openingSudahTampil', 'true');
                    setTimeout(function() {
                        opening.style.display = 'none';
                    }, 1000);

                }, 2600);
            } else {
                opening.style.display = 'none';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>