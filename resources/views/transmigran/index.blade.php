@extends('layouts.app')

@section('title', 'Daftar Transmigran')

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
    
    /* Custom Blue Buttons (Senada dengan halaman UPT) */
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

    /* Modern Filter Bar (Gabungan Search + Select) */
    .filter-bar {
        background: #f8fafc; border: 1px solid var(--border-color); border-radius: 16px;
        padding: 8px; display: flex; align-items: center; flex-wrap: wrap; gap: 8px;
    }
    .filter-input-group {
        display: flex; align-items: center; flex: 1; min-width: 200px;
        background: white; border-radius: 10px; border: 1px solid var(--border-color); padding: 4px 12px;
    }
    .filter-input-group i { color: var(--text-muted); margin-right: 8px; }
    .filter-input-group input, .filter-input-group select {
        border: none; background: transparent; outline: none; width: 100%; padding: 6px; font-size: 0.85rem; color: var(--text-main);
    }
    .btn-filter-submit {
        background: var(--navy-dark); color: white; border: none; border-radius: 10px;
        padding: 10px 24px; font-weight: 600; font-size: 0.85rem; transition: 0.2s;
    }
    .btn-filter-submit:hover { background: #1e293b; transform: translateY(-1px); }

    /* Table Styling Utama */
    .table-container { border-radius: 12px; border: 1px solid var(--border-color); overflow-x: auto; }
    .table-modern { margin-bottom: 0; white-space: nowrap; }
    
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
    .kepala-keluarga { font-weight: 800; color: var(--navy-dark); font-size: 0.95rem; margin-bottom: 4px; display: block; line-height: 1.3; }
    .asal-daerah { font-size: 0.8rem; font-weight: 600; color: #475569; }
    .lokasi-info { display: flex; align-items: center; gap: 4px; font-size: 0.85rem; font-weight: 700; color: var(--navy-dark); margin-bottom: 4px;}
    .kecamatan-info { font-size: 0.7rem; color: var(--text-muted); }
    
    /* Badges */
    .badge-anggota { display: inline-flex; align-items: center; background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; border-radius: 6px; font-size: 0.65rem; font-weight: 700; padding: 3px 8px; }
    .badge-year { display: inline-block; background: #f1f5f9; border: 1px solid var(--border-color); border-radius: 6px; padding: 4px 10px; font-size: 0.75rem; font-weight: 800; color: var(--navy-dark); }
    
    .status-pill { padding: 4px 12px; border-radius: 50px; font-weight: 800; font-size: 0.65rem; letter-spacing: 0.5px; border: 1px solid transparent; }
    .status-aktif { background: #f0fdf4; color: #166534; border-color: #bbf7d0; }
    .status-pindah { background: #fffbeb; color: #b45309; border-color: #fef08a; }
    .status-wafat { background: #fef2f2; color: #dc2626; border-color: #fecaca; }

    /* Action Buttons */
    .action-group { display: flex; justify-content: flex-end; gap: 5px; }
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
            <h3 class="page-title mb-1">Daftar Warga Transmigran</h3>
            <p class="text-muted small mb-0"><i class="bi bi-people-fill text-primary me-1"></i>Manajemen populasi dan persebaran penduduk transmigrasi Provinsi Jambi.</p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('transmigran.pdf', request()->query()) }}" target="_blank" class="btn-blue-solid" style="background-color: #dc2626; box-shadow: 0 4px 6px rgba(220, 38, 38, 0.15);">
                <i class="bi bi-file-earmark-pdf-fill fs-5"></i> Cetak PDF
            </a>
            <a href="{{ route('transmigran.create') }}" class="btn-blue-outline shadow-sm">
                <span class="icon-circle"><i class="bi bi-plus"></i></span> Tambah Warga
            </a>
        </div>
    </div>

    <div class="premium-card mb-4">
        <div class="p-4 border-bottom bg-white">
            <form action="{{ route('transmigran.index') }}" method="GET" class="filter-bar">
                
                {{-- Search Box --}}
                <div class="filter-input-group" style="flex: 2;">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" placeholder="Cari nama kepala keluarga..." value="{{ request('search') }}">
                </div>
                
                {{-- Dropdown Kabupaten --}}
                <div class="filter-input-group">
                    <i class="bi bi-geo-alt"></i>
                    <select name="kabupaten_id">
                        <option value="">Semua Wilayah</option>
                        @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" {{ request('kabupaten_id') == $kab->id ? 'selected' : '' }}>{{ $kab->nama_kabupaten }}</option>
                        @endforeach
                    </select>
                </div>
                
                {{-- Input Tahun --}}
                <div class="filter-input-group" style="flex: 0.5;">
                    <i class="bi bi-calendar3"></i>
                    <input type="number" name="tahun" placeholder="Tahun" value="{{ request('tahun') }}">
                </div>
                
                <button type="submit" class="btn-filter-submit"><i class="bi bi-funnel-fill me-1"></i> Filter Data</button>
            </form>
        </div>

        <div class="p-4">
            <div class="table-container">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" width="50">NO</th>
                            <th style="min-width: 220px;">KEPALA KELUARGA</th>
                            <th style="min-width: 150px;">ASAL DAERAH</th>
                            <th style="min-width: 200px;">LOKASI PENEMPATAN</th>
                            <th class="text-center">TAHUN</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-end pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transmigrans as $index => $item)
                        <tr>
                            <td class="text-center">
                                <span style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; background:#f1f5f9; border-radius:6px; font-size:0.75rem; font-weight:800; color:#64748b;">
                                    {{ $transmigrans->firstItem() + $index }}
                                </span>
                            </td>
                            
                            <td>
                                <span class="kepala-keluarga">{{ $item->nama_kepala_keluarga }}</span>
                                <span class="badge-anggota">
                                    <i class="bi bi-people-fill me-1"></i> {{ $item->jumlah_anggota }} Anggota
                                </span>
                            </td>
                            
                            <td>
                                <span class="asal-daerah">{{ $item->asal_daerah }}</span>
                            </td>
                            
                            <td>
                                <div class="lokasi-info">
                                    <i class="bi bi-geo-alt-fill text-danger"></i> {{ $item->nama_desa ?? '-' }}
                                </div>
                                <div class="kecamatan-info">
                                    Kec. {{ $item->kabupaten->nama_kabupaten ?? '-' }}
                                </div>
                            </td>
                            
                            <td class="text-center">
                                <span class="badge-year">{{ $item->tahun_penempatan }}</span>
                            </td>
                            
                            <td class="text-center">
                                @if($item->status == 'Aktif')
                                    <span class="status-pill status-aktif">AKTIF</span>
                                @elseif($item->status == 'Pindah')
                                    <span class="status-pill status-pindah">PINDAH</span>
                                @else
                                    <span class="status-pill status-wafat">WAFAT</span>
                                @endif
                            </td>
                            
                            <td class="pe-4">
                                <div class="action-group">
                                    <a href="{{ route('transmigran.edit', $item->id) }}" class="btn-action edit" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('transmigran.destroy', $item->id) }}" method="POST" id="form-hapus-{{ $item->id }}" class="m-0">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn-action delete" onclick="konfirmasiHapus('{{ $item->id }}', '{{ $item->nama_kepala_keluarga }}')" title="Hapus Data">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="bi bi-people" style="font-size:3.5rem; color:#cbd5e1; display:block; margin-bottom:12px;"></i>
                                <div style="font-weight:800; color:#475569; font-size:0.95rem; margin-bottom:4px;">Belum Ada Data Transmigran</div>
                                <div style="color:#94a3b8; font-size:0.8rem;">Silakan tambahkan data warga transmigran baru atau sesuaikan filter pencarian.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($transmigrans->hasPages())
        <div class="px-4 py-4 border-top bg-light bg-opacity-50 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <span class="text-muted small fw-bold mb-3 mb-md-0">
                Menampilkan <span class="text-dark">{{ $transmigrans->firstItem() }}</span> sampai <span class="text-dark">{{ $transmigrans->lastItem() }}</span> dari <span class="text-dark">{{ $transmigrans->total() }}</span> entri
            </span>
            <div class="pagination-sm m-0">{{ $transmigrans->links('pagination::bootstrap-5') }}</div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function konfirmasiHapus(id, nama) {
        Swal.fire({
            title: 'Hapus Data Warga?',
            html: `Anda akan menghapus data warga atas nama <b>${nama}</b>.<br><small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>`,
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