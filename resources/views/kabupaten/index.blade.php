@extends('layouts.app')

@section('title', 'Master Kabupaten - SI Jambi')

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
        box-shadow: 0 12px 32px -4px rgba(0, 0, 0, 0.04), 0 4px 16px -4px rgba(0, 0, 0, 0.02);
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
    }
    
    .btn-blue { 
        background: var(--blue-primary); color: white; border: 1px solid var(--blue-primary); 
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2); 
    }
    .btn-blue:hover { 
        background: var(--blue-hover); border-color: var(--blue-hover);
        transform: translateY(-2px); box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3); color: white; 
    }

    /* Search Bar Kapsul (Full Width) */
    .search-pill {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        padding: 6px 6px 6px 20px;
        display: flex; align-items: center;
        transition: 0.3s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        width: 100%;
    }
    .search-pill:focus-within { border-color: var(--blue-primary); box-shadow: 0 0 0 4px var(--blue-light); }
    .search-pill input { border: none; background: transparent; outline: none; box-shadow: none; font-size: 0.95rem; width: 100%; padding-left: 12px; color: var(--text-main); }
    .search-pill button {
        background: var(--navy-dark); color: white; border: none;
        border-radius: 50px; padding: 10px 30px; font-weight: 600; font-size: 0.9rem; transition: 0.2s; white-space: nowrap;
    }

    /* Tabel Modern */
    .table-responsive { border-radius: 16px; margin: 20px; border: 1px solid var(--border-color); }
    .table-modern { margin-bottom: 0; white-space: nowrap; }
    
    .table-modern thead th {
        background: #f8fafc;
        color: #475569;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        border-bottom: 2px solid #e2e8f0;
        padding: 16px 12px;
        vertical-align: middle;
    }

    .table-modern tbody td {
        padding: 16px 12px;
        vertical-align: middle;
        color: var(--text-main);
        font-size: 0.85rem;
        border-bottom: 1px solid var(--border-color);
    }
    .table-modern tbody tr:hover { background-color: #f1f5f9; }

    /* Action Buttons */
    .action-btn {
        width: 34px; height: 34px; border-radius: 10px;
        display: inline-flex; align-items: center; justify-content: center;
        border: none; background: #f1f5f9; color: #64748b; transition: 0.2s;
        cursor: pointer;
    }
    .action-btn.edit:hover { background: #eff6ff; color: #2563eb; transform: scale(1.05); }
    .action-btn.delete:hover { background: #fef2f2; color: #dc2626; transform: scale(1.05); }

    /* Form Modern in Modal */
    .form-control-premium {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 15px;
        background: #f8fafc;
        transition: 0.3s;
    }
    .form-control-premium:focus {
        background: white; border-color: var(--blue-primary); box-shadow: 0 0 0 4px var(--blue-light);
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="page-title mb-1">Master Kabupaten</h1>
            <p class="text-muted small mb-0"><i class="bi bi-map-fill me-1"></i>Kelola daftar Kabupaten di Provinsi Jambi.</p>
        </div>
        <button class="btn-premium btn-blue shadow" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle-fill fs-5"></i> Tambah Kabupaten
        </button>
    </div>

    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm mb-4 fw-bold d-flex align-items-center" style="border-radius: 12px; background: #fee2e2; color: #991b1b;">
            <i class="bi bi-exclamation-octagon-fill me-2 fs-5"></i> {{ session('error') }}
        </div>
    @endif

    <div class="premium-card mb-5">
        
        <div class="p-4 border-bottom border-light">
            <form action="{{ route('kabupaten.index') }}" method="GET" class="w-100">
                <div class="search-pill">
                    <i class="bi bi-search text-muted fs-5"></i>
                    <input type="text" name="search" placeholder="Cari nama kabupaten..." value="{{ request('search') }}">
                    <button type="submit shadow-sm">Cari Data</button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th>Nama Kabupaten</th>
                        <th class="text-center" width="15%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kabupatens as $index => $k)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $kabupatens->firstItem() + $index }}</td>
                        <td>
                            <div class="fw-bold text-dark" style="font-size: 1rem;"><i class="bi bi-geo-alt text-muted me-2"></i>{{ $k->nama_kabupaten }}</div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="action-btn edit" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $k->id }}" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button type="button" class="action-btn delete btn-hapus-sweet" 
                                        data-id="{{ $k->id }}" 
                                        data-nama="{{ $k->nama_kabupaten }}" title="Hapus">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <div class="mb-3"><i class="bi bi-geo text-slate-200" style="font-size: 3rem;"></i></div>
                            <h6 class="fw-bold text-slate-700">Belum Ada Data Kabupaten</h6>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($kabupatens->hasPages())
        <div class="px-4 py-3 border-top border-light d-flex justify-content-between align-items-center bg-white">
            <span class="text-muted small fw-bold">Menampilkan {{ $kabupatens->firstItem() }} - {{ $kabupatens->lastItem() }}</span>
            <div class="pagination-sm m-0">{{ $kabupatens->links('pagination::bootstrap-5') }}</div>
        </div>
        @endif
    </div>
</div>

@foreach($kabupatens as $k)
<div class="modal fade" id="modalEdit{{ $k->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('kabupaten.update', $k->id) }}" method="POST" class="modal-content" style="border-radius: 24px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            @csrf @method('PUT')
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="fw-bold text-dark">Edit Nama Kabupaten</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-muted text-uppercase">Nama Kabupaten</label>
                    <input type="text" name="nama_kabupaten" class="form-control form-control-premium" value="{{ $k->nama_kabupaten }}" required>
                </div>
                <button type="submit" class="btn btn-blue w-100 py-3 fw-bold mt-2" style="border-radius: 15px;">SIMPAN PERUBAHAN</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('kabupaten.store') }}" method="POST" class="modal-content" style="border-radius: 24px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            @csrf
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="fw-bold text-dark">Tambah Kabupaten Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-muted text-uppercase">Nama Kabupaten</label>
                    <input type="text" name="nama_kabupaten" class="form-control form-control-premium" placeholder="Misal: Merangin" required>
                </div>
                <button type="submit" class="btn btn-blue w-100 py-3 fw-bold mt-2" style="border-radius: 15px;">SIMPAN DATA</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.btn-hapus-sweet').on('click', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');

            Swal.fire({
                title: 'Hapus Kabupaten?',
                html: `Apakah Anda yakin ingin menghapus <b>${nama}</b>?<br><span class="text-danger small">Menghapus data ini akan gagal jika masih ada data Kecamatan atau UPTD yang terhubung.</span>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#f1f5f9',
                confirmButtonText: 'Ya, Hapus Data',
                cancelButtonText: '<span class="text-dark">Batal</span>',
                reverseButtons: true,
                borderRadius: '16px',
                customClass: {
                    confirmButton: 'rounded-pill px-4 shadow-sm',
                    cancelButton: 'rounded-pill px-4'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let formAction = "{{ route('kabupaten.destroy', ':id') }}".replace(':id', id);
                    let form = $('<form action="' + formAction + '" method="POST">@csrf @method("DELETE")</form>');
                    $('body').append(form);
                    form.submit();
                }
            });
        });
    });
</script>
@endpush