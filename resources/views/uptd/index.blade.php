@extends('layouts.app')

@section('title', 'Data Penyerahan UPT - SI Transmigran Jambi')

@push('css')
<style>
    :root {
        --teal-primary: #0f766e;
        --teal-light: #f0fdfa;
        --navy-dark: #0f172a;
        --text-main: #334155;
        --text-muted: #64748b;
        --bg-body: #f8fafc;
        --border-color: #e2e8f0;
    }

    /* Container & Card */
    .premium-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }

    .page-title { font-weight: 800; color: var(--navy-dark); letter-spacing: -0.5px; }
    
    /* Custom Blue Buttons */
    .btn-blue-solid {
        background-color: #2b6cb0; color: #ffffff; border: none; border-radius: 12px;
        padding: 10px 24px; font-weight: 600; font-size: 0.9rem;
        display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s ease;
        box-shadow: 0 4px 6px rgba(43, 108, 176, 0.15);
    }
    .btn-blue-solid:hover { background-color: #2c5282; color: #ffffff; transform: translateY(-2px); }
    
    .btn-blue-outline {
        background-color: #ffffff; color: #2b6cb0; border: 2px solid #2b6cb0; border-radius: 12px;
        padding: 8px 20px 8px 12px; font-weight: 600; font-size: 0.9rem;
        display: inline-flex; align-items: center; gap: 10px; text-decoration: none; transition: all 0.2s ease;
    }
    .btn-blue-outline .icon-circle {
        background-color: #2b6cb0; color: #ffffff; border-radius: 50%; width: 24px; height: 24px;
        display: inline-flex; align-items: center; justify-content: center; font-size: 1.1rem;
    }
    .btn-blue-outline:hover { background-color: #ebf8ff; color: #2c5282; border-color: #2c5282; }
    .btn-blue-outline:hover .icon-circle { background-color: #2c5282; }

    /* Search Bar */
    .search-pill {
        background: #f8fafc; border: 1px solid var(--border-color); border-radius: 50px;
        padding: 4px 4px 4px 20px; display: flex; align-items: center; transition: 0.3s;
    }
    .search-pill:focus-within { background: white; border-color: var(--teal-primary); box-shadow: 0 0 0 4px var(--teal-light); }
    .search-pill input { border: none; background: transparent; outline: none; width: 100%; padding: 8px; color: var(--text-main); font-size: 0.9rem; }
    .search-pill button {
        background: var(--navy-dark); color: white; border: none; border-radius: 50px;
        padding: 8px 24px; font-weight: 600; transition: 0.2s; font-size: 0.85rem;
    }

    /* Table Styling Utama - DIRAPIKAN */
    .table-container { border-radius: 12px; border: 1px solid var(--border-color); overflow-x: auto; }
    .table-modern { margin-bottom: 0; white-space: nowrap; } /* Mencegah baris berantakan */
    
    .table-modern thead th {
        background: #f8fafc; color: #64748b; font-weight: 800; font-size: 0.7rem;
        text-transform: uppercase; letter-spacing: 0.05em; padding: 15px 12px;
        border-top: none; border-bottom: 2px solid var(--border-color); vertical-align: middle;
    }

    .table-modern tbody td {
        padding: 15px 12px; vertical-align: middle; color: var(--text-main);
        font-size: 0.85rem; border-bottom: 1px solid #f1f5f9; transition: background 0.15s;
    }
    .table-modern tbody tr:hover { background-color: #fafafa; }

    /* Elemen Dalam Tabel */
    .upt-name { font-weight: 800; color: var(--navy-dark); font-size: 0.95rem; margin-bottom: 4px; display: block; white-space: normal; line-height: 1.3; }
    .location-info { font-size: 0.75rem; color: var(--text-muted); display: flex; align-items: center; gap: 4px; margin-bottom: 6px; white-space: normal; }
    
    /* Box KK & Jiwa yang lebih rapi */
    .stat-wrapper { display: flex; justify-content: center; gap: 6px; }
    .stat-box {
        background: #f8fafc; border: 1px solid var(--border-color); border-radius: 8px;
        padding: 6px 10px; min-width: 55px; text-align: center;
    }
    .stat-box.success { background: #f0fdfa; border-color: #ccfbf1; }
    .stat-val { font-weight: 800; color: var(--navy-dark); font-size: 0.85rem; line-height: 1; }
    .stat-box.success .stat-val { color: var(--teal-primary); }
    .stat-label { font-size: 0.6rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-top: 3px; display: block; }
    .stat-box.success .stat-label { color: #5eead4; }

    /* Badges */
    .badge-year { display: inline-block; background: #f1f5f9; color: #475569; border-radius: 6px; font-size: 0.65rem; font-weight: 700; padding: 3px 8px; }
    .badge-def { background: var(--teal-light); color: var(--teal-primary); padding: 2px 7px; border-radius: 4px; font-size: 0.6rem; font-weight: 800; }
    .badge-non { background: #fffbeb; color: #b45309; padding: 2px 7px; border-radius: 4px; font-size: 0.6rem; font-weight: 800; }
    .badge-pola { display: inline-block; background: #f1f5f9; border: 1px solid var(--border-color); border-radius: 4px; padding: 1px 6px; font-size: 0.65rem; font-weight: 700; color: #334155; }
    
    .alert-permasalahan {
        background: #fef2f2; border: 1px solid #fecaca; border-radius: 6px;
        padding: 6px 8px; font-size: 0.65rem; color: #dc2626; line-height: 1.4; margin-top: 4px; white-space: normal;
    }

    /* Action Buttons (E-Arsip & Edit/Delete) */
    .action-group { display: flex; justify-content: center; gap: 5px; }
    
    .arsip-btn {
        width: 30px; height: 30px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; 
        font-size: 0.85rem; text-decoration: none; transition: all 0.2s;
    }
    .arsip-btn.doc-pdf { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
    .arsip-btn.doc-pdf:hover { background: #dc2626; color: white; transform: translateY(-2px); }
    .arsip-btn.doc-img { background: #e0e7ff; color: #2563eb; border: 1px solid #bfdbfe; }
    .arsip-btn.doc-img:hover { background: #2563eb; color: white; transform: translateY(-2px); }
    .arsip-btn.disabled { background: #f8fafc; color: #cbd5e1; border: 1px solid var(--border-color); cursor: not-allowed; }

    .btn-action {
        width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center;
        border: 1px solid transparent; font-size: 0.8rem; text-decoration: none; transition: 0.2s; cursor: pointer;
    }
    .btn-action.edit { background: var(--teal-light); color: var(--teal-primary); border-color: #ccfbf1; }
    .btn-action.edit:hover { background: var(--teal-primary); color: white; }
    .btn-action.delete { background: #fef2f2; color: #dc2626; border-color: #fecaca; }
    .btn-action.delete:hover { background: #dc2626; color: white; }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h3 class="page-title mb-1">Daftar Penyerahan UPT</h3>
            <p class="text-muted small mb-0"><i class="bi bi-pin-map-fill text-danger me-1"></i>Rekapitulasi data penempatan awal dan realisasi desa transmigrasi.</p>
        </div>
        <div class="d-flex gap-3">
            <button type="button" class="btn-blue-solid" data-bs-toggle="modal" data-bs-target="#modalCetakUptd">
                <i class="bi bi-cloud-arrow-down-fill fs-5"></i> Export Data
            </button>
            <a href="{{ route('uptd.create') }}" class="btn-blue-outline shadow-sm">
                <span class="icon-circle"><i class="bi bi-plus"></i></span> Input UPT Baru
            </a>
        </div>
    </div>

    <div class="premium-card">
        <div class="p-4 border-bottom bg-white">
            <form action="{{ route('uptd.index') }}" method="GET" class="w-100">
                <div class="search-pill">
                    <i class="bi bi-search text-muted"></i>
                    <input type="text" name="search" placeholder="Cari Nama UPT, Desa Baru, Kecamatan, atau No. Berita Acara..." value="{{ request('search') }}">
                    <button type="submit">Cari Data</button>
                </div>
            </form>
        </div>

        <div class="p-4">
            <div class="table-container">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" width="50">NO</th>
                            <th style="min-width: 220px;">UPT & LOKASI</th>
                            <th class="text-center">PENEMPATAN</th>
                            <th class="text-center">POPULASI AWAL</th>
                            <th class="text-center">REALISASI DESA</th>
                            <th style="min-width: 180px;">ADMINISTRASI</th>
                            <th class="text-center">E-ARSIP</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($uptds as $index => $u)
                        <tr>
                            {{-- NO --}}
                            <td class="text-center">
                                <span style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; background:#f1f5f9; border-radius:6px; font-size:0.75rem; font-weight:800; color:#64748b;">
                                    {{ $uptds->firstItem() + $index }}
                                </span>
                            </td>

                            {{-- UPT & LOKASI --}}
                            <td>
                                <span class="upt-name">{{ $u->nama_upt }}</span>
                                <div class="location-info">
                                    <i class="bi bi-geo-alt-fill text-danger" style="font-size:0.65rem;"></i>
                                    Kec. {{ $u->kecamatan->nama_kecamatan ?? '-' }}, {{ $u->kabupaten->nama_kabupaten ?? '-' }}
                                </div>
                                <span class="badge-year">Tahun Serah: {{ $u->tahun_penyerahan }}</span>
                            </td>

                            {{-- PENEMPATAN --}}
                            <td class="text-center">
                                <div style="font-weight:700; color:var(--navy-dark); font-size:0.85rem;">{{ $u->waktu_penempatan }}</div>
                            </td>

                            {{-- POPULASI AWAL --}}
                            <td class="text-center">
                                <div class="stat-wrapper">
                                    <div class="stat-box">
                                        <span class="stat-val">{{ number_format($u->kk_awal) }}</span>
                                        <span class="stat-label">KK</span>
                                    </div>
                                    <div class="stat-box">
                                        <span class="stat-val">{{ number_format($u->jiwa_awal) }}</span>
                                        <span class="stat-label">Jiwa</span>
                                    </div>
                                </div>
                            </td>

                            {{-- REALISASI DESA BARU --}}
                            <td class="text-center">
                                <div style="margin-bottom:6px;">
                                    <span style="font-weight:800; color:var(--teal-primary); font-size:0.85rem;">{{ $u->nama_desa_baru }}</span>
                                    <span class="{{ $u->status_desa == 'DEF' ? 'badge-def' : 'badge-non' }} ms-1">{{ $u->status_desa }}</span>
                                </div>
                                <div class="stat-wrapper">
                                    <div class="stat-box success">
                                        <span class="stat-val">{{ number_format($u->kk_baru) }}</span>
                                        <span class="stat-label">KK</span>
                                    </div>
                                    <div class="stat-box success">
                                        <span class="stat-val">{{ number_format($u->jiwa_baru) }}</span>
                                        <span class="stat-label">Jiwa</span>
                                    </div>
                                </div>
                            </td>

                            {{-- ADMINISTRASI --}}
                            <td>
                                <div style="font-size:0.75rem; font-weight:700; color:var(--navy-dark); margin-bottom:2px;">
                                    <i class="bi bi-file-earmark-check-fill text-teal-primary me-1"></i> {{ $u->no_ba_penyerahan }}
                                </div>
                                <div style="font-size:0.7rem; color:var(--text-muted);">
                                    Pola: <span class="badge-pola">{{ $u->pola ?: '-' }}</span>
                                </div>
                                @if($u->permasalahan && $u->permasalahan != '-')
                                <div class="alert-permasalahan">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $u->permasalahan }}
                                </div>
                                @endif
                            </td>

                            {{-- E-ARSIP --}}
                            <td class="text-center">
                                <div class="action-group">
                                    @if($u->file_sk_penyerahan)
                                        <a href="{{ asset('arsip_uptd/' . $u->file_sk_penyerahan) }}" target="_blank" title="Lihat SK Penyerahan" class="arsip-btn doc-pdf"><i class="bi bi-file-earmark-pdf-fill"></i></a>
                                    @else
                                        <span title="SK Penyerahan Belum Diupload" class="arsip-btn disabled"><i class="bi bi-file-earmark-x"></i></span>
                                    @endif

                                    @if($u->file_sk_penempatan)
                                        <a href="{{ asset('arsip_uptd/' . $u->file_sk_penempatan) }}" target="_blank" title="Lihat SK Penempatan" class="arsip-btn doc-pdf"><i class="bi bi-file-earmark-pdf-fill"></i></a>
                                    @else
                                        <span title="SK Penempatan Belum Diupload" class="arsip-btn disabled"><i class="bi bi-file-earmark-x"></i></span>
                                    @endif

                                    @if($u->file_peta_lokasi)
                                        <a href="{{ asset('arsip_uptd/' . $u->file_peta_lokasi) }}" target="_blank" title="Lihat Peta Lokasi" class="arsip-btn doc-img"><i class="bi bi-image-fill"></i></a>
                                    @else
                                        <span title="Peta Lokasi Belum Diupload" class="arsip-btn disabled"><i class="bi bi-image"></i></span>
                                    @endif
                                </div>
                            </td>

                            {{-- AKSI --}}
                            <td class="text-center">
                                <div class="action-group">
                                    <a href="{{ route('uptd.edit', $u->id) }}" class="btn-action edit" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('uptd.destroy', $u->id) }}" method="POST" id="form-hapus-{{ $u->id }}" class="m-0">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn-action delete" onclick="konfirmasiHapus('{{ $u->id }}', '{{ $u->nama_upt }}')" title="Hapus Data">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="bi bi-folder-x" style="font-size:3.5rem; color:#cbd5e1; display:block; margin-bottom:12px;"></i>
                                <div style="font-weight:800; color:#475569; font-size:0.95rem; margin-bottom:4px;">Belum Ada Data UPT</div>
                                <div style="color:#94a3b8; font-size:0.8rem;">Data penyerahan UPT belum tersedia atau tidak ditemukan.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($uptds->hasPages())
        <div class="px-4 py-4 border-top bg-light bg-opacity-50 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <span class="text-muted small fw-bold mb-3 mb-md-0">
                Menampilkan <span class="text-dark">{{ $uptds->firstItem() }}</span> sampai <span class="text-dark">{{ $uptds->lastItem() }}</span> dari <span class="text-dark">{{ $uptds->total() }}</span> entri
            </span>
            <div class="pagination-sm m-0">{{ $uptds->withQueryString()->links('pagination::bootstrap-5') }}</div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="modalCetakUptd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 24px;">
            <div class="modal-body p-4 text-center">
                <div class="mb-3 mx-auto bg-teal-50 rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: #f0fdfa;">
                    <i class="bi bi-cloud-download fs-2" style="color: var(--teal-primary);"></i>
                </div>
                <h5 class="fw-bold mb-2">Export Laporan</h5>
                <p class="text-muted small mb-4">Pilih format dokumen untuk data yang difilter saat ini.</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('uptd.pdf', request()->query()) }}" class="btn btn-danger py-2 fw-bold" style="border-radius: 12px; font-size: 0.9rem;">
                        <i class="bi bi-file-pdf-fill me-1"></i> DOWNLOAD PDF
                    </a>
                    <a href="{{ route('uptd.excel', request()->query()) }}" class="btn btn-success py-2 fw-bold" style="border-radius: 12px; font-size: 0.9rem;">
                        <i class="bi bi-file-excel-fill me-1"></i> DOWNLOAD EXCEL
                    </a>
                    <button type="button" class="btn btn-light py-2 fw-bold text-muted" data-bs-dismiss="modal" style="border-radius: 12px; font-size: 0.9rem;">BATAL</button>
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
            title: 'Hapus Data UPT?',
            html: `Anda akan menghapus data <b>${nama}</b>.<br><small class="text-muted">Data yang dihapus tidak dapat dipulihkan kembali.</small>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#f1f5f9',
            confirmButtonText: 'YA, HAPUS',
            cancelButtonText: '<span class="text-dark">BATAL</span>',
            reverseButtons: true,
            borderRadius: '20px',
            customClass: {
                confirmButton: 'rounded-pill px-4 py-2 shadow-sm',
                cancelButton: 'rounded-pill px-4 py-2'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-hapus-' + id).submit();
            }
        });
    }
</script>
@endpush