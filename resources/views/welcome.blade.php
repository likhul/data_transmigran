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
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8) 0%, rgba(37, 99, 235, 0.5) 100%), 
                    url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; 
        background-position: center;
        background-attachment: fixed;
        padding: clamp(120px, 15vh, 150px) 0 clamp(60px, 10vh, 100px);
        position: relative; 
        color: white;
        border-bottom-left-radius: 40px; 
        border-bottom-right-radius: 40px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
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

    /* 2. KARTU BERITA (STYLE SLIDER & LIST) */
    .news-badge {
        font-size: 0.65rem; font-weight: 800; padding: 4px 10px; 
        border-radius: 6px; display: inline-block; margin-bottom: 10px; letter-spacing: 0.5px;
    }
    
    .news-hero-card {
        position: relative; overflow: hidden;
        height: clamp(300px, 40vh, 450px); border-radius: 24px;
    }
    .news-hero-img { width: 100%; height: 100%; object-fit: cover; }
    .news-hero-overlay {
        position: absolute; bottom: 0; left: 0; right: 0; padding: 40px 30px;
        background: linear-gradient(to top, rgba(15,23,42,0.95) 0%, rgba(15,23,42,0.6) 60%, transparent 100%);
        color: white; display: flex; flex-direction: column; justify-content: flex-end;
    }
    .news-hero-title {
        font-weight: 800; font-size: clamp(1.2rem, 3.5vw, 1.8rem); 
        margin-bottom: 8px; line-height: 1.3; color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    .news-hero-meta { font-size: 0.8rem; color: #cbd5e1; font-weight: 600; }

    .carousel-indicators [data-bs-target] {
        width: 30px; height: 4px; border-radius: 2px;
        background-color: rgba(255, 255, 255, 0.4); border: none;
        margin: 0 4px; transition: 0.3s;
    }
    .carousel-indicators .active { background-color: #fff; width: 40px; }

    .news-list-card {
        background: var(--md-surface); border-radius: 16px; padding: 12px;
        border: 1px solid rgba(226, 232, 240, 0.8); box-shadow: var(--soft-shadow);
        transition: 0.3s ease; height: 100%; display: flex; align-items: center; gap: 15px;
    }
    .news-list-card:hover { transform: translateY(-3px); box-shadow: var(--hover-shadow); border-color: var(--md-primary); }
    .news-list-img-wrapper { flex-shrink: 0; width: 110px; height: 100px; }
    .news-list-img { width: 100%; height: 100%; object-fit: cover; border-radius: 12px; }
    .news-list-content { display: flex; flex-direction: column; justify-content: center; flex: 1; }
    .news-list-title { font-weight: 800; font-size: 1rem; color: #0f172a; line-height: 1.3; margin-bottom: 6px; }
    .news-list-meta { font-size: 0.75rem; color: #64748b; font-weight: 600; }

    /* 3. STRUKTUR ORGANISASI */
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
    .struktur-img { width: 100%; height: 100%; object-fit: cover; }
    .struktur-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%; 
        padding: 30px 10px 12px;
        background: linear-gradient(to top, rgba(15,23,42,1) 0%, rgba(15,23,42,0.4) 65%, transparent 100%);
        display: flex; flex-direction: column; align-items: center; text-align: center;
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
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; }
    .gallery-caption { position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; background: linear-gradient(transparent, rgba(0,0,0,0.8)); }
    .gallery-text { color: white; font-size: 0.75rem; font-weight: 600; margin: 0; }

    .btn-md3-primary { background: var(--md-primary); color: white; border-radius: 50px; padding: 10px 24px; font-weight: 700; border: none; transition: 0.3s; text-decoration: none; display: inline-block; }

    /* ============================================================
       5. CUSTOM MODAL FOTO
          Dibuat 100% mandiri, TIDAK pakai Bootstrap Modal sama sekali.
          Bootstrap Modal punya default CSS yang override flex-direction
          di layar lebar — inilah akar masalahnya.
          Solusi: buat modal sendiri dengan position:fixed + flexbox column.
       ============================================================ */
    #cfm-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.78);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 24px 16px;
        box-sizing: border-box;
        overflow-y: auto;
    }

    #cfm-overlay.aktif {
        display: flex;
        animation: cfmFadeIn 0.2s ease;
    }

    @keyframes cfmFadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    #cfm-box {
        position: relative;
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        max-width: 90vw;
    }

    #cfm-img {
        display: block;
        max-width: 90vw;
        max-height: 72vh;
        width: auto;
        height: auto;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        background: transparent;
    }

    #cfm-judul {
        display: block;
        width: 100%;
        text-align: center;
        background: #ffffff;
        color: #0f172a;
        font-weight: 700;
        font-size: 1rem;
        line-height: 1.5;
        padding: 10px 24px;
        border-radius: 50px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 16px rgba(0,0,0,0.10);
        word-break: break-word;
        white-space: normal;
        box-sizing: border-box;
    }

    #cfm-tutup {
        position: absolute;
        top: -14px;
        right: -14px;
        width: 36px;
        height: 36px;
        min-width: 36px;
        border-radius: 50%;
        background: #0f172a;
        border: 2px solid #ffffff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
    }

    #cfm-tutup::before,
    #cfm-tutup::after {
        content: '';
        position: absolute;
        width: 14px;
        height: 2px;
        background: #ffffff;
        border-radius: 2px;
    }
    #cfm-tutup::before { transform: rotate(45deg); }
    #cfm-tutup::after  { transform: rotate(-45deg); }
</style>
@endpush

@section('content')
    {{-- HERO SECTION --}}
    <section class="hero-section">
        <div class="container px-3" data-aos="fade-up">
            <span class="tag-premium"><i class="bi bi-cpu-fill me-1"></i> Dashboard Strategis</span>
            <h1 class="hero-title">Integrasi Data Transmigrasi <br><span class="text-info">SI-Trans Jambi</span></h1>
            <p class="lead opacity-75 mb-4" style="max-width: 500px;">Sistem Informasi terpadu untuk pelayanan dan pemetaan demografi kawasan Provinsi Jambi.</p>
            <a href="{{ url('/statistik') }}" class="btn btn-md3-primary shadow">
                <i class="bi bi-bar-chart-line-fill me-2"></i> Eksplorasi Data
            </a>
        </div>
    </section>

    {{-- BERITA SECTION --}}
    <section class="py-4" id="berita">
        <div class="container px-3">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h2 class="fw-800 mb-0" style="font-size: clamp(1.2rem, 3vw, 1.8rem);">Berita Terkini</h2>
                <a href="{{ route('berita.semua') }}" class="btn btn-outline-primary rounded-pill fw-bold btn-sm px-4 d-none d-sm-block">Lihat Semua</a>
            </div>
            
            @php
                $sliderBeritas = $beritas->sortByDesc('views')->take(3);
                $listBeritas = $beritas->whereNotIn('id', $sliderBeritas->pluck('id'))->sortByDesc('created_at')->take(2);
            @endphp

            @if($sliderBeritas->count() > 0)
            <div id="beritaCarousel" class="carousel slide mb-4 shadow-sm" data-bs-ride="carousel" style="border-radius: 24px; overflow: hidden;">
                <div class="carousel-indicators mb-2">
                    @foreach($sliderBeritas as $index => $berita)
                        <button type="button" data-bs-target="#beritaCarousel" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($sliderBeritas as $berita)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="4000">
                        <a href="{{ route('berita.baca', $berita->slug) }}" class="text-decoration-none">
                            <div class="news-hero-card">
                                <img src="{{ asset('berita_images/' . $berita->gambar) }}?v={{ time() }}" class="news-hero-img">
                                <div class="news-hero-overlay">
                                    <div><span class="news-badge bg-primary text-white">BERITA POPULER</span></div>
                                    <h3 class="news-hero-title">{{ Str::limit($berita->judul, 75) }}</h3>
                                    <div class="news-hero-meta">
                                        <i class="bi bi-calendar3 ms-2 me-1"></i> {{ $berita->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($listBeritas->count() > 0)
            <div class="row g-3">
                @foreach($listBeritas as $index => $berita)
                    <div class="col-12 col-lg-6" data-aos="fade-up">
                        <a href="{{ route('berita.baca', $berita->slug) }}" class="text-decoration-none">
                            <div class="news-list-card">
                                <div class="news-list-img-wrapper">
                                    <img src="{{ asset('berita_images/' . $berita->gambar) }}?v={{ time() }}" class="news-list-img">
                                </div>
                                <div class="news-list-content">
                                    <div><span class="news-badge text-primary bg-primary bg-opacity-10 mb-1">TERBARU</span></div>
                                    <h5 class="news-list-title">{{ Str::limit($berita->judul, 60) }}</h5>
                                    <div class="news-list-meta">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @endif

            <div class="mt-4 d-block d-sm-none text-center">
                <a href="{{ route('berita.semua') }}" class="btn btn-outline-primary w-100 rounded-pill fw-bold py-2">
                    Lihat Semua Berita <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- STRUKTUR ORGANISASI --}}
    <div class="container px-3 my-4">
        <section class="mgmt-section" data-aos="fade-up">
            <div class="text-center mb-3">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-bold mb-1" style="font-size: 0.65rem;">STRUKTUR</span>
                <h2 class="fw-800 mb-0" style="font-size: 1.5rem;">Struktur Organisasi</h2>
            </div>
            
            <div class="struktur-container" id="hybridScroll">
                @foreach(collect($penguruses ?? [])->sortBy('urutan') as $p)
                <div class="struktur-card" style="cursor: pointer;" 
                    onclick="lihatFoto('{{ asset('pengurus/'.$p->foto) }}?v={{ time() }}', '{{ $p->jabatan }} - {{ $p->nama }}{{ $p->gelar ? ', ' . $p->gelar : '' }}')">
                    <img src="{{ asset('pengurus/'.$p->foto) }}?v={{ time() }}" alt="{{ $p->nama }}" class="struktur-img">
                    <div class="struktur-overlay">
                        <div class="struktur-role">{{ $p->jabatan }}</div>
                        <div class="struktur-name">{{ $p->nama }}{{ $p->gelar ? ', ' . $p->gelar : '' }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    {{-- GALERI VISUAL --}}
    <section class="py-4 mb-5" id="galeri">
        <div class="container px-3">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div class="text-start">
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-bold mb-1" style="font-size: 0.65rem;">DOKUMENTASI</span>
                    <h2 class="fw-800 mb-0" style="font-size: 1.5rem;">Galeri Visual</h2>
                </div>
                <a href="{{ route('galeri.semua') }}" class="btn btn-outline-primary rounded-pill fw-bold btn-sm px-4 d-none d-sm-block">Lihat Semua</a>
            </div>
            
            <div class="row g-2 g-md-3">
                @foreach(collect($galeris)->sortByDesc('created_at')->take(4) as $g)
                <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in">
                    <div class="gallery-item" style="cursor: pointer;" onclick="lihatFoto('{{ asset('galeri/'.$g->foto) }}?v={{ time() }}', '{{ $g->judul }}')">
                        <img src="{{ asset('galeri/'.$g->foto) }}?v={{ time() }}" alt="Kegiatan">
                        <div class="gallery-caption">
                            <p class="gallery-text text-truncate">{{ $g->judul }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4 d-block d-sm-none text-center">
                <a href="{{ route('galeri.semua') }}" class="btn btn-outline-primary w-100 rounded-pill fw-bold py-2">
                    Lihat Galeri Lainnya <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <div id="cfm-overlay" onclick="cfmTutup(event)">
        <div id="cfm-box">
            <div id="cfm-tutup" onclick="cfmTutup(null,true)" title="Tutup"></div>
            <img id="cfm-img" src="" alt="Preview Foto">
            <span id="cfm-judul"></span>
        </div>
    </div>

    @include('frontend.modals_welcome')
@endsection

@push('scripts')
<script>
    /* =========================================================
       CUSTOM MODAL — fungsi buka & tutup
    ========================================================= */
    function lihatFoto(imgUrl, title) {
        document.getElementById('cfm-img').src = imgUrl;
        document.getElementById('cfm-judul').textContent = title;
        document.getElementById('cfm-overlay').classList.add('aktif');
        document.body.style.overflow = 'hidden';
    }

    function cfmTutup(event, force) {
        if (force || (event && event.target === document.getElementById('cfm-overlay'))) {
            document.getElementById('cfm-overlay').classList.remove('aktif');
            document.getElementById('cfm-img').src = '';
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') cfmTutup(null, true);
    });

    /* =========================================================
       AUTO SCROLL INFINITE — STRUKTUR ORGANISASI (SUDAH DI-UPGRADE)
    ========================================================= */
    const scrollContainer = document.getElementById('hybridScroll');
    let isDown = false;
    let startX, scrollLeft, autoScrollInterval;
    let speed = 1.2;

    function initInfinite() {
        const items = scrollContainer.innerHTML;
        if (items.trim() !== "") {
            // Gandakan foto menjadi 10 KALI LIPAT agar track/jalan tol-nya 
            // sangat panjang dan tidak pernah mentok di layar sebesar apapun.
            let newHTML = "";
            for(let i=0; i<10; i++) {
                newHTML += items;
            }
            scrollContainer.innerHTML = newHTML;
            
            setTimeout(() => {
                // Posisi awal ditaruh di blok pertama
                scrollContainer.scrollLeft = scrollContainer.scrollWidth / 10;
            }, 100);
        }
    }
    initInfinite();

    scrollContainer.addEventListener('scroll', () => {
        // Karena ada 10 salinan, ukuran 1 blok asli adalah total dibagi 10
        const sectionWidth = scrollContainer.scrollWidth / 10;
        
        // Jika sudah masuk ke blok ke-2, mundur diam-diam 1 blok
        if (scrollContainer.scrollLeft >= sectionWidth * 2) {
            scrollContainer.scrollLeft -= sectionWidth;
        }
        // Jika mentok digeser ke arah kiri, lempar maju 1 blok
        if (scrollContainer.scrollLeft <= 0) {
            scrollContainer.scrollLeft += sectionWidth;
        }
    });

    function startAuto() {
        stopAuto();
        autoScrollInterval = setInterval(() => {
            if (!isDown) scrollContainer.scrollLeft += speed;
        }, 16);
    }
    function stopAuto() { clearInterval(autoScrollInterval); }

    scrollContainer.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - scrollContainer.offsetLeft; scrollLeft = scrollContainer.scrollLeft; stopAuto(); });
    scrollContainer.addEventListener('touchstart', (e) => { isDown = true; startX = e.touches[0].pageX - scrollContainer.offsetLeft; scrollLeft = scrollContainer.scrollLeft; stopAuto(); }, { passive: true });
    window.addEventListener('mouseup', () => { if (!isDown) return; isDown = false; setTimeout(startAuto, 1500); });
    window.addEventListener('touchend', () => { if (!isDown) return; isDown = false; setTimeout(startAuto, 1500); });

    startAuto();
</script>
@endpush