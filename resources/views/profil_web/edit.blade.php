@extends('layouts.app')

@section('title', 'Pengaturan Website Publik')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">⚙️ Pengaturan Website Publik</h3>
        <p class="text-muted small">Kelola informasi dasar, media, dan kontak yang tampil di halaman depan.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-body p-4">
        
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold px-4" data-bs-toggle="pill" data-bs-target="#tab-umum" type="button">📝 Info Umum</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold px-4" data-bs-toggle="pill" data-bs-target="#tab-media" type="button">🖼️ Media & Gambar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold px-4" data-bs-toggle="pill" data-bs-target="#tab-kontak" type="button">📞 Kontak & Sosmed</button>
            </li>
        </ul>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="tab-content" id="pills-tabContent">
                
                <div class="tab-pane fade show active" id="tab-umum">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Judul Website</label>
                        <input type="text" name="judul_website" class="form-control form-control-lg" value="{{ $profil->judul_website }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Deskripsi Singkat / Sambutan</label>
                        <textarea name="deskripsi_singkat" class="form-control" rows="5" placeholder="Tuliskan kata sambutan atau deskripsi singkat instansi...">{{ $profil->deskripsi_singkat }}</textarea>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-media">
                    <div class="row">
                        <div class="col-md-6 mb-4 border-end">
                            <label class="form-label fw-bold text-primary">Branding Website</label>
                            <div class="mb-4">
                                <label class="form-label small fw-bold">Logo Instansi</label>
                                @if($profil->logo_website)
                                    <div class="mb-2 p-2 bg-light rounded text-center"><img src="{{ asset('logo/' . $profil->logo_website) }}" height="60"></div>
                                @endif
                                <input type="file" name="logo_website" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold">Favicon (Ikon Tab Browser)</label>
                                @if($profil->favicon_website)
                                    <div class="mb-2 p-2 bg-light rounded text-center"><img src="{{ asset('logo/' . $profil->favicon_website) }}" height="30"></div>
                                @endif
                                <input type="file" name="favicon_website" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 px-md-4">
                            <label class="form-label fw-bold text-success">Manajemen Struktur Organisasi</label>
                            <div class="bg-light p-4 rounded text-center border">
                                <i class="bi bi-people-fill fs-1 text-success mb-3 d-block"></i>
                                <h6>Kelola Anggota Struktur</h6>
                                <p class="text-muted small">Input nama, gelar, jabatan, dan foto setiap orang untuk ditampilkan dalam slide di halaman depan.</p>
                                <a href="{{ route('struktur.index') }}" class="btn btn-success fw-bold px-4">
                                    🚀 Kelola Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-kontak">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Alamat Kantor</label>
                            <input type="text" name="alamat_kantor" class="form-control" value="{{ $profil->alamat_kantor }}" placeholder="Jl. Contoh No. 123...">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" class="form-control" value="{{ $profil->nomor_telepon }}" placeholder="0812...">
                        </div>
                        <hr class="my-3">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold text-primary"><i class="bi bi-facebook"></i> Link Facebook</label>
                            <input type="url" name="link_facebook" class="form-control" value="{{ $profil->link_facebook }}" placeholder="https://facebook.com/...">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold text-danger"><i class="bi bi-instagram"></i> Link Instagram</label>
                            <input type="url" name="link_instagram" class="form-control" value="{{ $profil->link_instagram }}" placeholder="https://instagram.com/...">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold text-danger"><i class="bi bi-youtube"></i> Link YouTube</label>
                            <input type="url" name="link_youtube" class="form-control" value="{{ $profil->link_youtube }}" placeholder="https://youtube.com/...">
                        </div>
                        <div class="col-12 mb-3 mt-3">
                            <label class="form-label fw-bold"><i class="bi bi-geo-alt"></i> Kode Embed Google Maps</label>
                            <textarea name="google_maps" class="form-control text-primary small" rows="3" placeholder="Paste kode <iframe> dari Google Maps di sini">{{ $profil->google_maps }}</textarea>
                            <div class="alert alert-info mt-2 py-2 small">
                                💡 <strong>Cara:</strong> Google Maps &rarr; Bagikan &rarr; Sematkan Peta &rarr; Salin HTML.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="my-4">
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-5 py-3 fw-bold shadow-sm" style="border-radius: 12px;">
                    💾 Simpan Perubahan Website
                </button>
            </div>
        </form>
    </div>
</div>
@endsection