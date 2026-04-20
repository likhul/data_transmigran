@extends('layouts.frontend')
@section('title', $berita->judul . ' | SI-Trans Jambi')

@push('meta')
    {{-- SEO & Social Media Share --}}
    <meta name="description" content="{{ Str::limit(strip_tags($berita->konten), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $berita->judul }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->konten), 160) }}">
    <meta property="og:image" content="{{ asset('berita_images/' . $berita->gambar) }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $berita->judul }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($berita->konten), 160) }}">
    <meta name="twitter:image" content="{{ asset('berita_images/' . $berita->gambar) }}">
@endpush

@push('css')
<style>
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
    }

    body { background-color: var(--md-background); }

    /* 1. HERO DETAIL (Optimized for Mobile) */
    .hero-detail {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(37, 99, 235, 0.8) 100%), url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center;
        padding: clamp(80px, 12vh, 120px) 0 clamp(60px, 10vh, 100px);
        position: relative; color: white;
        border-bottom-left-radius: 40px; border-bottom-right-radius: 40px;
    }

    /* Tombol Kembali Rata Kiri */
    .btn-back-modern {
        background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
        color: white; border-radius: 50px; backdrop-filter: blur(10px);
        padding: 8px 20px; font-weight: 700; font-size: 0.85rem;
        transition: 0.3s ease; display: inline-flex; align-items: center; 
    }
    .btn-back-modern:hover { background: white; color: #0f172a; transform: translateX(-5px); }

    /* Fix Tulisan Badge (Sekarang Muncul Tajam) */
    .badge-info-custom {
        background: rgba(255, 255, 255, 0.9); /* Latar belakang putih solid tipis */
        color: #2563eb !important; /* Teks Biru agar kontras */
        padding: 6px 15px; border-radius: 50px; font-weight: 800;
        font-size: 0.7rem; letter-spacing: 1px; margin-bottom: 15px;
        display: inline-block; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .article-title-main {
        font-weight: 800; font-size: clamp(1.4rem, 4.5vw, 2.8rem);
        line-height: 1.2; letter-spacing: -0.5px;
    }

    /* 2. ARTIKEL CARD */
    .content-wrapper { margin-top: -60px; position: relative; z-index: 10; padding-bottom: 50px; }
    .article-card {
        background: #ffffff; border-radius: 30px; border: 1px solid rgba(226, 232, 240, 0.8);
        padding: clamp(20px, 5vw, 50px); box-shadow: var(--soft-shadow);
    }

    /* Meta Info bar */
    .meta-bar {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 15px;
        padding: 15px 0; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9;
        margin: 20px 0 30px; font-size: 0.85rem; color: #64748b; font-weight: 600;
    }

    /* Gambar Utama Berita */
    .hero-img-wrapper { border-radius: 20px; overflow: hidden; margin-bottom: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .hero-img-wrapper img { width: 100%; max-height: 500px; object-fit: cover; }

    /* Area Konten (Dibuat Nyaman Dibaca) */
    .article-content-body {
        font-size: clamp(1rem, 2vw, 1.15rem); line-height: 1.8; color: #334155;
    }
    .article-content-body p { margin-bottom: 1.5rem; text-align: justify; }
    .article-content-body img { max-width: 100% !important; height: auto !important; border-radius: 12px; margin: 15px 0; }

    /* Social Share Buttons */
    .share-pill {
        width: 45px; height: 45px; border-radius: 50%; display: inline-flex;
        align-items: center; justify-content: center; border: 1px solid #e2e8f0;
        transition: 0.3s; color: #64748b; font-size: 1.1rem;
    }
    .share-pill:hover { transform: translateY(-3px); color: white; border-color: transparent; }
    .share-fb:hover { background: #1877f2; }
    .share-wa:hover { background: #25d366; }

    @media (max-width: 768px) {
        .article-card { border-radius: 24px; padding: 25px 20px; }
        .meta-bar { justify-content: flex-start; }
    }
</style>
@endpush

@section('content')

@php
    // LOGIKA NAVIGASI DINAMIS
    $previousUrl = url()->previous();
    $listBeritaUrl = route('berita.semua');
    // Jika URL sebelumnya mengandung kata 'berita' (berarti dari daftar berita), balik ke daftar.
    // Jika tidak, asumsikan dari Beranda.
    $backTarget = (strpos($previousUrl, $listBeritaUrl) !== false) ? $listBeritaUrl : url('/');
@endphp

<section class="hero-detail">
    <div class="container px-3">
        <div class="text-start mb-4">
            <a href="{{ $backTarget }}" class="btn-back-modern text-decoration-none">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        
        <div class="text-center" data-aos="fade-up">
            <span class="badge-info-custom">INFORMASI TERKINI</span>
            <h1 class="article-title-main text-white mb-0 mx-auto" style="max-width: 900px;">
                {{ $berita->judul }}
            </h1>
        </div>
    </div>
</section>

<section class="content-wrapper px-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="article-card" data-aos="fade-up">
                    
                    <div class="meta-bar">
                        <div class="d-flex align-items-center"><i class="bi bi-calendar3 text-primary me-2"></i> {{ $berita->created_at->translatedFormat('d F Y') }}</div>
                        <div class="d-flex align-items-center"><i class="bi bi-person-circle text-primary me-2"></i> Admin SI-Trans</div>
                        <div class="d-flex align-items-center"><i class="bi bi-clock text-primary me-2"></i> {{ $berita->created_at->format('H:i') }} WIB</div>
                    </div>

                    @if($berita->gambar && file_exists(public_path('berita_images/' . $berita->gambar)))
                        <div class="hero-img-wrapper">
                            <img src="{{ asset('berita_images/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                        </div>
                    @endif

                    <div class="article-content-body">
                        {!! $berita->konten !!}
                    </div>

                    <div class="mt-5 pt-4 border-top d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                        <div class="fw-bold text-dark">Bagikan Informasi Ini:</div>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-pill share-fb">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" target="_blank" class="share-pill share-wa">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
</section>
@endsection