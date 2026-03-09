@extends('layouts.app')

@section('title', 'Daftar Transmigran - SI Jambi')

@push('css')
<style>
    /* Desain Badge Status Kreatif */
    .badge-status { padding: 0.5em 0.8em; border-radius: 8px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; }
    .bg-aktif { background-color: #d1fae5; color: #065f46; }
    .bg-pindah { background-color: #fef3c7; color: #92400e; }
    .bg-meninggal { background-color: #fee2e2; color: #991b1b; }

    /* Input & Search Styling */
    .filter-card { border-radius: 16px; background: #ffffff; border: none; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
    .form-control-modern { 
        border: 2px solid #e2e8f0; 
        border-radius: 10px; 
        padding: 0.6rem 1rem; 
        transition: 0.3s; 
    }
    .form-control-modern:focus { border-color: #0f766e; box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.1); }
    
    /* Tombol Aksi */
    .btn-aksi-circle { width: 35px; height: 35px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; transition: 0.2s; border: none; }
    .btn-edit-modern { background-color: #fef3c7; color: #d97706; }
    .btn-edit-modern:hover { background-color: #d97706; color: white; }
    .btn-delete-modern { background-color: #fee2e2; color: #dc2626; }
    .btn-delete-modern:hover { background-color: #dc2626; color: white; }

    /* Table Typography */
    .table-modern thead th { 
        background-color: #f8fafc; 
        text-transform: uppercase; 
        font-size: 0.75rem; 
        letter-spacing: 0.05em; 
        color: #64748b; 
        border-bottom: 2px solid #e2e8f0;
    }
    .td-nama { font-weight: 700; color: #1e293b; font-size: 0.95rem; }
    .td-sub { font-size: 0.8rem; color: #64748b; }
</style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 style="font-weight: 800; color: #1e293b; letter-spacing: -1px;">Daftar Transmigran</h3>
            <p class="text-muted mb-0">Manajemen data individu dan penempatan wilayah Jambi.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-success shadow-sm fw-bold" style="border-radius: 12px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#modalCetakPilihan">
                <span class="me-1">🖨️</span> Cetak / Export
            </button>
            
            <button type="button" class="btn btn-warning shadow-sm fw-bold text-dark" style="border-radius: 12px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#modalImport">
                <span class="me-1">📤</span> Import
            </button>

            <a href="{{ route('transmigran.create') }}" class="btn-utama text-decoration-none shadow-sm">
                <span class="me-1">+</span> Tambah Data
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 12px;" role="alert">
            <div class="d-flex align-items-center">
                <span class="me-2">✅</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="card filter-card mb-4">
        <div class="card-body p-4">
            <form action="/transmigran" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-uppercase" style="color: #94a3b8;">Cari Nama</label>
                    <input type="text" name="search" class="form-control form-control-modern" placeholder="Masukkan nama kepala keluarga..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-uppercase" style="color: #94a3b8;">Filter Kabupaten</label>
                    <select name="kabupaten_id" class="form-select form-control-modern">
                        <option value="">-- Semua Wilayah --</option>
                        @foreach($kabupatens as $kab)
                            <option value="{{ $kab->id }}" {{ request('kabupaten_id') == $kab->id ? 'selected' : '' }}>
                                {{ $kab->nama_kabupaten }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-bold text-uppercase" style="color: #94a3b8;">Tahun</label>
                    <input type="number" name="tahun" class="form-control form-control-modern" placeholder="202X" value="{{ request('tahun') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-utama w-100 py-2">
                        🔍 Cari
                    </button>
                    <a href="/transmigran" class="btn btn-light w-100 py-2 border fw-bold" style="border-radius: 10px;">
                        Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card-modern overflow-hidden border-0 mb-5">
        <div class="table-responsive">
            <table class="table table-modern table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" width="50">No</th>
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
                            <td class="text-center text-muted small">{{ $index + 1 }}</td>
                            <td>
                                <div class="td-nama">{{ $item->nama_kepala_keluarga }}</div>
                                <div class="td-sub">{{ $item->jumlah_anggota }} Anggota Keluarga</div>
                            </td>
                            <td class="td-nama" style="font-size: 0.85rem;">{{ $item->asal_daerah }}</td>
                            <td>
                                <div class="fw-bold" style="color: #0f766e;">{{ $item->kabupaten->nama_kabupaten }}</div>
                                <div class="td-sub">{{ $item->uptd->nama_uptd ?? 'Umum' }}</div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border px-3 py-2" style="border-radius: 8px;">{{ $item->tahun_penempatan }}</span>
                            </td>
                            <td class="text-center">
                                @php
                                    $statusClass = '';
                                    if($item->status == 'Aktif') $statusClass = 'bg-aktif';
                                    elseif($item->status == 'Pindah') $statusClass = 'bg-pindah';
                                    else $statusClass = 'bg-meninggal';
                                @endphp
                                <span class="badge-status {{ $statusClass }}">{{ $item->status }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('transmigran.edit', $item->id) }}" class="btn-aksi-circle btn-edit-modern" title="Edit Data">
                                        ✏️
                                    </a>
                                    <form action="{{ route('transmigran.destroy', $item->id) }}" method="POST" class="form-hapus">
                                        @csrf @method('DELETE')
                                        <button type="button" class="btn-aksi-circle btn-delete-modern btn-konfirmasi-hapus">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div style="font-size: 3rem; margin-bottom: 1rem;">🔎</div>
                                <h5 class="text-muted">Tidak ada data transmigran ditemukan.</h5>
                                <p class="small text-muted">Coba ubah kata kunci pencarian atau filter Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalCetakPilihan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <div class="modal-header border-0 pb-0 text-center d-block position-relative">
                    <h5 class="modal-title fw-bold w-100">Pilih Format Laporan</h5>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-4 pt-3">
                    <p class="text-muted small mb-4">Laporan akan menyesuaikan dengan filter pencarian yang sedang aktif.</p>
                    
                    <div class="d-grid gap-3">
                        <a href="{{ route('transmigran.pdf', request()->all()) }}" class="btn btn-danger py-3 fw-bold" style="border-radius: 12px;">
                            <span style="font-size: 1.8rem; display: block; margin-bottom: 5px;">📄</span>
                            Dokumen PDF (Resmi)
                        </a>
                        
                        <a href="{{ route('transmigran.export', request()->all()) }}" class="btn btn-success py-3 fw-bold" style="border-radius: 12px;">
                            <span style="font-size: 1.8rem; display: block; margin-bottom: 5px;">📊</span>
                            Spreadsheet Excel (Data)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$('.btn-konfirmasi-hapus').on('click', function(e) {
    let form = $(this).closest('form');
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) { form.submit(); }
    });
});
</script>
@endpush