@extends('layouts.frontend')
@section('title', 'Beranda | SI-Trans Jambi')

@push('css')
<style>
    .hero-section {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(37, 99, 235, 0.6) 100%), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; 
        background-position: center; 
        
        /* KUNCI PERBAIKANNYA DI SINI: Gunakan padding dinamis, BUKAN min-height */
        padding-top: clamp(130px, 18vh, 180px); 
        padding-bottom: clamp(100px, 15vh, 150px); 
        
        display: flex; 
        align-items: center; 
        color: var(--white);
        clip-path: polygon(0 0, 100% 0, 100% 95%, 0% 100%); 
        margin-bottom: -30px;
    }
    
    /* Ukuran Font Dinamis (Lebih Elegan & Sopan di HP) */
    .hero-title { 
        font-weight: 800; 
        font-size: clamp(1.8rem, 4.5vw, 3.2rem); 
        letter-spacing: -0.5px; line-height: 1.2; 
    }
    .heading-large { 
        font-weight: 800; 
        font-size: clamp(1.4rem, 3.5vw, 2.2rem); 
        margin-bottom: 10px; color: var(--navy-deep);
    }
    
    /* Berita */
    .news-card { border-radius: 20px; overflow: hidden; border: 1px solid #f1f5f9; background: #fff; transition: 0.3s; height: 100%; }
    .news-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.04); }
    .news-img { height: 200px; overflow: hidden; }
    .news-img img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
    .news-card:hover .news-img img { transform: scale(1.05); }

    /* Pengelola (Infinite Marquee) */
    .mgmt-section { 
        background: var(--navy-deep); border-radius: 30px; padding: 40px 0; color: white; margin: 0 auto; 
        background-image: linear-gradient(to right, #0f172a, #1e3a8a);
    }
    .struktur-container { overflow: hidden; width: 100%; padding: 20px 0; }
    .struktur-track { display: flex; gap: 15px; width: max-content; animation: slideInfinite 30s linear infinite; }
    .struktur-track:hover { animation-play-state: paused; }
    @keyframes slideInfinite { 0% { transform: translateX(0); } 100% { transform: translateX(calc(-50% - 7.5px)); } }
    .struktur-card {
        width: 180px; height: 250px; position: relative; border-radius: 12px; overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3); border: 2px solid rgba(255,255,255,0.1); transition: 0.3s; background: #1e293b; flex-shrink: 0;
    }
    .struktur-card:hover { transform: translateY(-5px); border-color: rgba(255,255,255,0.8); }
    .struktur-img { width: 100%; height: 100%; object-fit: cover; opacity: 0.85; transition: 0.3s; }
    .struktur-card:hover .struktur-img { opacity: 1; transform: scale(1.05); }
    .struktur-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%; padding: 25px 10px 15px;
        background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.7) 50%, transparent 100%);
        display: flex; flex-direction: column; align-items: center; text-align: center;
    }
    .struktur-role { color: #fff; font-size: 0.85rem; font-weight: 700; margin-bottom: 3px; }
    .struktur-name { color: #cbd5e1; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;}

    /* Galeri */
    .gallery-item { border-radius: 16px; overflow: hidden; height: 200px; position: relative; box-shadow: 0 4px 10px rgba(0,0,0,0.03); }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
    .gallery-item:hover img { transform: scale(1.05); }
    .gallery-item::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 60%; background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%); pointer-events: none; }
    .gallery-caption { position: absolute; bottom: 0; left: 0; width: 100%; padding: 15px; z-index: 2; text-align: left; }
</style>
@endpush

