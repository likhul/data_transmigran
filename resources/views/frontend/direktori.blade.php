@extends('layouts.frontend')
@section('title', 'Direktori UPTD | SI-Trans Jambi')

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
        letter-spacing: -1px; line-height: 1.2;
    }

    /* Search Bar Melayang (Mobile Optimized) */
    .search-wrapper {
        margin-top: clamp(-30px, -4vw, -40px);
        position: relative; z-index: 10;
    }
    .search-box {
        background: #ffffff; border-radius: 50px; padding: clamp(4px, 1.5vw, 8px);
        box-shadow: 0 15px 35px rgba(15,23,42,0.06); 
        border: 1px solid rgba(226,232,240,0.8);
        transition: box-shadow 0.3s;
    }
    .search-box:focus-within { box-shadow: 0 20px 40px rgba(37,99,235,0.15); border-color: #cbd5e1; }
    
    /* Kartu Direktori UPTD */
    .card-direktori {
        background: #ffffff; border-radius: 24px; border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(15,23,42,0.03); transition: all 0.3s ease;
        height: 100%; display: flex; flex-direction: column; position: relative; overflow: hidden;
    }
    .card-direktori:hover {
        transform: translateY(-8px); box-shadow: 0 20px 40px rgba(37,99,235,0.1); border-color: #cbd5e1;
    }
    
    .bg-soft-primary { background: #eff6ff; color: #2563eb; }
    
    /* Kotak Data Internal */
    .data-pill {
        background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; 
        padding: clamp(12px, 3vw, 15px) clamp(15px, 3vw, 20px); 
        margin-bottom: 25px; transition: 0.3s;
    }
    .card-direktori:hover .data-pill { background: #ffffff; border-color: #cbd5e1; }

    /* Perbaikan Input Search agar tidak terpotong di HP */
    .search-box input::placeholder { font-size: clamp(0.85rem, 2.5vw, 1.05rem); }
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