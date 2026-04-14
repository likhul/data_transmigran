@extends('layouts.frontend')
@section('title', $berita->judul . ' | SI-Trans Jambi')

@push('meta')
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
    /* Hero Section Tema Gradasi */
    .hero-detail {
        background: linear-gradient(-45deg, #0f172a, #1e3a8a, #3b82f6, #0f172a);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        padding: clamp(100px, 15vw, 150px) 15px clamp(60px, 10vw, 100px);
        position: relative;
    }
    @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

    /* Tombol Kembali Floating */
    .btn-back-floating {
        background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
        color: white; border-radius: 50px; 
        padding: clamp(6px, 2vw, 8px) clamp(15px, 3vw, 20px); 
        font-weight: 600; font-size: clamp(0.85rem, 2vw, 1rem);
        transition: 0.3s; display: inline-flex; align-items: center; margin-bottom: 20px;
    }
    .btn-back-floating:hover { background: white; color: var(--navy-deep); transform: translateX(-5px); }

    /* Kartu Artikel Melayang */
    .content-wrapper {
        margin-top: clamp(-60px, -8vw, -80px);
        position: relative; z-index: 10;
    }
    .article-card {
        background: #ffffff; border-radius: 24px; 
        padding: clamp(20px, 5vw, 50px); /* Padding dinamis, lega di laptop, pas di HP */
        box-shadow: 0 15px 40px rgba(15,23,42,0.05); border: 1px solid rgba(226,232,240,0.8);
    }

    /* Tipografi Artikel (Nyaman Dibaca) */
    .article-title { 
        font-weight: 900; font-size: clamp(1.5rem, 4vw, 2.5rem); 
        color: var(--navy-deep); line-height: 1.3; letter-spacing: -0.5px;
    }
    
    .article-meta-box {
        display: flex; flex-wrap: wrap; gap: clamp(10px, 2vw, 20px);
        padding: 15px 0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;
        margin-top: 20px; margin-bottom: 30px;
    }
    .article-meta-item {
        font-size: clamp(0.85rem, 2vw, 0.95rem); color: #64748b; font-weight: 600;
        display: flex; align-items: center;
    }

    /* Gambar Utama Berita */
    .article-hero-img {
        width: 100%; max-height: clamp(250px, 50vh, 500px); 
        object-fit: cover; border-radius: 16px; 
        box-shadow: 0 10px 30px rgba(15,23,42,0.06); margin-bottom: 30px;
    }

    /* Area Konten (WYSIWYG Safe) */
    .article-body {
        font-size: clamp(1rem, 2.5vw, 1.1rem); line-height: 1.8; color: #334155; text-align: justify;
    }
    .article-body p { margin-bottom: 1.5rem; }
    /* Mencegah gambar di dalam konten berita meluber di HP */
    .article-body img { max-width: 100% !important; height: auto !important; border-radius: 12px; margin: 15px 0; }
    /* Mencegah tabel di dalam konten berita meluber di HP */
    .article-body table { width: 100% !important; max-width: 100%; overflow-x: auto; display: block; }
</style>
@endpush

@section('content')
    <section class="hero-detail">
        <div class="container text-center text-lg-start px-3">
            <a href="{{ route('berita.semua') }}" class="btn-back-floating text-decoration-none" data-aos="fade-right">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Berita
            </a>
        </div>
    </section>

    <section class="bg-light pb-5">
        <div class="container content-wrapper px-3 mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-9" data-aos="fade-up">
                    <div class="article-card">
                        
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3" style="letter-spacing: 1px; font-size: 0.75rem;">WARTA TERKINI</span>
                        <h1 class="article-title">{{ $berita->judul }}</h1>
                        
                        <div class="article-meta-box">
                            <div class="article-meta-item">
                                <i class="bi bi-calendar3 text-primary me-2"></i> 
                                {{ $berita->created_at->translatedFormat('d F Y') }}
                            </div>
                            <div class="article-meta-item">
                                <i class="bi bi-clock text-warning me-2"></i> 
                                {{ $berita->created_at->format('H:i') }} WIB
                            </div>
                            <div class="article-meta-item">
                                <i class="bi bi-person-circle text-success me-2"></i> 
                                Admin UPTD
                            </div>
                        </div>

                        @if($berita->gambar && file_exists(public_path('berita_images/' . $berita->gambar)))
                            <img src="{{ asset('berita_images/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="article-hero-img">
                        @endif

                        <div class="article-body">
                            {!! $berita->konten !!}
                        </div>
                        
                        <div class="mt-5 pt-4 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                            <h6 class="fw-bold text-dark mb-0">Bagikan artikel ini:</h6>
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-light rounded-circle text-primary border shadow-sm" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="btn btn-light rounded-circle text-info border shadow-sm" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" target="_blank" class="btn btn-light rounded-circle text-success border shadow-sm" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection