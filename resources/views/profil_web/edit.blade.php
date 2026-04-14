@extends('layouts.app')

@section('title', 'Pengaturan Website - SI Jambi')

@push('css')
<style>
    /* Konfigurasi Warna Tema Navy & Blue */
    :root {
        --blue-primary: #2563eb; 
        --blue-hover: #1d4ed8;
        --blue-light: #eff6ff;
        --navy-dark: #0f172a; 
        --text-main: #1e293b;
        --text-muted: #64748b;
        --bg-body: #f8fafc;
        --bg-surface: #ffffff;
        --border-color: #f1f5f9;
    }

    /* Container Utama */
    .premium-card {
        background: var(--bg-surface);
        border-radius: 24px;
        box-shadow: 0 12px 32px -4px rgba(0, 0, 0, 0.04);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    /* Header & Typography */
    .page-title { font-weight: 800; color: var(--navy-dark); letter-spacing: -0.5px; font-size: 1.5rem; }

    /* Custom Navigation Pills */
    .nav-pills-modern {
        background: #f1f5f9;
        padding: 8px;
        border-radius: 16px;
        display: inline-flex;
        gap: 4px;
    }
    .nav-pills-modern .nav-link {
        border-radius: 12px;
        color: var(--text-muted);
        font-weight: 700;
        font-size: 0.85rem;
        padding: 10px 20px;
        transition: 0.3s;
        border: none;
    }
    .nav-pills-modern .nav-link.active {
        background: var(--navy-dark);
        color: white;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
    }

    /* Buttons */
    .btn-premium {
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.875rem;
        padding: 12px 24px;
        transition: 0.3s;
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        border: none;
    }
    .btn-blue { background: var(--blue-primary); color: white; }
    .btn-blue:hover { background: var(--blue-hover); transform: translateY(-2px); color: white; }
    
    .btn-outline-blue { 
        background: white; 
        color: var(--blue-primary); 
        border: 2px solid var(--blue-primary); 
        padding: 8px 20px;
    }
    .btn-outline-blue:hover { 
        background: var(--blue-light); 
        color: var(--blue-hover); 
        transform: translateY(-2px); 
    }

    /* Form Styling */
    .form-control-premium {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 15px;
        background: #f8fafc;
        transition: 0.3s;
        font-size: 0.9rem;
    }
    .form-control-premium:focus {
        background: white; border-color: var(--blue-primary); box-shadow: 0 0 0 4px var(--blue-light);
    }
    
    /* Menyembunyikan elemen TinyMCE secara default jika diperlukan */
    .tox-promotion, .tox-statusbar__branding { display: none !important; }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title mb-1">Pengaturan Website Publik</h1>
            <p class="text-muted small mb-0"><i class="bi bi-gear-fill me-1"></i>Konfigurasi konten Halaman Depan (Landing Page).</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="premium-card p-4">
        <ul class="nav nav-pills nav-pills-modern mb-5" id="pills-tab" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-media"><i class="bi bi-image me-2"></i>MEDIA & BRANDING</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-kontak"><i class="bi bi-telephone-fill me-2"></i>KONTAK & SOSMED</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-berita"><i class="bi bi-newspaper me-2"></i>BERITA</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-galeri"><i class="bi bi-images me-2"></i>GALERI</button></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-media">
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <input type="hidden" name="judul_website" value="{{ $profil->judul_website ?? 'SI-Trans Jambi' }}">
                    <input type="hidden" name="deskripsi_singkat" value="{{ $profil->deskripsi_singkat ?? 'Sistem Informasi Transmigrasi' }}">
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border bg-light bg-opacity-50 h-100">
                                <h6 class="fw-bold mb-4 text-dark"><i class="bi bi-shield-check me-2 text-primary"></i>Branding Instansi</h6>
                                <div class="mb-4">
                                    <label class="form-label small fw-bold">Logo Utama</label>
                                    @if($profil->logo_website)
                                        <div class="mb-3 p-3 border rounded-3 bg-white" style="width: fit-content;">
                                            <img src="{{ asset('logo/' . $profil->logo_website) }}" style="height: 60px; border-radius: 8px; object-fit: contain;">
                                        </div>
                                    @endif
                                    <input type="file" name="logo_website" class="form-control form-control-premium">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small fw-bold">Favicon (Ikon Tab)</label>
                                    @if($profil->favicon_website)
                                        <div class="mb-3 p-3 border rounded-3 bg-white" style="width: fit-content;">
                                            <img src="{{ asset('logo/' . $profil->favicon_website) }}" style="height: 32px; object-fit: contain;">
                                        </div>
                                    @endif
                                    <input type="file" name="favicon_website" class="form-control form-control-premium">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border bg-white h-100 d-flex flex-column justify-content-center align-items-center text-center shadow-sm">
                                <i class="bi bi-diagram-3 text-primary mb-3" style="font-size: 3.5rem;"></i>
                                <h5 class="fw-bold mb-2">Struktur Organisasi</h5>
                                <p class="text-muted small px-4 mb-4">Kelola foto dan jabatan tim pengelola untuk ditampilkan di halaman publik depan.</p>
                                <a href="{{ route('struktur.index') }}" class="btn-premium btn-outline-blue w-75">
                                    <i class="bi bi-people-fill"></i> BUKA KELOLA STRUKTUR
                                </a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-premium btn-blue shadow mt-4 px-5"><i class="bi bi-save"></i> SIMPAN MEDIA</button>
                </form>
            </div>

            <div class="tab-pane fade" id="tab-kontak">
                <form action="{{ route('profil.update') }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="judul_website" value="{{ $profil->judul_website ?? 'SI-Trans Jambi' }}">
                    <input type="hidden" name="deskripsi_singkat" value="{{ $profil->deskripsi_singkat ?? 'Sistem Informasi Transmigrasi' }}">
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted text-uppercase mb-1">Alamat Lengkap Kantor</label>
                            <input type="text" name="alamat_kantor" class="form-control form-control-premium" value="{{ $profil->alamat_kantor }}">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted text-uppercase mb-1">Nomor Telepon / WA</label>
                            <input type="text" name="nomor_telepon" class="form-control form-control-premium" value="{{ $profil->nomor_telepon }}">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold small text-muted text-uppercase mb-1"><i class="bi bi-facebook text-primary me-1"></i> Facebook URL</label>
                            <input type="url" name="link_facebook" class="form-control form-control-premium" value="{{ $profil->link_facebook }}">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold small text-muted text-uppercase mb-1"><i class="bi bi-instagram text-danger me-1"></i> Instagram URL</label>
                            <input type="url" name="link_instagram" class="form-control form-control-premium" value="{{ $profil->link_instagram }}">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold small text-muted text-uppercase mb-1"><i class="bi bi-youtube text-danger me-1"></i> YouTube URL</label>
                            <input type="url" name="link_youtube" class="form-control form-control-premium" value="{{ $profil->link_youtube }}">
                        </div>
                        <div class="col-12">
                            <label class="fw-bold small text-muted text-uppercase mb-1">Google Maps Embed (Iframe)</label>
                            <textarea name="google_maps" class="form-control form-control-premium" rows="4" style="font-family: monospace; font-size: 0.85rem;">{{ $profil->google_maps }}</textarea>
                            <div class="text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Buka Google Maps > Bagikan > Sematkan Peta > Salin HTML.</div>
                        </div>
                    </div>
                    <button type="submit" class="btn-premium btn-blue shadow mt-4 px-5"><i class="bi bi-save"></i> SIMPAN KONTAK</button>
                </form>
            </div>

            <div class="tab-pane fade" id="tab-berita">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-newspaper me-2 text-primary"></i>Manajemen Berita</h5>
                    <button class="btn-premium btn-blue shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBerita">
                        <i class="bi bi-plus-lg"></i> TULIS BERITA
                    </button>
                </div>
                <div class="table-responsive border rounded-4">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="50" class="text-center py-3">No</th>
                                <th width="100">Foto</th>
                                <th>Judul Berita</th>
                                <th>Tanggal Posting</th>
                                <th width="120" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritas as $index => $berita)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                                <td>
                                    @if($berita->gambar && file_exists(public_path('berita_images/' . $berita->gambar)))
                                        <img src="{{ asset('berita_images/' . $berita->gambar) }}" class="rounded-3 shadow-sm border" style="width: 70px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="rounded-3 bg-light border d-flex align-items-center justify-content-center text-muted" style="width: 70px; height: 50px;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-bold text-dark">{{ $berita->judul }}</td>
                                <td class="text-muted small"><i class="bi bi-calendar2-event me-1"></i> {{ $berita->created_at->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <div class="btn-group shadow-sm border rounded-2">
                                        <button type="button" class="btn btn-sm btn-light text-warning" data-bs-toggle="modal" data-bs-target="#modalEditBerita{{ $berita->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger" onclick="return confirm('Hapus berita secara permanen?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada berita yang diterbitkan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-galeri">
                <div class="p-4 rounded-4 border mb-5 bg-light bg-opacity-50">
                    <h6 class="fw-bold mb-3"><i class="bi bi-cloud-upload me-2 text-primary"></i>Unggah Dokumentasi Baru</h6>
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="row align-items-end g-3">
                        @csrf
                        <div class="col-md-5">
                            <label class="form-label small fw-bold text-muted">Judul/Deskripsi Foto</label>
                            <input type="text" name="judul" class="form-control form-control-premium" placeholder="Contoh: Kunjungan Lapangan..." required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label small fw-bold text-muted">File Foto</label>
                            <input type="file" name="foto" class="form-control form-control-premium" accept="image/*" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn-premium btn-blue w-100 shadow-sm"><i class="bi bi-upload"></i> UPLOAD</button>
                        </div>
                    </form>
                </div>

                <div class="row g-4">
                    @forelse($galeris as $g)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="rounded-4 border overflow-hidden shadow-sm h-100 bg-white">
                            <img src="{{ asset('galeri/'.$g->foto) }}" class="w-100 border-bottom" style="height: 180px; object-fit: cover;">
                            <div class="p-3 text-center">
                                <p class="small fw-bold text-dark text-truncate mb-3" title="{{ $g->judul }}">{{ $g->judul }}</p>
                                <form action="{{ route('galeri.destroy', $g->id ?? $g->id_galeri ?? $g->getKey()) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100 fw-bold" style="border-radius: 10px;">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center text-muted py-5 border rounded-4 border-dashed">
                        <i class="bi bi-images fs-1 text-secondary mb-2"></i>
                        <p class="mb-0">Galeri masih kosong.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahBerita" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            @csrf
            <div class="modal-header border-bottom p-4">
                <h5 class="fw-bold text-navy-dark mb-0"><i class="bi bi-pencil-square me-2 text-primary"></i>Tulis Berita Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light bg-opacity-50">
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label small fw-bold text-muted text-uppercase">Judul Berita Utama</label>
                        <input type="text" name="judul" class="form-control form-control-premium" placeholder="Masukkan judul berita yang menarik..." required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Gambar Header (Banner)</label>
                        <input type="file" name="gambar" class="form-control form-control-premium" accept="image/*" required>
                    </div>
                </div>
                <div class="mb-1">
                    <label class="form-label small fw-bold text-muted text-uppercase">Isi Konten Artikel</label>
                    <textarea name="konten" class="tinymce-editor"></textarea>
                </div>
            </div>
            <div class="modal-footer border-top p-4 bg-white" style="border-radius: 0 0 20px 20px;">
                <button type="button" class="btn btn-light fw-bold px-4 rounded-pill" data-bs-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn-premium btn-blue px-5 shadow">🚀 TERBITKAN BERITA</button>
            </div>
        </form>
    </div>
</div>

@foreach($beritas as $berita)
<div class="modal fade" id="modalEditBerita{{ $berita->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            @csrf @method('PUT')
            <div class="modal-header border-bottom p-4 bg-white">
                <h5 class="fw-bold text-navy-dark mb-0"><i class="bi bi-pencil-fill me-2 text-warning"></i>Edit Konten Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light bg-opacity-50">
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label small fw-bold text-muted text-uppercase">Ubah Judul</label>
                        <input type="text" name="judul" class="form-control form-control-premium" value="{{ $berita->judul }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Ganti Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control form-control-premium" accept="image/*">
                        <small class="text-muted" style="font-size: 0.7rem;">Abaikan jika foto tidak diganti.</small>
                    </div>
                </div>
                <div class="mb-1">
                    <label class="form-label small fw-bold text-muted text-uppercase">Edit Isi Konten</label>
                    <textarea name="konten" class="tinymce-editor">{!! $berita->konten !!}</textarea>
                </div>
            </div>
            <div class="modal-footer border-top p-4 bg-white" style="border-radius: 0 0 20px 20px;">
                <button type="button" class="btn btn-light fw-bold px-4 rounded-pill" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn-premium btn-blue px-5 shadow">💾 SIMPAN PERUBAHAN</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>

<script>
    // PERBAIKAN FATAL: Mematikan proteksi modal Bootstrap agar kolom TinyMCE bisa di-klik & diketik
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });

    $(document).ready(function() {
        // Inisialisasi editor saat halaman dimuat
        initTinyMCE();
        
        // Memastikan Editor render ulang secara benar saat Modal dibuka
        $('.modal').on('shown.bs.modal', function() {
            $(document).off('focusin.modal'); // Hack spesifik untuk Bootstrap Modal
        });
    });

    function initTinyMCE() {
        tinymce.init({
            selector: '.tinymce-editor',
            height: 400,
            plugins: 'lists link image preview table wordcount',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
            menubar: false,
            branding: false,
            promotion: false,
            content_style: 'body { font-family: "Plus Jakarta Sans", sans-serif; font-size:15px; color: #1e293b; }'
        });
    }
</script>
@endpush