@extends('layouts.app')

@section('title', 'Manajemen Struktur Organisasi - SI Jambi')

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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    /* Header & Tombol Modern */
    .page-title { font-weight: 800; color: var(--navy-dark); letter-spacing: -0.5px; font-size: 1.5rem; }
    
    .btn-premium {
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.875rem;
        padding: 10px 20px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex; align-items: center; gap: 8px;
        text-decoration: none;
        border: none;
    }
    
    .btn-blue { background: var(--blue-primary); color: white; }
    .btn-blue:hover { background: var(--blue-hover); transform: translateY(-2px); color: white; }
    
    .btn-outline-custom { background: white; color: var(--text-main); border: 1px solid #e2e8f0; }
    .btn-outline-custom:hover { background: #f8fafc; border-color: #cbd5e1; transform: translateY(-2px); }

    /* Form Modern */
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

    /* Tabel Modern */
    .table-modern thead th {
        background: #f8fafc;
        color: #475569;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        border-bottom: 2px solid #e2e8f0;
        padding: 16px;
    }

    .table-modern tbody td {
        padding: 16px;
        vertical-align: middle;
        color: var(--text-main);
        border-bottom: 1px solid var(--border-color);
    }

    /* Profile Image in Table */
    .member-img {
        width: 55px; height: 55px; border-radius: 12px;
        object-fit: cover; border: 2px solid white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .action-btn-delete {
        width: 34px; height: 34px; border-radius: 10px;
        display: inline-flex; align-items: center; justify-content: center;
        border: none; background: #fef2f2; color: #dc2626; transition: 0.2s;
    }
    .action-btn-delete:hover { background: #fee2e2; transform: scale(1.1); }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="page-title mb-1">Struktur Organisasi</h1>
            <p class="text-muted small mb-0"><i class="bi bi-diagram-3-fill me-1"></i>Kelola daftar pejabat dan pengurus instansi.</p>
        </div>
        <a href="{{ route('profil.edit') }}" class="btn-premium btn-outline-custom">
            <i class="bi bi-arrow-left-circle"></i> Kembali ke Pengaturan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">✅ {{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="premium-card p-4">
                <h5 class="fw-bold mb-4" style="color: var(--navy-dark);"><i class="bi bi-plus-lg me-2 text-primary"></i>Tambah Anggota</h5>
                <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">NAMA LENGKAP</label>
                        <input type="text" name="nama" class="form-control form-control-premium" placeholder="Nama Tanpa Gelar" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">GELAR</label>
                        <input type="text" name="gelar" class="form-control form-control-premium" placeholder="Contoh: S.Kom, M.Si">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">JABATAN</label>
                        <input type="text" name="jabatan" class="form-control form-control-premium" placeholder="Contoh: Kepala Bidang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">URUTAN TAMPIL</label>
                        <input type="number" name="urutan" class="form-control form-control-premium" value="0">
                        <small class="text-muted" style="font-size: 0.7rem;">* Angka terkecil muncul paling pertama.</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">FOTO PROFIL</label>
                        <input type="file" name="foto" class="form-control form-control-premium" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-blue w-100 py-3 fw-bold shadow-sm" style="border-radius: 15px;">
                        <i class="bi bi-save-fill me-2"></i> SIMPAN ANGGOTA
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="premium-card">
                <div class="p-4 border-bottom border-light bg-light bg-opacity-50">
                    <h5 class="fw-bold mb-0" style="color: var(--navy-dark);">Daftar Pengurus Saat Ini</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">Urutan</th>
                                <th width="15%">Foto</th>
                                <th>Informasi Pejabat</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penguruses as $p)
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-bold">{{ $p->urutan }}</span>
                                </td>
                                <td>
                                    <img src="{{ asset('pengurus/'.$p->foto) }}" class="member-img">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 1rem;">{{ $p->nama }}{{ $p->gelar ? ', '.$p->gelar : '' }}</div>
                                    <div class="text-primary small fw-bold text-uppercase" style="letter-spacing: 0.5px;">{{ $p->jabatan }}</div>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('struktur.destroy', $p->id) }}" method="POST" class="btn-hapus-form">
                                        @csrf @method('DELETE')
                                        <button type="button" class="action-btn-delete btn-konfirmasi-hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="mb-3"><i class="bi bi-people text-slate-200" style="font-size: 3rem;"></i></div>
                                    <h6 class="fw-bold text-slate-700">Belum ada data pengurus.</h6>
                                    <p class="text-muted small">Silakan tambahkan data lewat form di samping.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.btn-konfirmasi-hapus').on('click', function() {
        let form = $(this).closest('form');
        Swal.fire({
            title: 'Hapus Anggota?',
            text: "Data pengurus ini akan dihapus permanen dari sistem.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#f1f5f9',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: '<span class="text-dark">Batal</span>',
            reverseButtons: true,
            borderRadius: '16px',
            customClass: {
                confirmButton: 'rounded-pill px-4 shadow-sm',
                cancelButton: 'rounded-pill px-4'
            }
        }).then((result) => {
            if (result.isConfirmed) { form.submit(); }
        });
    });
</script>
@endpush