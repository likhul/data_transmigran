@extends('layouts.app')

@section('title', 'Data Penyerahan UPTD - SI Transmigran Jambi')

@push('css')
<style>
    /* Konfigurasi Warna & Font Dasar (Sesuai Gambar Sidebar) */
    :root {
        --blue-primary: #2563eb; /* Biru terang untuk tombol/aksen */
        --blue-hover: #1d4ed8;
        --blue-light: #eff6ff;
        --navy-dark: #0f172a; /* Biru dongker gelap khas sidebar */
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
    
    /* Tombol Export (Warna Biru Solid) */
    .btn-blue { 
        background: var(--blue-primary); 
        color: white; 
        border: 1px solid var(--blue-primary); 
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2); 
    }
    .btn-blue:hover { 
        background: var(--blue-hover); 
        border-color: var(--blue-hover);
        transform: translateY(-2px); 
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3); 
        color: white; 
    }
    
    /* Tombol Input (Putih dengan Border Biru) */
    .btn-outline-blue { 
        background: white; 
        color: var(--blue-primary); 
        border: 2px solid var(--blue-primary); 
    }
    .btn-outline-blue:hover { 
        background: var(--blue-light); 
        color: var(--blue-hover); 
        border-color: var(--blue-hover);
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
    .search-pill input::placeholder { color: #94a3b8; }
    .search-pill button {
        background: var(--navy-dark); color: white; border: none;
        border-radius: 50px; padding: 10px 30px; font-weight: 600; font-size: 0.9rem; transition: 0.2s; white-space: nowrap;
    }
    .search-pill button:hover { background: #1e293b; }

    /* Tabel Modern */
    .table-responsive { border-radius: 16px; margin: 0 20px 20px 20px; border: 1px solid var(--border-color); }
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
        border-right: none; border-left: none;
    }

    .table-modern tbody td {
        padding: 16px 12px;
        vertical-align: middle;
        color: var(--text-main);
        font-size: 0.85rem;
        border-bottom: 1px solid var(--border-color);
        border-right: none; border-left: none;
    }
    .table-modern tbody tr:last-child td { border-bottom: none; }
    .table-modern tbody tr { transition: 0.2s; }
    .table-modern tbody tr:hover { background-color: #f1f5f9; }

    /* Soft Badges */
    .soft-badge {
        padding: 6px 12px; border-radius: 8px; font-weight: 700; font-size: 0.75rem; display: inline-block;
    }
    .badge-year { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
    .badge-blue { background: #eff6ff; color: #1d4ed8; }
    .badge-green { background: #f0fdf4; color: #15803d; }
    .badge-amber { background: #fffbeb; color: #b45309; }

    /* Typography Data */
    .text-upt-title { font-weight: 800; font-size: 0.95rem; color: var(--navy-dark); margin-bottom: 3px; }
    .text-upt-loc { font-size: 0.75rem; color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
    .data-value { font-weight: 800; font-size: 0.95rem; color: var(--navy-dark); }
    .data-label { font-size: 0.65rem; color: #94a3b8; font-weight: 600; margin-left: 2px; text-transform: uppercase; }

    /* Action Buttons Rounded */
    .action-btn {
        width: 34px; height: 34px; border-radius: 10px;
        display: inline-flex; align-items: center; justify-content: center;
        border: none; background: #f1f5f9; color: #64748b; transition: 0.2s;
        text-decoration: none;
    }
    .action-btn.edit:hover { background: #eff6ff; color: #2563eb; transform: scale(1.05); }
    .action-btn.delete:hover { background: #fef2f2; color: #dc2626; transform: scale(1.05); }

    /* Note Box */
    .note-box {
        background: #fff1f2; border: 1px dashed #fecdd3; color: #be123c;
        padding: 6px 10px; border-radius: 8px; font-size: 0.7rem; margin-top: 6px; white-space: normal; line-height: 1.4;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="page-title mb-1">Daftar Penyerahan UPTD</h1>
            <p class="text-muted small mb-0"><i class="bi bi-info-circle me-1"></i>Kelola data penempatan awal dan realisasi desa transmigrasi.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn-premium btn-blue" data-bs-toggle="modal" data-bs-target="#modalCetakUptd">
                <i class="bi bi-cloud-arrow-down-fill fs-5"></i> Export Data
            </button>
            
            <a href="{{ route('uptd.create') }}" class="btn-premium btn-outline-blue">
                <i class="bi bi-plus-circle-fill fs-5"></i> Input UPTD Baru
            </a>
        </div>
    </div>

    <div class="premium-card mb-5">
        
        <div class="p-4 border-bottom border-light">
            <form action="{{ route('uptd.index') }}" method="GET" class="w-100">
                <div class="search-pill">
                    <i class="bi bi-search text-muted fs-5"></i>
                    <input type="text" name="search" placeholder="Cari nama UPTD, Kecamatan, Kabupaten, atau No. BA..." value="{{ request('search') }}">
                    <button type="submit shadow-sm">Cari Data</button>
                </div>
            </form>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center" width="8%">Tahun</th>
                        <th width="22%">Unit & Lokasi Wilayah</th>
                        <th class="text-center" width="10%">Awal (Bln/Thn)</th>
                        <th class="text-center" width="15%">Populasi Awal</th>
                        <th class="text-center" width="15%">Kondisi Desa Baru</th>
                        <th width="18%">Data Administrasi</th>
                        <th class="text-center" width="7%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($uptds as $index => $u)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $uptds->firstItem() + $index }}</td>
                        
                        <td class="text-center">
                            <span class="soft-badge badge-year">{{ $u->tahun_penyerahan }}</span>
                        </td>
                        
                        <td>
                            <div class="text-upt-title">{{ $u->nama_upt }}</div>
                            <div class="text-upt-loc">
                                <i class="bi bi-geo-alt-fill text-danger opacity-75"></i> 
                                Kec. {{ $u->kecamatan->nama_kecamatan ?? '-' }}, {{ $u->kabupaten->nama_kabupaten ?? '-' }}
                            </div>
                        </td>

                        <td class="text-center">
                            <span class="soft-badge badge-blue">{{ $u->waktu_penempatan }}</span>
                        </td>
                        
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-3">
                                <div><span class="data-value">{{ number_format($u->kk_awal) }}</span><span class="data-label">KK</span></div>
                                <div><span class="data-value">{{ number_format($u->jiwa_awal) }}</span><span class="data-label">Jiwa</span></div>
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="fw-bold mb-2" style="color: #15803d;">{{ $u->nama_desa_baru }} 
                                <span class="soft-badge ms-1 {{ $u->status_desa == 'DEF' ? 'badge-green' : 'badge-amber' }}" style="font-size: 0.6rem; padding: 2px 6px;">
                                    {{ $u->status_desa }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-center gap-3 mt-1">
                                <div><span class="data-value text-success">{{ number_format($u->kk_baru) }}</span><span class="data-label text-success">KK</span></div>
                                <div><span class="data-value text-success">{{ number_format($u->jiwa_baru) }}</span><span class="data-label text-success">Jiwa</span></div>
                            </div>
                        </td>

                        <td>
                            <div class="fw-bold text-dark" style="font-size: 0.8rem;"><i class="bi bi-file-earmark-text me-1 text-muted"></i>{{ $u->no_ba_penyerahan }}</div>
                            <div class="text-muted mt-1" style="font-size: 0.75rem;">Pola: <span class="fw-bold text-dark">{{ $u->pola ?: '-' }}</span></div>
                            @if($u->permasalahan && $u->permasalahan != '-')
                                <div class="note-box"><i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $u->permasalahan }}</div>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('uptd.edit', $u->id) }}" class="action-btn edit" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <form action="{{ route('uptd.destroy', $u->id) }}" method="POST" id="form-hapus-{{ $u->id }}" class="m-0">
                                    @csrf @method('DELETE')
                                    <button type="button" class="action-btn delete" onclick="konfirmasiHapus('{{ $u->id }}', '{{ $u->nama_upt }}')" title="Hapus"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="mb-3">
                                <i class="bi bi-inbox text-slate-200" style="font-size: 3.5rem;"></i>
                            </div>
                            <h6 class="fw-bold text-slate-700 mb-1">Tidak Ada Data Ditemukan</h6>
                            <p class="text-muted small mb-4">Silakan sesuaikan kata kunci pencarian atau tambah data baru.</p>
                            <a href="{{ route('uptd.create') }}" class="btn-premium btn-blue"><i class="bi bi-plus-circle-fill"></i> Input Data UPTD</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($uptds->hasPages())
        <div class="px-4 py-3 border-top border-light d-flex flex-column flex-md-row justify-content-between align-items-center bg-white" style="border-radius: 0 0 24px 24px;">
            <span class="text-muted small fw-bold mb-3 mb-md-0">Menampilkan {{ $uptds->firstItem() }} - {{ $uptds->lastItem() }} dari {{ $uptds->total() }} Data</span>
            <div class="pagination-sm m-0">{{ $uptds->links('pagination::bootstrap-5') }}</div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="modalCetakUptd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            <div class="modal-body p-4 text-center">
                <div class="mb-3 bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bi bi-cloud-download fs-3 text-primary"></i>
                </div>
                <h6 class="fw-bold mb-2 text-dark">Export Data</h6>
                <p class="text-muted small mb-4">Pilih format unduhan untuk data yang sedang difilter.</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('uptd.pdf', request()->query()) }}" class="btn btn-outline-danger py-2 fw-bold" style="border-radius: 12px; font-size: 0.9rem;">
                        <i class="bi bi-file-pdf-fill me-1"></i> Cetak PDF
                    </a>
                    <a href="{{ route('uptd.excel', request()->query()) }}" class="btn btn-outline-success py-2 fw-bold" style="border-radius: 12px; font-size: 0.9rem;">
                        <i class="bi bi-file-excel-fill me-1"></i> Export Excel
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
    function konfirmasiHapus(id, nama) {
        Swal.fire({
            title: 'Hapus Data?',
            html: `Apakah Anda yakin ingin menghapus data <b>${nama}</b>?<br><span class="text-danger small">Tindakan ini tidak dapat diurungkan.</span>`,
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
                document.getElementById('form-hapus-' + id).submit();
            }
        });
    }
</script>
@endpush