@extends('layouts.frontend')
@section('title', 'Semua Berita | SI-Trans Jambi')

@push('css')
<style>
    /* Hero Section Animasi Gradasi (Konsisten dengan halaman lain) */
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
        letter-spacing: -1px; line-height: 1.2;
    }

    /* Kontainer Konten (Naik menimpa Hero) */
    .content-wrapper {
        margin-top: clamp(-40px, -6vw, -60px);
        position: relative; z-index: 10;
    }

    /* Kartu Berita Premium */
    .news-card { 
        border-radius: 24px; overflow: hidden; border: 1px solid rgba(226,232,240,0.8); 
        background: #fff; transition: all 0.3s ease; height: 100%; 
        display: flex; flex-direction: column;
        box-shadow: 0 10px 30px rgba(15,23,42,0.03);
    }
    .news-card:hover { 
        transform: translateY(-8px); box-shadow: 0 20px 40px rgba(37,99,235,0.1); border-color: #cbd5e1;
    }
    
    .news-img { height: clamp(180px, 25vh, 220px); overflow: hidden; position: relative; }
    .news-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .news-card:hover .news-img img { transform: scale(1.05); }

    .news-content { padding: clamp(20px, 3vw, 30px); flex-grow: 1; display: flex; flex-direction: column; }
    .news-title { 
        font-weight: 800; font-size: clamp(1.1rem, 2.5vw, 1.25rem); 
        color: var(--navy-deep); line-height: 1.5; margin-bottom: 15px; 
    }
    .news-date { font-size: 0.85rem; font-weight: 700; color: #64748b; letter-spacing: 0.5px; }
</style>
@endpush

@section('content')
    <div class="hero-mini text-center">
        <div class="container position-relative z-3 px-3">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="font-size: 0.75rem; letter-spacing: 1.5px;">WARTA TERKINI</span>
            <h1 class="hero-title-main mb-3 text-white">Arsip Berita & Kegiatan</h1>
            <p class="text-white-50 mx-auto mb-0" style="max-width: 600px; font-size: clamp(0.95rem, 2vw, 1.1rem);">Kumpulan informasi, pengumuman, dan kegiatan terbaru seputar transmigrasi di Provinsi Jambi.</p>
        </div>
    </div>

    <section class="bg-light pb-5">
        <div class="container content-wrapper px-3">
            
            @if($beritas->isEmpty())
                <div class="text-center py-5 bg-white rounded-4 shadow-sm border mt-3">
                    <i class="bi bi-newspaper text-muted opacity-25" style="font-size: 5rem;"></i>
                    <h4 class="fw-bold text-dark mt-3">Belum Ada Berita</h4>
                    <p class="text-muted">Saat ini belum ada artikel atau berita yang dipublikasikan.</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($beritas as $berita)
                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up">
                        <div class="news-card">
                            <div class="news-img">
                                <img src="{{ asset('berita_images/'.$berita->gambar) }}" alt="{{ $berita->judul }}">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary px-3 py-2 rounded-pill shadow-sm" style="background: rgba(37,99,235,0.9) !important; backdrop-filter: blur(5px);">Berita Utama</span>
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="bi bi-calendar3 text-primary me-2"></i>
                                    <span class="news-date">{{ $berita->created_at->format('d M Y') }}</span>
                                </div>
                                <h5 class="news-title">{{ Str::limit($berita->judul, 60) }}</h5>
                                
                                <div class="mt-auto pt-3 border-top border-secondary border-opacity-10">
                                    <a href="{{ route('berita.baca', $berita->slug) }}" class="btn btn-link text-primary fw-bold text-decoration-none p-0 d-inline-flex align-items-center" style="transition: 0.3s;">
                                        Baca Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5 pt-3 overflow-auto w-100">
                    {{ $beritas->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>
    </section>
@endsection