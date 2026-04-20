@extends('layouts.frontend')
@section('title', 'Hubungi Kami | SI-Trans Jambi')

@push('css')
<style>
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --md-primary-soft: #eff6ff;
        --glass-shadow: 0 20px 50px rgba(15, 23, 42, 0.1);
        --inner-card-bg: #fcfdfe;
    }

    body { background-color: var(--md-background); }

    /* 1. HERO SECTION - ULTRA MODERN */
    .hero-mini {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.8) 100%), url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center;
        padding: clamp(80px, 12vh, 120px) 0 clamp(60px, 10vh, 100px);
        position: relative; color: white;
        border-bottom-left-radius: 40px; border-bottom-right-radius: 40px;
    }
    
    .hero-title-main { font-weight: 900; font-size: clamp(1.5rem, 5vw, 2.5rem); letter-spacing: -1px; }

    /* 2. MAIN WRAPPER */
    .contact-wrapper {
        margin-top: -60px; /* Overlap Hero */
        position: relative; z-index: 20;
        margin-bottom: 50px;
    }

    /* 3. THE MEGA CARD */
    .mega-card {
        background: var(--md-surface);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: var(--glass-shadow);
        border: 1px solid rgba(226, 232, 240, 0.6);
    }

    /* MAP AREA */
    .map-container {
        width: 100%;
        height: 300px;
        background: #e2e8f0;
        position: relative;
    }
    .map-container iframe { width: 100% !important; height: 100% !important; border: none; filter: grayscale(0.2) contrast(1.1); }

    /* INFO AREA */
    .info-container { padding: clamp(25px, 5vw, 45px); }

    /* MINI INFO CARDS - Pengganti Ruang Kosong */
    .mini-card {
        background: var(--inner-card-bg);
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        padding: 20px;
        height: 100%;
        transition: 0.3s ease;
    }
    .mini-card:hover { border-color: var(--md-primary); background: #fff; transform: translateY(-3px); }

    .icon-box {
        width: 44px; height: 44px;
        background: var(--md-primary-soft);
        color: var(--md-primary);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem; margin-bottom: 15px;
    }

    .label-small { 
        font-size: 0.7rem; font-weight: 800; color: #94a3b8; 
        text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;
    }
    .value-main { font-size: 0.95rem; font-weight: 700; color: #1e293b; line-height: 1.5; }

    /* SOSMED STYLING */
    .sosmed-pill {
        display: flex; gap: 10px; margin-top: 10px;
    }
    .sosmed-item {
        width: 40px; height: 40px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; background: #fff; border: 1px solid #e2e8f0;
        color: #475569; transition: 0.3s; text-decoration: none;
    }
    .sosmed-item:hover { background: var(--md-primary); color: white; border-color: var(--md-primary); transform: scale(1.1); }

    /* QUICK ACTION BAR */
    .action-bar {
        background: #f8fafc;
        border-top: 1px solid #f1f5f9;
        padding: 20px clamp(25px, 5vw, 45px);
        display: flex; gap: 15px; flex-wrap: wrap;
    }

    .btn-action {
        flex: 1; min-width: 160px;
        border-radius: 14px; font-weight: 700; font-size: 0.85rem;
        padding: 12px 20px; display: flex; align-items: center; justify-content: center;
        gap: 10px; transition: 0.3s;
    }

    /* RESPONSIVE FIX */
    @media (max-width: 768px) {
        .map-container { height: 250px; }
        .info-container { padding: 25px 20px; }
        .action-bar { padding: 20px; }
        .btn-action { width: 100%; flex: none; }
    }
</style>
@endpush

@section('content')
<section class="hero-mini text-center">
    <div class="container px-3" data-aos="fade-down">
        <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm"style="backdrop-filter: blur(5px); font-size: 0.7rem; padding: 6px 15px; border: 1px solid rgba(255,255,255,0.2);">
            LOKASI & KONTAK
        </span>
        <h1 class="hero-title-main text-white mb-2">Terhubung Dengan Kami</h1>
        <p class="text-white-50 mx-auto mb-0" style="max-width: 500px; font-size: 0.95rem;">Silakan kunjungi kantor kami atau hubungi melalui kanal informasi resmi di bawah ini.</p>
    </div>
</section>

<div class="container px-3 contact-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-11">
            <div class="mega-card" data-aos="zoom-in-up">
                
                <div class="map-container">
                    @if(isset($profil) && $profil->google_maps)
                        {!! $profil->google_maps !!}
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                            <div class="text-center">
                                <i class="bi bi-map-fill text-muted display-4"></i>
                                <p class="text-muted small mt-2 fw-bold">Peta Lokasi Belum Tersedia</p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="info-container">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="mini-card shadow-sm">
                                <div class="icon-box"><i class="bi bi-geo-alt-fill"></i></div>
                                <div class="label-small">Alamat Kantor</div>
                                <div class="value-main">{{ $profil->alamat_kantor ?? 'Dinas Tenaga Kerja dan Transmigrasi, Provinsi Jambi' }}</div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="mini-card shadow-sm">
                                        <div class="icon-box"><i class="bi bi-telephone-inbound-fill"></i></div>
                                        <div class="label-small">Telepon</div>
                                        <div class="value-main">{{ $profil->nomor_telepon ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mini-card shadow-sm">
                                        <div class="icon-box"><i class="bi bi-chat-heart-fill"></i></div>
                                        <div class="label-small">Ikuti Kami</div>
                                        <div class="sosmed-pill">
                                            <a href="{{ $profil->link_facebook ?? '#' }}" class="sosmed-item"><i class="bi bi-facebook"></i></a>
                                            <a href="{{ $profil->link_instagram ?? '#' }}" class="sosmed-item"><i class="bi bi-instagram"></i></a>
                                            <a href="{{ $profil->link_youtube ?? '#' }}" class="sosmed-item"><i class="bi bi-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="action-bar">
                    @php
                        // Logika memperbaiki nomor WA agar tidak "Undang"
                        $nohp = $profil->nomor_telepon ?? '';
                        // 1. Hapus spasi, strip, dan karakter non-angka
                        $nohp = preg_replace('/[^0-9]/', '', $nohp);
                        // 2. Jika angka pertama adalah 0, ganti dengan 62
                        if (substr($nohp, 0, 1) === '0') {
                            $nohp = '62' . substr($nohp, 1);
                        }
                    @endphp

                    <a href="https://api.whatsapp.com/send?phone={{ $nohp }}" target="_blank" class="btn btn-primary btn-action shadow-sm">
                        <i class="bi bi-whatsapp"></i> Chat WhatsApp
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection