@extends('layouts.frontend')
@section('title', 'Arsip Galeri | SI-Trans Jambi')

@push('css')
<style>
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        --hover-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
    }

    body { background-color: var(--md-background); }

    /* Hero Section (Konsisten dengan Arsip Berita) */
    .hero-mini {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.8) 100%), url('https://images.unsplash.com/photo-1492691523567-6170f0295dbd?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; background-position: center;
        padding: clamp(80px, 12vh, 120px) 0 clamp(60px, 10vh, 100px);
        position: relative; color: white;
        border-bottom-left-radius: 40px; border-bottom-right-radius: 40px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
    }
    
    .hero-title-main { font-weight: 800; font-size: clamp(1.5rem, 5vw, 2.5rem); letter-spacing: -1px; }

    .btn-back-modern {
        background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
        color: white; border-radius: 50px; backdrop-filter: blur(10px);
        padding: 8px 20px; font-weight: 700; font-size: 0.85rem;
        transition: 0.3s ease; display: inline-flex; align-items: center; 
    }
    .btn-back-modern:hover { background: white; color: #0f172a; transform: translateX(-5px); }

    /* Grid Galeri */
    .content-wrapper { margin-top: -50px; position: relative; z-index: 10; padding-bottom: 50px; }

    .gallery-card {
        border-radius: 20px; overflow: hidden; background: #fff;
        border: 4px solid #fff; box-shadow: var(--soft-shadow);
        transition: 0.3s; height: 200px; position: relative;
    }
    .gallery-card:hover { transform: translateY(-5px); box-shadow: var(--hover-shadow); }
    .gallery-card img { width: 100%; height: 100%; object-fit: cover; }
    
    .gallery-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%; padding: 15px;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        color: white; font-size: 0.8rem; font-weight: 600;
    }

    /* Pagination */
    .pagination { gap: 5px; }
    .page-link { border-radius: 12px !important; border: none; background: #fff; color: #64748b; font-weight: 700; padding: 10px 16px; }
    .page-item.active .page-link { background: var(--md-primary); color: #fff; }
</style>
@endpush

@section('content')
<section class="hero-mini text-center">
    <div class="container px-3">
        <div class="text-start mb-4">
            <a href="{{ url('/') }}" class="btn-back-modern text-decoration-none">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
            </a>
        </div>
        <span class="badge bg-white bg-opacity-20 text-white rounded-pill fw-bold mb-3 shadow-sm px-3 py-1" style="font-size: 0.7rem; border: 1px solid rgba(255,255,255,0.2);">
            DOKUMENTASI VISUAL
        </span>
        <h1 class="hero-title-main text-white mb-0">Arsip Foto Kegiatan</h1>
    </div>
</section>

<div class="container content-wrapper px-3">
    <div class="row g-3">
        @foreach($galeris as $g)
        <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
            <div class="gallery-card" style="cursor: pointer;" 
                 onclick="openPreview('{{ asset('galeri/'.$g->foto) }}', '{{ $g->judul }}')">
                <img src="{{ asset('galeri/'.$g->foto) }}" alt="Kegiatan">
                <div class="gallery-overlay">
                    {{ Str::limit($g->judul, 30) }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $galeris->links('pagination::bootstrap-5') }}
    </div>
</div>

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
@endsection

@push('scripts')
<script>
    function openPreview(imgUrl, title) {
        const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
        document.getElementById('modalGalleryImage').src = imgUrl;
        document.getElementById('modalGalleryTitle').textContent = title;
        modal.show();
    }
</script>
@endpush