@extends('layouts.frontend')
@section('title', 'Detail UPTD | SI-Trans Jambi')

@push('css')
<style>
    /* Hero Section dengan Tema Gradasi */
    .hero-detail {
        background: linear-gradient(-45deg, #0f172a, #1e3a8a, #3b82f6, #0f172a);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        /* Padding dinamis: lebih pendek di HP agar layar tidak termakan habis */
        padding: clamp(80px, 15vw, 120px) 15px clamp(50px, 10vw, 80px);
        position: relative;
        color: white;
    }
    @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

    /* Tombol Kembali Floating - Diperkecil di HP */
    .btn-back-floating {
        background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
        color: white; border-radius: 50px; 
        padding: clamp(6px, 2vw, 8px) clamp(15px, 3vw, 20px); 
        font-weight: 600; font-size: clamp(0.85rem, 2vw, 1rem);
        transition: 0.3s; display: inline-flex; align-items: center; margin-bottom: 20px;
    }
    .btn-back-floating:hover { background: white; color: var(--navy-deep); transform: translateX(-5px); }

    /* Teks Judul & Lokasi */
    .uptd-title { font-weight: 900; font-size: clamp(1.8rem, 5vw, 3rem); letter-spacing: -1px; line-height: 1.2; text-shadow: 0 4px 15px rgba(0,0,0,0.3); }
    .uptd-location { font-size: clamp(0.95rem, 2.5vw, 1.15rem); font-weight: 500; opacity: 0.9; }

    /* Kartu Konten (Naik menimpa Hero Section) */
    .content-wrapper {
        margin-top: clamp(-40px, -6vw, -60px);
        position: relative; z-index: 10;
    }

    /* Kotak Data Utama */
    .detail-card {
        background: #ffffff; border-radius: 24px; 
        padding: clamp(20px, 4vw, 40px); /* Padding menyusut di HP */
        box-shadow: 0 15px 40px rgba(15,23,42,0.05); border: 1px solid rgba(226,232,240,0.8);
        height: 100%; transition: transform 0.3s ease;
    }
    .detail-card:hover { transform: translateY(-5px); box-shadow: 0 20px 50px rgba(15,23,42,0.08); }

    /* Sub-kotak Informasi (List Tabel) */
    .info-list-group { background: #f8fafc; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; }
    .info-list-item {
        display: flex; justify-content: space-between; align-items: center;
        padding: clamp(10px, 2vw, 15px) clamp(15px, 3vw, 20px); /* Spasi dinamis */
        border-bottom: 1px dashed #cbd5e1;
    }
    .info-list-item:last-child { border-bottom: none; }
    
    /* Mencegah teks panjang menabrak/bertumpuk di HP */
    .info-label { color: #64748b; font-size: clamp(0.8rem, 2vw, 0.9rem); font-weight: 600; flex: 0 0 45%; padding-right: 10px; }
    .info-value { color: var(--navy-deep); font-size: clamp(0.85rem, 2vw, 0.95rem); font-weight: 800; text-align: right; flex: 1; word-wrap: break-word; }

    /* Kartu Statistik Warga (Sebelah Kanan) */
    .stat-warga-card {
        background: linear-gradient(145deg, #ffffff, #f1f5f9); border-radius: 24px;
        box-shadow: 0 20px 50px rgba(15,23,42,0.06); border: 1px solid rgba(255,255,255,0.8);
    }
    .stat-box { 
        background: white; border-radius: 16px; 
        padding: clamp(15px, 3vw, 20px); /* Pengecilan padding untuk HP */
        border: 1px solid #e2e8f0; box-shadow: 0 5px 15px rgba(0,0,0,0.02); transition: 0.3s;
    }
    .stat-box:hover { transform: translateY(-3px); border-color: #cbd5e1; }
    
    .stat-number { font-weight: 900; font-size: clamp(1.8rem, 5vw, 2.5rem); letter-spacing: -1px; line-height: 1;}
</style>
@endpush

@section('content')
<section class="hero-detail">
    <div class="container text-center text-lg-start px-3">
        <a href="{{ route('direktori.index') }}" class="btn-back-floating text-decoration-none">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Direktori
        </a>
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0" data-aos="fade-right">
                <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="letter-spacing: 1px; font-size: 0.7rem;">DETAIL UPTD</span>
                <h1 class="uptd-title mb-2">{{ $uptd->nama_upt }}</h1>
                <p class="uptd-location mb-0 d-inline-flex align-items-start justify-content-center justify-content-lg-start text-start mx-auto mx-lg-0" style="max-width: 500px;">
                    <i class="bi bi-geo-alt-fill text-warning me-2 mt-1 fs-5"></i> 
                    <span>Kab. {{ $uptd->kabupaten->nama_kabupaten }}, Kec. {{ $uptd->kecamatan->nama_kecamatan }}</span>
                </p>
            </div>
            <div class="col-lg-4 text-end d-none d-lg-block" data-aos="fade-left">
                <i class="bi bi-buildings text-white opacity-25" style="font-size: 7rem;"></i>
            </div>
        </div>
    </div>
</section>

<section class="bg-light pb-5">
    <div class="container content-wrapper px-3">
        <div class="row g-4">
            
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="detail-card">
                    <div class="mb-4 mb-md-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: clamp(35px, 8vw, 45px); height: clamp(35px, 8vw, 45px);">
                                <i class="bi bi-journal-text fs-5"></i>
                            </div>
                            <h5 class="fw-bolder mb-0 text-dark" style="font-size: clamp(1.1rem, 2.5vw, 1.25rem);">Catatan Sejarah / Keterangan</h5>
                        </div>
                        <p class="text-muted ms-md-5 ps-md-2" style="text-align: justify; line-height: 1.8; font-size: clamp(0.95rem, 2vw, 1.05rem);">
                            {{ $uptd->permasalahan ?? 'Belum ada catatan sejarah atau keterangan tambahan untuk dokumen UPTD ini.' }}
                        </p>
                    </div>

                    <div class="row g-3 g-md-4">
                        <div class="col-md-6 col-12">
                            <h6 class="fw-bold text-dark mb-3 ps-2" style="font-size: clamp(0.95rem, 2vw, 1rem);"><i class="bi bi-file-earmark-check text-success me-2"></i> Data Penyerahan</h6>
                            <div class="info-list-group shadow-sm">
                                <div class="info-list-item"><span class="info-label">No. Berita Acara</span><span class="info-value">{{ $uptd->no_ba_penyerahan }}</span></div>
                                <div class="info-list-item"><span class="info-label">Tahun Serah</span><span class="info-value text-primary">{{ $uptd->tahun_penyerahan }}</span></div>
                                <div class="info-list-item"><span class="info-label">Waktu Penempatan</span><span class="info-value">{{ $uptd->waktu_penempatan }}</span></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <h6 class="fw-bold text-dark mb-3 ps-2" style="font-size: clamp(0.95rem, 2vw, 1rem);"><i class="bi bi-house-door text-info me-2"></i> Realisasi Desa Baru</h6>
                            <div class="info-list-group shadow-sm">
                                <div class="info-list-item"><span class="info-label">Nama Desa</span><span class="info-value text-primary">{{ $uptd->nama_desa_baru }}</span></div>
                                <div class="info-list-item"><span class="info-label">Status Desa</span><span class="info-value">{{ $uptd->status_desa }}</span></div>
                                <div class="info-list-item"><span class="info-label">Pola</span><span class="info-value">{{ $uptd->pola }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-warga-card p-4 position-sticky" style="top: 100px;">
                    <div class="text-center mb-4">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 55px; height: 55px;">
                            <i class="bi bi-pie-chart-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bolder text-dark mb-0">Statistik Warga</h5>
                        <p class="small text-muted mb-0">Data saat diserahterimakan</p>
                    </div>
                    
                    <div class="stat-box mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small fw-bold text-uppercase mb-1" style="letter-spacing: 0.5px;">Total KK</p>
                            <span class="text-muted fw-semibold" style="font-size: 0.8rem;">Kepala Keluarga</span>
                        </div>
                        <h2 class="stat-number text-dark mb-0">{{ $uptd->kk_baru }}</h2>
                    </div>
                    
                    <div class="stat-box mb-4 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small fw-bold text-uppercase mb-1" style="letter-spacing: 0.5px;">Total Jiwa</p>
                            <span class="text-muted fw-semibold" style="font-size: 0.8rem;">Penduduk</span>
                        </div>
                        <h2 class="stat-number text-primary mb-0">{{ $uptd->jiwa_baru }}</h2>
                    </div>
                    
                    <div class="d-flex align-items-start p-3 bg-primary bg-opacity-10 rounded-3">
                        <i class="bi bi-info-circle-fill text-primary me-2 mt-1"></i>
                        <p class="small text-dark fw-medium mb-0" style="line-height: 1.5; font-size: 0.85rem;">
                            Data populasi ini bersifat tetap berdasarkan dokumen resmi Berita Acara Penyerahan.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection