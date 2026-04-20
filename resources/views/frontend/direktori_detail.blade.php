@extends('layouts.frontend')
@section('title', 'Detail UPTD | SI-Trans Jambi')

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

    /* 1. HERO SECTION */
    .hero-detail {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(37, 99, 235, 0.75) 100%), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center;
        padding-top: clamp(80px, 12vh, 120px);
        padding-bottom: clamp(70px, 12vh, 110px); 
        position: relative; color: white;
        border-bottom-left-radius: clamp(16px, 4vw, 32px);
        border-bottom-right-radius: clamp(16px, 4vw, 32px);
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
    }

    /* Tombol Kembali Rata Kiri */
    .btn-back-modern {
        background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
        color: white; border-radius: 50px; backdrop-filter: blur(8px);
        padding: 6px 16px; font-weight: 600; font-size: clamp(0.8rem, 1.5vw, 0.9rem);
        transition: 0.3s; display: inline-flex; align-items: center; 
    }
    .btn-back-modern:hover { background: white; color: var(--navy-deep); transform: translateX(-5px); }

    /* Tipografi Hero */
    .uptd-title { 
        font-weight: 800; font-size: clamp(1.5rem, 5vw, 2.5rem); 
        letter-spacing: -0.5px; line-height: 1.2; margin-bottom: 8px !important; 
    }
    .uptd-location { font-size: clamp(0.9rem, 2vw, 1.1rem); opacity: 0.9; }

    /* 2. KARTU KONTEN UTAMA */
    .content-wrapper {
        margin-top: clamp(-50px, -8vw, -60px);
        position: relative; z-index: 10;
    }

    .detail-card {
        background: var(--md-surface); 
        border-radius: clamp(16px, 4vw, 24px); 
        padding: clamp(20px, 4vw, 35px); 
        box-shadow: var(--soft-shadow); border: 1px solid rgba(226,232,240,0.5);
        height: 100%; transition: transform 0.3s ease;
    }

    /* Sub-kotak Informasi */
    .info-list-group { 
        background: var(--md-background); 
        border-radius: 16px; 
        border: 1px solid rgba(226,232,240,0.8); 
        overflow: hidden; 
    }
    .info-list-item {
        display: flex; justify-content: space-between; align-items: center;
        padding: 12px 18px; 
        border-bottom: 1px solid rgba(226,232,240,0.8);
    }
    .info-list-item:last-child { border-bottom: none; }
    
    .info-label { color: #64748b; font-size: clamp(0.8rem, 1.5vw, 0.9rem); font-weight: 600; flex: 0 0 45%; padding-right: 10px; }
    .info-value { color: #0f172a; font-size: clamp(0.85rem, 2vw, 0.95rem); font-weight: 800; text-align: right; flex: 1; word-wrap: break-word; }

    /* 3. KARTU STATISTIK Warga */
    .stat-warga-card {
        background: var(--md-surface); border-radius: clamp(16px, 4vw, 24px);
        box-shadow: var(--soft-shadow); border: 1px solid rgba(226,232,240,0.5);
        padding: clamp(15px, 4vw, 25px); /* Padding disusutkan agar proporsional */
    }
    .stat-box { 
        background: var(--md-background); border-radius: 14px; 
        padding: 12px 16px; /* Padding dalam diturunkan */
        border: 1px solid rgba(226,232,240,0.8); transition: 0.3s;
    }
    
    /* PERBAIKAN: Angka Statistik Standar Mobile (Tidak Raksasa Lagi) */
    .stat-number { 
        font-weight: 800; 
        font-size: clamp(1.2rem, 3.5vw, 1.6rem); /* Ukuran jauh lebih sopan dan standar */
        letter-spacing: -0.5px; line-height: 1; margin-bottom: 0;
    }
    
    .badge-micro { font-size: clamp(0.6rem, 1.2vw, 0.75rem); padding: 4px 12px; letter-spacing: 1px; }
    
    /* Teks Catatan Sejarah Lega */
    .catatan-text {
        font-size: clamp(0.9rem, 2vw, 1.05rem);
        line-height: 1.7;
        color: #475569;
        text-align: justify;
    }
    .section-title {
        font-size: clamp(1.05rem, 2.5vw, 1.2rem);
        font-weight: 800;
        color: #0f172a;
    }
</style>
@endpush

@section('content')
<section class="hero-detail">
    <div class="container px-3">
        <div class="d-flex justify-content-start mb-3 mb-md-4">
            <a href="{{ route('direktori.index') }}" class="btn-back-modern text-decoration-none">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        
        <div class="row align-items-center">
            <div class="col-12 text-center" data-aos="fade-up">
                <span class="badge bg-white bg-opacity-25 text-white rounded-pill fw-bold mb-3 badge-micro shadow-sm" style="backdrop-filter: blur(4px); border: 1px solid rgba(255,255,255,0.2);">
                    DETAIL UPTD
                </span>
                <h1 class="uptd-title">{{ $uptd->nama_upt }}</h1>
                <p class="uptd-location mb-0 d-flex align-items-center justify-content-center mx-auto" style="max-width: 500px;">
                    <i class="bi bi-geo-alt-fill text-warning me-2 fs-5"></i> 
                    <span>Kab. {{ $uptd->kabupaten->nama_kabupaten }}, Kec. {{ $uptd->kecamatan->nama_kecamatan }}</span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-transparent pb-5">
    <div class="container content-wrapper px-3">
        <div class="row g-3 g-md-4">
            
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="50">
                <div class="detail-card">
                    <div class="mb-4 mb-md-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="bi bi-journal-text fs-5"></i>
                            </div>
                            <h5 class="section-title mb-0">Catatan Sejarah / Keterangan</h5>
                        </div>
                        <p class="catatan-text mb-0">
                            {{ $uptd->permasalahan ?? 'Belum ada catatan sejarah atau keterangan tambahan untuk dokumen UPTD ini.' }}
                        </p>
                    </div>

                    <div class="row g-3 g-md-4">
                        <div class="col-md-6 col-12">
                            <h6 class="section-title mb-2 mb-md-3">
                                <i class="bi bi-file-earmark-check text-success me-2"></i> Data Penyerahan
                            </h6>
                            <div class="info-list-group shadow-sm">
                                <div class="info-list-item"><span class="info-label">No. Berita Acara</span><span class="info-value">{{ $uptd->no_ba_penyerahan }}</span></div>
                                <div class="info-list-item"><span class="info-label">Tahun Serah</span><span class="info-value text-primary">{{ $uptd->tahun_penyerahan }}</span></div>
                                <div class="info-list-item"><span class="info-label">Waktu Penempatan</span><span class="info-value">{{ $uptd->waktu_penempatan }}</span></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <h6 class="section-title mb-2 mb-md-3">
                                <i class="bi bi-house-door text-info me-2"></i> Realisasi Desa Baru
                            </h6>
                            <div class="info-list-group shadow-sm">
                                <div class="info-list-item"><span class="info-label">Nama Desa</span><span class="info-value text-primary">{{ $uptd->nama_desa_baru }}</span></div>
                                <div class="info-list-item"><span class="info-label">Status Desa</span><span class="info-value">{{ $uptd->status_desa }}</span></div>
                                <div class="info-list-item"><span class="info-label">Pola</span><span class="info-value">{{ $uptd->pola }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-warga-card position-sticky" style="top: 100px;">
                    <div class="text-center mb-3 mb-md-4">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                            <i class="bi bi-pie-chart-fill fs-4"></i>
                        </div>
                        <h5 class="section-title mb-1">Statistik Warga</h5>
                        <p class="text-muted mb-0" style="font-size: 0.8rem;">Saat diserahterimakan</p>
                    </div>
                    
                    <div class="stat-box mb-2 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-bold text-uppercase mb-0" style="font-size: 0.7rem; letter-spacing: 0.5px;">Total KK</p>
                            <span class="text-muted fw-medium" style="font-size: 0.75rem;">Kepala Keluarga</span>
                        </div>
                        <h2 class="stat-number text-dark">{{ $uptd->kk_baru }}</h2>
                    </div>
                    
                    <div class="stat-box mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-bold text-uppercase mb-0" style="font-size: 0.7rem; letter-spacing: 0.5px;">Total Jiwa</p>
                            <span class="text-muted fw-medium" style="font-size: 0.75rem;">Penduduk</span>
                        </div>
                        <h2 class="stat-number text-primary">{{ $uptd->jiwa_baru }}</h2>
                    </div>
                    
                    <div class="d-flex align-items-start p-2 p-md-3 bg-primary bg-opacity-10 rounded-3 border border-primary border-opacity-10">
                        <i class="bi bi-info-circle-fill text-primary me-2 fs-6 mt-1"></i>
                        <p class="text-dark fw-medium mb-0" style="line-height: 1.4; font-size: 0.8rem;">
                            Data populasi ini bersifat tetap berdasarkan dokumen Berita Acara Penyerahan UPTD.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection