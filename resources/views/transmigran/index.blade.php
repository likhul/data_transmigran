@extends('layouts.app')

@section('title', 'Daftar Transmigran - SI Jambi')

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

    /* Header & Tombol */
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
    
    /* Tombol Export (Biru Solid) */
    .btn-blue { 
        background: var(--blue-primary); color: white; border: 1px solid var(--blue-primary); 
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2); 
    }
    .btn-blue:hover { 
        background: var(--blue-hover); border-color: var(--blue-hover);
        transform: translateY(-2px); box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3); color: white; 
    }
    
    /* Tombol Input (Putih Border Biru) */
    .btn-outline-blue { 
        background: white; color: var(--blue-primary); border: 2px solid var(--blue-primary); 
    }
    .btn-outline-blue:hover { 
        background: var(--blue-light); color: var(--blue-hover); border-color: var(--blue-hover);
        transform: translateY(-2px); 
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

    /* Soft Badges */
    .soft-badge {
        padding: 6px 12px; border-radius: 8px; font-weight: 700; font-size: 0.7rem; text-transform: uppercase;
    }
    .bg-aktif-soft { background: #d1fae5; color: #065f46; }
    .bg-pindah-soft { background: #fef3c7; color: #92400e; }
    .bg-meninggal-soft { background: #fee2e2; color: #991b1b; }

    .action-btn {
        width: 34px; height: 34px; border-radius: 10px;
        display: inline-flex; align-items: center; justify-content: center;
        border: none; background: #f1f5f9; color: #64748b; transition: 0.2s;
        text-decoration: none;
    }
    .action-btn.edit:hover { background: #eff6ff; color: #2563eb; transform: scale(1.05); }
    .action-btn.delete:hover { background: #fef2f2; color: #dc2626; transform: scale(1.05); }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="page-title mb-1">Daftar Transmigran</h1>
            <p class="text-muted small mb-0"><i class="bi bi-people-fill me-1"></i>Manajemen data individu dan penempatan wilayah Jambi.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn-premium btn-blue" data-bs-toggle="modal" data-bs-target="#modalCetakPilihan">
                <i class="bi bi-printer-fill fs-5"></i> Cetak / Export
            </button>
            <a href="{{ route('transmigran.create') }}" class="btn-premium btn-outline-blue">
                <i class="bi bi-plus-circle-fill fs-5"></i> Tambah Data
            </a>
        </div>
    </div>

    <div class="premium-card mb-5">
        
        <div class="p-4 border-bottom border-light">
            <form action="{{ route('transmigran.index') }}" method="GET" class="w-100">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="search-pill">
                            <i class="bi bi-search text-muted fs-5"></i>
                            <input type="text" name="search" placeholder="Cari nama kepala keluarga, asal daerah, atau tahun..." value="{{ request('search') }}">
                            <button type="submit shadow-sm">Cari Data</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="kabupaten_id" class="form-select border-0 bg-light rounded-pill px-4 shadow-sm" style="font-size: 0.9rem;">
                            <option value="">-- Semua Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                                <option value="{{ $kab->id }}" {{ request('kabupaten_id') == $kab->id ? 'selected' : '' }}>{{ $kab->nama_kabupaten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th>Profil Kepala Keluarga</th>
                        <th>Asal Daerah</th>
                        <th>Penempatan Jambi</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transmigrans as $index => $item)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $transmigrans->firstItem() + $index }}</td>
                        <td>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">{{ $item->nama_kepala_keluarga }}</div>
                            <div class="text-muted small"><i class="bi bi-people me-1"></i>{{ $item->jumlah_anggota }} Anggota Keluarga</div>
                        </td>
                        <td>
                            <div class="fw-bold" style="font-size: 0.85rem; color: var(--text-main);">{{ $item->asal_daerah }}</div>
                        </td>
                        <td>
                            <div class="fw-bold" style="color: var(--blue-primary); font-size: 0.9rem;">{{ $item->kabupaten->nama_kabupaten }}</div>
                            <div class="text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ $item->uptd->nama_uptd ?? 'Umum' }}</div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border px-3 py-2" style="border-radius: 8px;">{{ $item->tahun_penempatan }}</span>
                        </td>
                        <td class="text-center">
                            @php
                                $statusClass = $item->status == 'Aktif' ? 'bg-aktif-soft' : ($item->status == 'Pindah' ? 'bg-pindah-soft' : 'bg-meninggal-soft');
                            @endphp
                            <span class="soft-badge {{ $statusClass }}">{{ $item->status }}</span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('transmigran.edit', $item->id) }}" class="action-btn edit" title="Edit Data">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('transmigran.destroy', $item->id) }}" method="POST" class="m-0">
                                    @csrf @method('DELETE')
                                    <button type="button" class="action-btn delete btn-konfirmasi-hapus">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="mb-3"><i class="bi bi-search text-slate-200" style="font-size: 3rem;"></i></div>
                            <h6 class="fw-bold text-slate-700">Data Tidak Ditemukan</h6>
                            <p class="text-muted small">Coba sesuaikan filter atau tambahkan data transmigran baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($transmigrans->hasPages())
        <div class="px-4 py-3 border-top border-light d-flex flex-column flex-md-row justify-content-between align-items-center bg-white">
            <span class="text-muted small fw-bold mb-3 mb-md-0">Menampilkan {{ $transmigrans->firstItem() }} - {{ $transmigrans->lastItem() }} dari {{ $transmigrans->total() }} Data</span>
            <div class="pagination-sm m-0">{{ $transmigrans->links('pagination::bootstrap-5') }}</div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="modalCetakPilihan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 24px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            <div class="modal-body p-4 text-center">
                <div class="mb-3 bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bi bi-file-earmark-arrow-down-fill fs-3 text-primary"></i>
                </div>
                <h6 class="fw-bold mb-2">Export Laporan</h6>
                <p class="text-muted small mb-4">Pilih format dokumen untuk data transmigran yang sedang difilter.</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('transmigran.pdf', request()->all()) }}" class="btn btn-outline-danger py-2 fw-bold" style="border-radius: 12px; font-size: 0.9rem;">
                        <i class="bi bi-file-pdf-fill me-1"></i> Dokumen PDF
                    </a>
                    <a href="{{ route('transmigran.export', request()->all()) }}" class="btn btn-outline-success py-2 fw-bold" style="border-radius: 12px; font-size: 0.9rem;">
                        <i class="bi bi-file-excel-fill me-1"></i> Spreadsheet Excel
                    </a>
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
        title: 'Hapus Data?',
        html: `Apakah Anda yakin ingin menghapus data transmigran ini?<br><span class="text-danger small">Tindakan ini tidak dapat diurungkan.</span>`,
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