@section('content')
    <section class="hero-section">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 col-md-10">
                    <span class="tag-premium" style="background: rgba(255,255,255,0.15); color: white; border: 1px solid rgba(255,255,255,0.2);">Pusat Data Digital</span>
                    <h1 class="hero-title mb-3">Integrasi Data Transmigrasi <br><span class="text-info">Provinsi Jambi</span></h1>
                    <p class="lead opacity-75 mb-4" style="max-width: 550px; font-size: clamp(0.95rem, 2vw, 1.1rem);">
                        {{ $profil->deskripsi_singkat ?? '' }}
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ url('/statistik') }}" class="btn btn-info rounded-pill px-4 py-2 fw-bold text-white shadow-sm">Lihat Analisis Data</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding bg-transparent" id="berita">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="tag-premium">Warta Terkini</span>
                    <h2 class="heading-large mb-0">Berita & Kegiatan</h2>
                </div>
                <a href="{{ route('berita.semua') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold mb-2">Lihat Semua</a>
            </div>
            <div class="row g-4">
                @foreach($beritas->take(3) as $berita)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="news-card position-relative"> 
                        <div class="news-img">
                            <img src="{{ asset('berita_images/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                        </div>
                        <div class="p-4">
                            <small class="text-muted fw-bold d-block mb-2">{{ $berita->created_at->format('d M Y') }}</small>
                            <h6 class="fw-bold mb-2">{{ Str::limit($berita->judul, 45) }}</h6>
                            <p class="text-muted small mb-3">{{ Str::limit(strip_tags($berita->konten), 80) }}</p>
                            <a href="{{ route('berita.baca', $berita->slug) }}" class="text-primary fw-bold text-decoration-none small stretched-link">Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container mb-5">
        <section class="mgmt-section shadow-sm" data-aos="fade-up">
            <div class="text-center mb-2">
                <span class="tag-premium" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);">Struktur Organisasi</span>
            </div>
            
            <div class="struktur-container mt-4">
                <div class="struktur-track">
                    @foreach($penguruses ?? [] as $p)
                    <div class="struktur-card" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal" data-image="{{ asset('pengurus/'.$p->foto) }}" data-title="{{ $p->jabatan }} - {{ $p->nama }}">
                        <img src="{{ asset('pengurus/'.$p->foto) }}" alt="{{ $p->nama }}" class="struktur-img">
                        <div class="struktur-overlay"><div class="struktur-role">{{ $p->jabatan }}</div><div class="struktur-name">{{ $p->nama }}</div></div>
                    </div>
                    @endforeach

                    @foreach($penguruses ?? [] as $p)
                    <div class="struktur-card" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal" data-image="{{ asset('pengurus/'.$p->foto) }}" data-title="{{ $p->jabatan }} - {{ $p->nama }}">
                        <img src="{{ asset('pengurus/'.$p->foto) }}" alt="{{ $p->nama }}" class="struktur-img">
                        <div class="struktur-overlay"><div class="struktur-role">{{ $p->jabatan }}</div><div class="struktur-name">{{ $p->nama }}</div></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <section class="section-padding bg-white" id="galeri">
        <div class="container text-center">
            <span class="tag-premium">Galeri</span>
            <h2 class="heading-large">Dokumentasi Visual</h2>
            <div class="row g-3 mt-2">
                @foreach($galeris->take(8) as $g)
                <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in">
                    <div class="gallery-item" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal" data-image="{{ asset('galeri/'.$g->foto) }}" data-title="{{ $g->judul ?? 'Kegiatan UPTD' }}">
                        <img src="{{ asset('galeri/'.$g->foto) }}" alt="Foto Galeri">
                        <div class="gallery-caption"><p class="text-white fw-bold small mb-0" style="line-height: 1.3; text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">{{ $g->judul ?? 'Kegiatan UPTD' }}</p></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="position-relative d-inline-block mx-auto">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close" style="filter: drop-shadow(0px 0px 5px rgba(0,0,0,0.8));"></button>
                    
                    <div class="modal-body text-center p-0">
                        <img src="" id="modalGalleryImage" class="img-fluid rounded-4 shadow-lg" alt="Preview Foto" style="max-height: 85vh; object-fit: contain;">
                        
                        <div class="position-absolute bottom-0 start-0 w-100 p-4 pb-3 text-center pointer-events-none">
                            <h5 id="modalGalleryTitle" class="text-white mb-0 fw-bold" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9), -1px -1px 4px rgba(0,0,0,0.8);"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryModal = document.getElementById('galleryModal');
        if (galleryModal) {
            galleryModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const imageUrl = button.getAttribute('data-image');
                const imageTitle = button.getAttribute('data-title');
                
                galleryModal.querySelector('#modalGalleryImage').src = imageUrl;
                galleryModal.querySelector('#modalGalleryTitle').textContent = imageTitle;
            });
            
            galleryModal.addEventListener('hidden.bs.modal', function () {
                galleryModal.querySelector('#modalGalleryImage').src = '';
            });
        }
    });
</script>
@endpush