@extends('layouts.frontend')
@section('title', $berita->judul . ' | SI-Trans Jambi')

@push('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($berita->konten), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $berita->judul }}">
    <meta property="og:image" content="{{ asset('berita_images/' . $berita->gambar) }}">
@endpush

@push('css')
<style>
    /* --- PAKSA NAVBAR LANGSUNG GELAP DI HALAMAN DETAIL --- */
    .navbar {
        background: #0f172a !important; /* Warna Navy Deep */
        backdrop-filter: blur(15px);
        box-shadow: 0 10px 30px -10px rgba(0,0,0,0.3) !important;
    }

    :root {
        --md-primary: #2563eb;
        --text-deep: #0f172a;
        --text-subtle: #475569;
        --bg-main: #f8fafc;
    }

    body { 
        background-color: var(--bg-main); 
        color: var(--text-deep);
        /* 1. TEKSTUR BACKGROUND (AGAR TIDAK DATAR) */
        background-image: radial-gradient(#e2e8f0 0.8px, transparent 0.8px);
        background-size: 24px 24px;
    }

    /* 2. HEADER AREA DENGAN GRADASI */
    .header-wrapper {
        padding: clamp(120px, 16vh, 160px) 0 30px; /* Padding atas dinaikkan sedikit agar tidak tertutup navbar */
    }
    
    .btn-back-styled {
        text-decoration: none; color: var(--md-primary); font-weight: 800;
        font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;
        display: inline-flex; align-items: center; gap: 8px; margin-bottom: 20px;
        transition: 0.3s;
    }
    .btn-back-styled:hover { transform: translateX(-8px); }

    .article-headline {
        font-weight: 900; font-size: clamp(1.8rem, 5vw, 3rem);
        line-height: 1.1; letter-spacing: -1px; margin-bottom: 25px;
        /* JUDUL GRADASI */
        background: linear-gradient(to right, var(--text-deep), var(--md-primary));
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }

    .meta-floating {
        display: flex; gap: 20px; font-size: 0.85rem; font-weight: 700; color: var(--text-subtle);
    }

    /* 3. HERO IMAGE DENGAN OFFSET SHADOW (EFEK MELAYANG) */
    .hero-container {
        position: relative; margin-bottom: 50px;
    }
    .hero-container::before {
        content: ""; position: absolute; top: 20px; left: 20px; right: -15px; bottom: -15px;
        background: var(--md-primary); opacity: 0.08; border-radius: 30px; z-index: -1;
    }
    .img-main-detail {
        width: 100%; border-radius: 24px; border: 5px solid white;
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1); object-fit: cover;
    }

    /* 4. CONTENT AREA DENGAN DROP CAP */
    .article-body-wrapper {
        font-size: clamp(1.1rem, 2.2vw, 1.25rem); line-height: 1.9; color: #334155;
    }
    .article-body-wrapper p:first-of-type::first-letter {
        font-size: 3.5rem; font-weight: 900; float: left;
        line-height: 1; margin-right: 12px; color: var(--md-primary);
    }
    .article-body-wrapper p { margin-bottom: 1.8rem; text-align: justify; }

    /* 5. MINI SHARE BAR (KECIL & ELEGAN) */
    .mini-share-bar {
        display: flex; align-items: center; gap: 12px;
        padding: 25px 0; margin: 30px 0 50px;
        border-top: 2px solid #e2e8f0; border-bottom: 2px solid #f1f5f9;
    }
    .share-label { font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; }
    .btn-share-mini {
        width: 38px; height: 38px; border-radius: 50%; display: flex;
        align-items: center; justify-content: center; text-decoration: none !important;
        transition: 0.3s; font-size: 1rem; background: white; border: 1px solid #e2e8f0;
    }
    .btn-share-mini:hover { transform: translateY(-4px); color: white !important; border-color: transparent; }
    .s-wa { color: #25d366; } .s-wa:hover { background: #25d366; box-shadow: 0 5px 15px #25d36640; }
    .s-fb { color: #1877f2; } .s-fb:hover { background: #1877f2; box-shadow: 0 5px 15px #1877f240; }
    .s-cp { color: #64748b; } .s-cp:hover { background: #64748b; box-shadow: 0 5px 15px #64748b40; }

    /* 6. BACA JUGA (CARD DENGAN HOVER) */
    .rekomendasi-box { margin-top: 20px; }
    .accent-title {
        font-weight: 900; font-size: 1.6rem; display: flex; align-items: center; gap: 15px; margin-bottom: 30px;
    }
    .accent-bar { width: 6px; height: 35px; background: var(--md-primary); border-radius: 10px; }

    .rec-card {
        display: flex; gap: 18px; text-decoration: none !important;
        background: white; padding: 15px; border-radius: 20px;
        margin-bottom: 20px; transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid transparent; box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    }
    .rec-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 15px 30px rgba(37, 99, 235, 0.1);
        border-color: var(--md-primary);
    }
    .rec-thumb { width: 110px; height: 90px; border-radius: 14px; object-fit: cover; flex-shrink: 0; }
    .rec-name { font-weight: 800; font-size: 1.05rem; color: var(--text-deep); line-height: 1.3; margin-bottom: 5px; }
    .rec-date { font-size: 0.8rem; color: var(--text-subtle); font-weight: 600; }
</style>
@endpush

@section('content')

@php
    $rekomendasi = \App\Models\Berita::where('id', '!=', $berita->id)
                    ->inRandomOrder()->take(4)->get();
@endphp

<div class="container px-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            {{-- Header --}}
            <header class="header-wrapper" data-aos="fade-up">
                <a href="{{ url()->previous() }}" class="btn-back-styled">
                    <i class="bi bi-arrow-left-circle-fill fs-5"></i> Kembali
                </a>
                <h1 class="article-headline">{{ $berita->judul }}</h1>
                <div class="meta-floating">
                    <span><i class="bi bi-calendar3 text-primary me-1"></i> {{ $berita->created_at->translatedFormat('d F Y') }}</span>
                    <span><i class="bi bi-clock text-primary me-1"></i> {{ $berita->created_at->format('H:i') }} WIB</span>
                </div>
            </header>

            {{-- Main Image dengan Shadow Melayang --}}
            @if($berita->gambar)
            <div class="hero-container" data-aos="zoom-in">
                <img src="{{ asset('berita_images/' . $berita->gambar) }}" class="img-main-detail" alt="Feature Image">
            </div>
            @endif

            {{-- Article Body dengan Drop Cap --}}
            <div class="article-body-wrapper" data-aos="fade-up">
                {!! $berita->konten !!}
            </div>

            {{-- MINI SHARE BAR (Di Bawah Konten) --}}
            <div class="mini-share-bar" data-aos="fade-up">
                <span class="share-label">Bagikan:</span>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" 
                   target="_blank" class="btn-share-mini s-wa" title="WhatsApp">
                    <i class="bi bi-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank" class="btn-share-mini s-fb" title="Facebook">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="javascript:void(0)" onclick="copyToClipboard()" class="btn-share-mini s-cp" id="btnCopy" title="Salin Tautan">
                    <i class="bi bi-link-45deg"></i>
                </a>
            </div>

            {{-- Baca Juga Section --}}
            <section class="rekomendasi-box" data-aos="fade-up">
                <div class="accent-title">
                    <div class="accent-bar"></div>
                    <span>Baca Juga</span>
                </div>
                
                <div class="row">
                    @foreach($rekomendasi as $item)
                    <div class="col-md-6">
                        <a href="{{ route('berita.baca', $item->slug) }}" class="rec-card">
                            <img src="{{ asset('berita_images/' . $item->gambar) }}" class="rec-thumb" alt="Thumbnail">
                            <div class="rec-info">
                                <div class="rec-name">{{ Str::limit($item->judul, 45) }}</div>
                                <div class="rec-date">{{ $item->created_at->translatedFormat('d M Y') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href);
        const btn = document.getElementById('btnCopy');
        const originalHtml = btn.innerHTML;
        
        btn.innerHTML = '<i class="bi bi-check2"></i>';
        btn.classList.add('bg-secondary', 'text-white');
        
        setTimeout(() => {
            btn.innerHTML = originalHtml;
            btn.classList.remove('bg-secondary', 'text-white');
        }, 2000);
    }
</script>
@endpush