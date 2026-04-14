@extends('layouts.frontend')
@section('title', 'Kontak Kami | SI-Trans Jambi')

@push('css')
<style>
    /* Hero Section Animasi Gradasi */
    .hero-mini {
        background: linear-gradient(-45deg, #0f172a, #1e3a8a, #3b82f6, #0f172a);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        padding: clamp(100px, 15vw, 140px) 15px clamp(60px, 10vw, 80px);
        position: relative;
    }
    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .hero-title-main {
        font-weight: 900; 
        font-size: clamp(1.8rem, 5vw, 3rem); 
        letter-spacing: -1px;
    }

    /* Kartu Kontak Premium */
    .contact-card { 
        background: #ffffff; border-radius: 24px; 
        padding: clamp(20px, 4vw, 40px); /* Padding dinamis */
        box-shadow: 0 10px 40px rgba(15,23,42,0.04); border: 1px solid rgba(226,232,240,0.8); 
        height: 100%; transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .contact-card:hover {
        transform: translateY(-5px); box-shadow: 0 20px 50px rgba(15,23,42,0.08);
    }

    /* Ikon Modern dengan Gradasi */
    .icon-circle { 
        width: clamp(45px, 8vw, 55px); height: clamp(45px, 8vw, 55px); border-radius: 16px; 
        background: linear-gradient(135deg, #eff6ff 0%, #bfdbfe 100%); color: #2563eb; 
        display: flex; align-items: center; justify-content: center; 
        font-size: clamp(1.2rem, 3vw, 1.4rem); margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(37,99,235,0.15);
    }

    /* Map Wrapper Modern & Responsif */
    .map-wrapper { 
        background: white; padding: clamp(10px, 2vw, 15px); border-radius: 24px; 
        box-shadow: 0 15px 40px rgba(15,23,42,0.04); border: 1px solid rgba(226,232,240,0.8); 
        overflow: hidden; height: 100%;
        transition: transform 0.3s ease;
    }
    .map-wrapper:hover { transform: translateY(-5px); box-shadow: 0 20px 50px rgba(15,23,42,0.08); }
    
    /* PENTING: Memaksa iframe Google Maps mematuhi batas layar HP */
    .map-wrapper iframe { 
        width: 100% !important; /* Paksa 100% */
        max-width: 100% !important;
        height: clamp(300px, 50vh, 500px) !important; /* Tinggi dinamis */
        border-radius: 16px; border: none; 
    }

    /* Tombol Sosial Media Animasi */
    .social-btn-contact {
        width: clamp(38px, 8vw, 45px); height: clamp(38px, 8vw, 45px); 
        display: inline-flex; align-items: center; justify-content: center;
        border-radius: 12px; transition: all 0.3s; background: #f8fafc; border: 1px solid #e2e8f0;
        text-decoration: none;
    }
    .social-btn-contact:hover {
        background: var(--blue-main); transform: translateY(-3px); box-shadow: 0 5px 15px rgba(37,99,235,0.3); border-color: var(--blue-main);
    }
    .social-btn-contact i { transition: 0.3s; }
    .social-btn-contact:hover i { color: white !important; }
</style>
@endpush

@section('content')
    <div class="hero-mini text-center">
        <div class="container position-relative z-3 px-3">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="font-size: 0.75rem; letter-spacing: 1.5px;">HUBUNGI KAMI</span>
            <h1 class="hero-title-main mb-3 text-white">Pusat Layanan Transmigrasi</h1>
            <p class="text-white-50 mx-auto mb-0" style="max-width: 500px; font-size: clamp(0.95rem, 2vw, 1.1rem);">Kami siap melayani dan memberikan informasi terbaik untuk kebutuhan transmigrasi di Provinsi Jambi.</p>
        </div>
    </div>

    <div class="container section-padding pt-0" style="margin-top: clamp(-40px, -6vw, -60px); position: relative; z-index: 10;">
        <div class="row g-4">
            
            <div class="col-lg-4" data-aos="fade-up"> <div class="contact-card">
                    <div class="icon-circle"><i class="bi bi-geo-alt-fill"></i></div>
                    <h6 class="fw-bold text-dark mb-2" style="font-size: clamp(1rem, 2.5vw, 1.1rem);">Alamat Kantor</h6>
                    <p class="text-muted small" style="line-height: 1.6;">{{ $profil->alamat_kantor ?? 'Provinsi Jambi' }}</p>

                    <div class="icon-circle mt-4 pt-1"><i class="bi bi-telephone-fill"></i></div>
                    <h6 class="fw-bold text-dark mb-2" style="font-size: clamp(1rem, 2.5vw, 1.1rem);">Telepon & Layanan</h6>
                    <p class="text-muted small">{{ $profil->nomor_telepon ?? '-' }}</p>

                    <div class="icon-circle mt-4 pt-1"><i class="bi bi-envelope-paper-heart-fill"></i></div>
                    <h6 class="fw-bold text-dark mb-3" style="font-size: clamp(1rem, 2.5vw, 1.1rem);">Sosial Media Resmi</h6>
                    <div class="d-flex gap-2 mt-2">
                        <a href="{{ $profil->link_facebook ?? '#' }}" target="_blank" class="social-btn-contact"><i class="bi bi-facebook text-primary fs-5"></i></a>
                        <a href="{{ $profil->link_instagram ?? '#' }}" target="_blank" class="social-btn-contact"><i class="bi bi-instagram text-danger fs-5"></i></a>
                        <a href="{{ $profil->link_youtube ?? '#' }}" target="_blank" class="social-btn-contact"><i class="bi bi-youtube text-danger fs-5"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="map-wrapper">
                    @if(isset($profil) && $profil->google_maps)
                        {!! $profil->google_maps !!}
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: clamp(300px, 50vh, 500px); border-radius: 16px;">
                            <div class="text-center">
                                <i class="bi bi-map text-muted opacity-50 display-1 mb-3 d-block"></i>
                                <p class="text-muted fw-bold">Peta lokasi belum tersedia.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection