@extends('layouts.frontend')
@section('title', 'Direktori UPTD | SI-Trans Jambi')

@push('css')
<style>
    /* VARIABEL WARNA MATERIAL DESIGN 3 & NEUMORPHISM */
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        --hover-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
    }

    body { background-color: var(--md-background); font-size: 14px; }

    /* 1. HERO SECTION (Micro-Clean MD3) */
    .hero-mini {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(37, 99, 235, 0.75) 100%), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center;
        padding-top: clamp(80px, 12vh, 120px);
        padding-bottom: clamp(60px, 10vh, 100px); 
        position: relative;
        border-bottom-left-radius: clamp(16px, 4vw, 32px);
        border-bottom-right-radius: clamp(16px, 4vw, 32px);
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
    }
    .hero-title-main {
        font-weight: 800; 
        font-size: clamp(1.2rem, 4.5vw, 2.5rem); 
        letter-spacing: -0.5px;
        line-height: 1.3; margin-bottom: 6px !important;
    }
    .hero-subtitle {
        font-size: clamp(0.75rem, 1.8vw, 1rem);
        line-height: 1.5; opacity: 0.9;
    }

    /* 2. SEARCH BAR MELAYANG */
    .search-wrapper {
        margin-top: clamp(-25px, -5vw, -35px);
        position: relative; z-index: 10;
    }
    .search-box {
        background: var(--md-surface); border-radius: 50px; 
        padding: clamp(4px, 1vw, 6px);
        box-shadow: var(--soft-shadow); 
        border: 1px solid rgba(226,232,240,0.8);
        transition: all 0.3s;
    }
    .search-box:focus-within { box-shadow: var(--hover-shadow); border-color: #cbd5e1; }
    .search-box input::placeholder { font-size: clamp(0.8rem, 1.5vw, 0.9rem); color: #94a3b8; }

    /* 3. KARTU DIREKTORI (Neumorphism Compact) */
    .card-direktori {
        background: var(--md-surface); 
        border-radius: clamp(16px, 3vw, 24px); 
        border: 1px solid rgba(226,232,240,0.5);
        box-shadow: var(--soft-shadow); transition: all 0.3s ease;
        height: 100%; display: flex; flex-direction: column; 
        padding: clamp(15px, 3vw, 24px); /* Padding dalam dipangkas */
    }
    .card-direktori:hover {
        transform: translateY(-4px); box-shadow: var(--hover-shadow); border-color: #cbd5e1;
    }
    
    .bg-soft-primary { background: #eff6ff; color: #2563eb; }
    
    /* Typography Kartu */
    .card-title-text { 
        font-weight: 800; color: #0f172a; letter-spacing: -0.3px; 
        font-size: clamp(1.05rem, 2.5vw, 1.25rem); margin-bottom: 4px; 
    }
    .card-loc-text { 
        font-size: clamp(0.75rem, 1.5vw, 0.85rem); color: #64748b; 
        font-weight: 600; margin-bottom: 15px; 
    }

    /* Kotak Data Internal */
    .data-pill {
        background: var(--md-background); 
        border-radius: clamp(10px, 2vw, 16px); 
        padding: clamp(10px, 2vw, 15px); 
        margin-bottom: 20px; transition: 0.3s;
        border: 1px solid transparent;
    }
    .card-direktori:hover .data-pill { background: #ffffff; border-color: rgba(226,232,240,0.8); }

    .data-label { font-size: clamp(0.65rem, 1.2vw, 0.75rem); letter-spacing: 0.5px; color: #64748b; }
    .data-value { font-size: clamp(0.95rem, 2vw, 1.15rem); font-weight: 800; }

    /* Tombol MD3 */
    .btn-md3 {
        border-radius: 50px; padding: clamp(6px, 1.5vw, 10px) clamp(16px, 3vw, 24px);
        font-size: clamp(0.75rem, 1.5vw, 0.9rem); font-weight: 700; transition: 0.3s;
    }
    
    .badge-micro { font-size: clamp(0.55rem, 1.2vw, 0.7rem); padding: 4px 10px; letter-spacing: 0.5px; }
</style>
@endpush

@section('content')
    <div class="hero-mini text-center">
        <div class="container position-relative z-3 px-3">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="font-size: 0.75rem; letter-spacing: 1.5px;">DATABASE RESMI</span>
            <h1 class="hero-title-main mb-3 text-white">Direktori UPTD Transmigrasi</h1>
            <p class="text-white-50 mx-auto mb-0" style="max-width: 600px; font-size: clamp(0.95rem, 2vw, 1.1rem);">Daftar seluruh Unit Pemukiman Transmigrasi di Provinsi Jambi yang telah diserahterimakan ke Pemerintah Daerah.</p>
        </div>
    </div>

    <div class="container px-3 search-wrapper mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9 col-12">
                <form action="{{ route('direktori.index') }}" method="GET">
                    <div class="search-box input-group align-items-center flex-nowrap">
                        <span class="input-group-text bg-transparent border-0 ps-3 ps-md-4 pe-2 text-muted">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-0 shadow-none px-2 bg-transparent" placeholder="Cari nama UPTD atau Kabupaten..." value="{{ request('search') }}" style="font-size: clamp(0.9rem, 2.5vw, 1.05rem);">
                        <button class="btn btn-primary rounded-pill px-3 px-md-4 py-2 fw-bold shadow-sm ms-1 ms-md-2" type="submit" style="font-size: clamp(0.85rem, 2vw, 1rem);">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container section-padding pt-0 px-3">
        
        @if($uptds->isEmpty())
            <div class="text-center py-5 px-3">
                <i class="bi bi-folder-x text-muted opacity-50 display-1 mb-3 d-block"></i>
                <h4 class="fw-bold text-dark" style="font-size: clamp(1.2rem, 3vw, 1.5rem);">Data Tidak Ditemukan</h4>
                <p class="text-muted" style="word-wrap: break-word;">Maaf, UPTD dengan kata kunci "<strong>{{ request('search') }}</strong>" tidak ada di dalam database kami.</p>
                <a href="{{ route('direktori.index') }}" class="btn btn-outline-primary rounded-pill mt-2 fw-bold px-4">Reset Pencarian</a>
            </div>
        @else
            <div class="row g-3 g-md-4">
                @foreach($uptds as $item)
                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up">
                    <div class="card-direktori">
                        <div class="card-body p-4 p-xl-5 d-flex flex-column">
                            
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-soft-primary px-3 py-2 rounded-pill fw-bold" style="letter-spacing: 0.5px; font-size: 0.75rem;">Tahun {{ $item->tahun_penyerahan }}</span>
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="bi bi-building text-primary fs-5"></i>
                                </div>
                            </div>
                            
                            <h4 class="fw-900 text-dark mb-2" style="letter-spacing: -0.5px; font-size: clamp(1.2rem, 3vw, 1.4rem);">{{ $item->nama_upt }}</h4>
                            <p class="text-muted small fw-semibold mb-4 d-flex align-items-center">
                                <i class="bi bi-geo-alt-fill text-danger me-2 fs-6"></i> {{ $item->kabupaten->nama_kabupaten ?? 'Tidak diketahui' }}
                            </p>
                            
                            <div class="data-pill flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-secondary border-opacity-10">
                                    <span class="small text-muted fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.75rem;">KK Awal</span>
                                    <span class="fw-900 text-dark" style="font-size: clamp(1.1rem, 2.5vw, 1.25rem);">{{ $item->kk_awal ?? 0 }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="small text-muted fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.75rem;">Jiwa Awal</span>
                                    <span class="fw-900 text-info" style="font-size: clamp(1.1rem, 2.5vw, 1.25rem);">{{ $item->jiwa_awal ?? 0 }}</span>
                                </div>
                            </div>

                            <a href="{{ route('direktori.show', $item->id) }}" class="btn btn-outline-primary w-100 fw-bold rounded-pill" style="border-width: 2px; font-size: 0.95rem;">
                                Lihat Rincian <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-center mt-5 pt-3 overflow-auto w-100">
            {{ $uptds->links() }}
        </div>
    </div>
@endsection