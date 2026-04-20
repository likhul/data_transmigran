@extends('layouts.frontend')
@section('title', 'Beranda | SI-Trans Jambi')

@push('css')
<style>
    /* VARIABEL WARNA MD3 */
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        --hover-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
    }

    body { background-color: var(--md-background); font-size: 14px; }

    /* 1. HERO SECTION */
    .hero-section {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(37, 99, 235, 0.75) 100%), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center; 
        padding-top: clamp(80px, 12vh, 130px); 
        padding-bottom: clamp(50px, 8vh, 100px); 
        display: flex; align-items: center; color: #ffffff;
        border-bottom-left-radius: clamp(24px, 5vw, 48px);
        border-bottom-right-radius: clamp(24px, 5vw, 48px);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.1);
        margin-bottom: 25px;
    }
    .hero-title { font-weight: 800; font-size: clamp(1.4rem, 5vw, 3rem); letter-spacing: -0.5px; line-height: 1.2; }
    .tag-premium {
        background: rgba(255,255,255,0.15); backdrop-filter: blur(5px);
        color: white; border: 1px solid rgba(255,255,255,0.2);
        padding: 5px 15px; border-radius: 20px;
        font-size: clamp(0.65rem, 1.2vw, 0.8rem); font-weight: 700;
        display: inline-block; margin-bottom: 12px;
    }

    /* 2. KARTU BERITA (KLIK-ABLE) */
    .news-card-link { text-decoration: none !important; color: inherit; display: block; height: 100%; }
    .news-card { 
        border-radius: 20px; background: var(--md-surface); border: 1px solid rgba(226, 232, 240, 0.6);
        box-shadow: var(--soft-shadow); transition: 0.3s ease; height: 100%; padding: 10px; 
    }
    .news-card:hover { transform: translateY(-4px); box-shadow: var(--hover-shadow); border-color: var(--md-primary); }
    .news-img { height: clamp(150px, 20vh, 200px); border-radius: 14px; overflow: hidden; position: relative; }
    .news-img img { width: 100%; height: 100%; object-fit: cover; }
    .news-title-text { font-size: clamp(1rem, 2vw, 1.2rem); font-weight: 700; line-height: 1.3; margin: 12px 5px 8px; color: #0f172a; }
    .news-desc-text { font-size: clamp(0.85rem, 1.8vw, 0.95rem); color: #64748b; margin: 0 5px 10px; }

    /* 3. STRUKTUR ORGANISASI (TRUE INFINITE) */
    .mgmt-section { 
        background: var(--md-surface); border-radius: 24px; padding: 25px 0 20px; 
        box-shadow: var(--soft-shadow); border: 1px solid rgba(226, 232, 240, 0.6);
        margin: 20px 0;
    }
    .struktur-container { 
        overflow-x: auto; display: flex; gap: 14px; padding: 10px 20px;
        -webkit-overflow-scrolling: touch; 
    }
    .struktur-container::-webkit-scrollbar { display: none; }
    
    .struktur-card {
        width: 140px; height: 190px; flex-shrink: 0;
        position: relative; border-radius: 16px; overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08); border: 1px solid #f1f5f9;
    }
    .struktur-img { width: 100%; height: 100%; object-fit: cover; pointer-events: none; }
    .struktur-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%; 
        padding: 30px 10px 12px;
        background: linear-gradient(to top, rgba(15,23,42,1) 0%, rgba(15,23,42,0.4) 65%, transparent 100%);
        display: flex; flex-direction: column; align-items: center; text-align: center;
        pointer-events: none;
    }
    .struktur-role { color: #fff; font-size: 0.75rem; font-weight: 800; margin-bottom: 2px; }
    .struktur-name { color: #cbd5e1; font-size: 0.6rem; text-transform: uppercase; }

    @media (min-width: 768px) {
        .mgmt-section { padding: 45px 0 35px; }
        .struktur-card { width: 180px; height: 240px; }
        .struktur-container { gap: 20px; padding: 10px 40px; }
    }

    /* 4. GALERI */
    .gallery-item { 
        border-radius: 16px; overflow: hidden; height: clamp(110px, 20vw, 180px); 
        position: relative; box-shadow: var(--soft-shadow); border: 3px solid #fff; transition: 0.3s;
    }
    .gallery-item:hover { transform: translateY(-3px); box-shadow: var(--hover-shadow); }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; pointer-events: none; }
    .gallery-caption { position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; background: linear-gradient(transparent, rgba(0,0,0,0.8)); pointer-events: none; }
    .gallery-text { color: white; font-size: 0.75rem; font-weight: 600; margin: 0; }

    .btn-md3-primary { background: var(--md-primary); color: white; border-radius: 50px; padding: 10px 24px; font-weight: 700; border: none; transition: 0.3s; text-decoration: none; display: inline-block; }
</style>
@endpush

@section('content')
    <section class="hero-section">
        <div class="container px-3" data-aos="fade-up">
            <span class="tag-premium"><i class="bi bi-cpu-fill me-1"></i> Dashboard Strategis</span>
            <h1 class="hero-title">Integrasi Data Transmigrasi <br><span class="text-info">Provinsi Jambi</span></h1>
            <p class="lead opacity-75 mb-4" style="max-width: 500px;">Sistem Informasi terpadu untuk pelayanan dan pemetaan demografi kawasan.</p>
            <a href="{{ url('/statistik') }}" class="btn btn-md3-primary shadow">
                <i class="bi bi-bar-chart-line-fill me-2"></i> Eksplorasi Data
            </a>
        </div>
    </section>

    <section class="py-4" id="berita">
        <div class="container px-3">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h2 class="fw-800 mb-0" style="font-size: clamp(1.2rem, 3vw, 1.8rem);">Berita Terkini</h2>
                <a href="{{ route('berita.semua') }}" class="btn btn-outline-primary rounded-pill fw-bold btn-sm px-4 d-none d-sm-block">Lihat Semua</a>
            </div>
            
            <div class="row g-3">
                @foreach($beritas->take(3) as $berita)
                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up">
                    <a href="{{ route('berita.baca', $berita->slug) }}" class="news-card-link">
                        <div class="news-card"> 
                            <div class="news-img">
                                <img src="{{ asset('berita_images/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                                <div class="position-absolute top-0 start-0 m-2">
                                    <span class="badge bg-white text-dark rounded-pill shadow-sm fw-bold" style="font-size: 0.6rem;">
                                        {{ $berita->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="news-content">
                                <h5 class="news-title-text">{{ Str::limit($berita->judul, 50) }}</h5>
                                <p class="news-desc-text">{{ Str::limit(strip_tags($berita->konten), 75) }}</p>
                                <span class="text-primary fw-bold small">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="mt-4 d-block d-sm-none">
                <a href="{{ route('berita.semua') }}" class="btn btn-outline-primary w-100 rounded-pill fw-bold py-2">
                    Lihat Semua Berita <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="container px-3 my-4">
        <section class="mgmt-section" data-aos="fade-up">
            <div class="text-center mb-3">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-bold mb-1" style="font-size: 0.65rem;">STRUKTUR</span>
                <h2 class="fw-800 mb-0" style="font-size: 1.5rem;">Pilar Penggerak</h2>
            </div>
            
            <div class="struktur-container" id="hybridScroll">
                @foreach($penguruses ?? [] as $p)
                <div class="struktur-card" style="cursor: pointer;" 
                     onclick="openPreview('{{ asset('pengurus/'.$p->foto) }}', '{{ $p->jabatan }} - {{ $p->nama }}')">
                    <img src="{{ asset('pengurus/'.$p->foto) }}" alt="{{ $p->nama }}" class="struktur-img">
                    <div class="struktur-overlay">
                        <div class="struktur-role">{{ $p->jabatan }}</div>
                        <div class="struktur-name">{{ $p->nama }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <section class="py-4 mb-5" id="galeri">
        <div class="container px-3 text-center">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div class="text-start">
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-bold mb-1" style="font-size: 0.65rem;">DOKUMENTASI</span>
                    <h2 class="fw-800 mb-0" style="font-size: 1.5rem;">Galeri Visual</h2>
                </div>
                <a href="{{ route('galeri.semua') }}" class="btn btn-outline-primary rounded-pill fw-bold btn-sm px-4 d-none d-sm-block">Lihat Semua</a>
            </div>
            
            <div class="row g-2 g-md-3">
                @foreach($galeris->take(4) as $g) {{-- DIBATASI 4 FOTO --}}
                <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in">
                    <div class="gallery-item" style="cursor: pointer;" 
                        onclick="openPreview('{{ asset('galeri/'.$g->foto) }}', '{{ $g->judul }}')">
                        <img src="{{ asset('galeri/'.$g->foto) }}" alt="Kegiatan">
                        <div class="gallery-caption">
                            <p class="gallery-text">{{ Str::limit($g->judul, 25) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4 d-block d-sm-none">
                <a href="{{ route('galeri.semua') }}" class="btn btn-outline-primary w-100 rounded-pill fw-bold py-2">
                    Lihat Galeri Lainnya <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="position-relative text-center">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-2 z-3" data-bs-dismiss="modal"></button>
                    <img src="" id="modalGalleryImage" class="img-fluid rounded-4 shadow-lg border" style="max-height: 80vh; object-fit: contain; background: #000;">
                    <div class="mt-3 p-2 bg-white rounded-pill d-inline-block px-4 shadow">
                        <h6 id="modalGalleryTitle" class="text-dark mb-0 fw-bold"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.modals_welcome')
@endsection

@push('scripts')
<script>
    function openPreview(imgUrl, title) {
        const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
        document.getElementById('modalGalleryImage').src = imgUrl;
        document.getElementById('modalGalleryTitle').textContent = title;
        modal.show();
    }

    const scrollContainer = document.getElementById('hybridScroll');
    let isDown = false;
    let startX, scrollLeft, autoScrollInterval;
    let speed = 1.2;

    function initInfinite() {
        const items = scrollContainer.innerHTML;
        scrollContainer.innerHTML = items + items + items;
        setTimeout(() => {
            scrollContainer.scrollLeft = scrollContainer.scrollWidth / 3;
        }, 100);
    }
    initInfinite();

    scrollContainer.addEventListener('scroll', () => {
        const sectionWidth = scrollContainer.scrollWidth / 3;
        if (scrollContainer.scrollLeft >= sectionWidth * 2) {
            scrollContainer.scrollLeft -= sectionWidth;
        }
        if (scrollContainer.scrollLeft <= 0) {
            scrollContainer.scrollLeft += sectionWidth;
        }
    });

    function startAuto() {
        stopAuto();
        autoScrollInterval = setInterval(() => {
            if (!isDown) { scrollContainer.scrollLeft += speed; }
        }, 16);
    }
    function stopAuto() { clearInterval(autoScrollInterval); }

    scrollContainer.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - scrollContainer.offsetLeft; scrollLeft = scrollContainer.scrollLeft; stopAuto(); });
    scrollContainer.addEventListener('touchstart', (e) => { isDown = true; startX = e.touches[0].pageX - scrollContainer.offsetLeft; scrollLeft = scrollContainer.scrollLeft; stopAuto(); }, {passive: true});
    window.addEventListener('mouseup', () => { if (!isDown) return; isDown = false; setTimeout(startAuto, 1500); });
    window.addEventListener('touchend', () => { if (!isDown) return; isDown = false; setTimeout(startAuto, 1500); });

    startAuto();

    function filterTable(input, tableId) {
        let filter = input.value.toUpperCase();
        let table = document.getElementById(tableId);
        let tr = table.getElementsByTagName("tr");
        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                let txt = td.textContent || td.innerText;
                tr[i].style.display = txt.toUpperCase().indexOf(filter) > -1 ? "" : "none";
            }
        }
    }
</script>
@endpush