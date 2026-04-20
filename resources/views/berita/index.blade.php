@extends('layouts.frontend')
@section('title', 'Semua Berita | SI-Trans Jambi')

@push('css')
<style>
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        --hover-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
    }

    body { background-color: var(--md-background); font-size: 14px; }

    /* 1. HERO SECTION (Konsisten dengan Detail Berita) */
    .hero-mini {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.8) 100%), url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center;
        padding: clamp(80px, 12vh, 120px) 0 clamp(60px, 10vh, 100px);
        position: relative; color: white;
        border-bottom-left-radius: 40px; border-bottom-right-radius: 40px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
    }
    
    .hero-title-main { font-weight: 800; font-size: clamp(1.4rem, 4.5vw, 2.5rem); letter-spacing: -0.5px; }

    /* Badge Custom */
    .badge-hero {
        background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px);
        color: white; padding: 6px 15px; border-radius: 50px; font-weight: 700;
        font-size: 0.7rem; letter-spacing: 1px; margin-bottom: 15px;
        display: inline-block; border: 1px solid rgba(255,255,255,0.3);
    }

    /* 2. KONTEN WRAPPER */
    .content-wrapper { margin-top: -50px; position: relative; z-index: 10; padding-bottom: 50px; }

    /* 3. KARTU BERITA (KLIK-ABLE) */
    .news-card-link { text-decoration: none !important; color: inherit; display: block; height: 100%; }
    
    .news-card { 
        border-radius: 24px; background: var(--md-surface); border: 1px solid rgba(226, 232, 240, 0.6);
        box-shadow: var(--soft-shadow); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        height: 100%; padding: 10px; display: flex; flex-direction: column;
    }
    
    .news-card:hover { transform: translateY(-6px); box-shadow: var(--hover-shadow); border-color: var(--md-primary); }
    
    .news-img { height: clamp(160px, 25vh, 200px); border-radius: 18px; overflow: hidden; position: relative; }
    .news-img img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
    .news-card:hover .news-img img { transform: scale(1.05); }

    .news-content { padding: 15px 10px 5px; flex-grow: 1; display: flex; flex-direction: column; }
    
    .news-title { 
        font-weight: 800; font-size: clamp(1rem, 2vw, 1.15rem); 
        color: #0f172a; line-height: 1.4; margin-bottom: 12px; 
    }
    
    .meta-item { font-size: 0.8rem; font-weight: 600; color: #64748b; display: flex; align-items: center; }

    /* Badge Berita Utama */
    .badge-category {
        position: absolute; top: 12px; left: 12px;
        background: rgba(37, 99, 235, 0.85); backdrop-filter: blur(5px);
        color: white; padding: 4px 12px; border-radius: 30px; font-size: 0.65rem; font-weight: 700;
    }

    /* 4. PAGINATION STYLING */
    .pagination { gap: 5px; }
    .page-link { border-radius: 12px !important; border: none; background: #fff; color: #64748b; font-weight: 700; padding: 10px 16px; box-shadow: 0 2px 5px rgba(0,0,0,0.02); }
    .page-item.active .page-link { background: var(--md-primary); color: #fff; box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2); }
</style>
@endpush

@section('content')
    <div class="hero-mini text-center">
        <div class="container px-3">
            <span class="badge-hero">ARSIP INFORMASI</span>
            <h1 class="hero-title-main text-white mb-2">Berita & Kegiatan Terbaru</h1>
            <p class="text-white-50 mx-auto mb-0" style="max-width: 500px; font-size: 0.95rem;">Pantau perkembangan dan dokumentasi kegiatan transmigrasi Provinsi Jambi secara transparan.</p>
        </div>
    </div>

    <section class="content-wrapper px-3">
        <div class="container">
            
            @if($beritas->isEmpty())
                <div class="text-center py-5 bg-white rounded-4 shadow-sm border">
                    <i class="bi bi-newspaper text-muted opacity-25" style="font-size: 5rem;"></i>
                    <h5 class="fw-bold text-dark mt-3">Belum Ada Informasi</h5>
                    <p class="text-muted small">Saat ini belum ada artikel yang dipublikasikan.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Kembali ke Beranda</a>
                </div>
            @else
                <div class="row g-3 g-md-4">
                    @foreach($beritas as $berita)
                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up">
                        <a href="{{ route('berita.baca', $berita->slug) }}" class="news-card-link">
                            <div class="news-card">
                                <div class="news-img">
                                    @if($berita->gambar && file_exists(public_path('berita_images/'.$berita->gambar)))
                                        <img src="{{ asset('berita_images/'.$berita->gambar) }}" alt="{{ $berita->judul }}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1504711432869-efd597cdd045?auto=format&fit=crop&q=60&w=800" alt="Default Image">
                                    @endif
                                    <span class="badge-category">Warta Terkini</span>
                                </div>
                                <div class="news-content">
                                    <div class="meta-item mb-2">
                                        <i class="bi bi-calendar3 text-primary me-2"></i>
                                        {{ $berita->created_at->format('d M Y') }}
                                    </div>
                                    <h5 class="news-title">{{ Str::limit($berita->judul, 65) }}</h5>
                                    
                                    <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold small">Baca Selengkapnya</span>
                                        <i class="bi bi-arrow-right text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5 pt-3">
                    {{ $beritas->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>
    </section>
@endsection