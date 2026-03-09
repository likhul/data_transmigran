@extends('layouts.app')

@section('title', 'Data UPTD - SI Transmigran Jambi')

@push('css')
<style>
    /* Styling khusus agar tabel tidak kaku */
    .badge-tahun { 
        background-color: #f1f5f9; 
        color: #0f766e; 
        padding: 0.5em 0.8em; 
        border-radius: 8px; 
        font-weight: 700; 
        border: 1px solid #e2e8f0;
    }
    .td-uptd { font-weight: 700; color: #0f766e; font-size: 1rem; }
    .td-kabupaten { color: #64748b; font-weight: 500; font-size: 0.9rem; }
    
    /* Tombol Aksi Kustom */
    .btn-aksi { 
        width: 38px; 
        height: 38px; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        border-radius: 10px; 
        transition: 0.2s; 
        border: none;
    }
    .btn-edit-uptd { background-color: #ecfdf5; color: #059669; }
    .btn-edit-uptd:hover { background-color: #059669; color: white; }
    .btn-delete-uptd { background-color: #fef2f2; color: #dc2626; }
    .btn-delete-uptd:hover { background-color: #dc2626; color: white; }
</style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 style="font-weight: 800; color: #1e293b; letter-spacing: -1px;">Daftar Rekapitulasi UPTD</h3>
            <p class="text-muted mb-0">Manajemen laporan agregat tahunan per wilayah UPTD Provinsi Jambi.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-success shadow-sm fw-bold" style="border-radius: 12px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#modalCetakUptd">
                <span class="me-1">🖨️</span> Cetak / Export
            </button>
            <a href="{{ route('uptd.create') }}" class="btn-utama text-decoration-none shadow-sm">
                <span class="me-1">+</span> Tambah Rekap UPTD
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

    <div class="card-modern overflow-hidden border-0 mb-5">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" width="80">Tahun</th>
                        <th>Informasi UPTD & Wilayah</th>
                        <th>Populasi KK</th>
                        <th>Populasi Jiwa</th>
                        <th class="text-center" width="150">Opsi Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($uptds as $u)
                    <tr>
                        <td class="text-center">
                            <span class="badge-tahun">{{ $u->tahun }}</span>
                        </td>
                        <td>
                            <div class="td-uptd">{{ $u->nama_uptd }}</div>
                            <div class="td-kabupaten">Kab. {{ $u->kabupaten->nama_kabupaten ?? '-' }}</div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $u->total_kk }} <span class="text-muted fw-normal">KK</span></div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $u->total_jiwa }} <span class="text-muted fw-normal">Jiwa</span></div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('uptd.edit', $u->id) }}" class="btn-aksi btn-edit-uptd" title="Edit Laporan">
                                    <span style="font-size: 1.1rem;">✏️</span>
                                </a>

                                <form action="{{ route('uptd.destroy', $u->id) }}" method="POST" id="form-hapus-{{ $u->id }}">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn-aksi btn-delete-uptd" onclick="konfirmasiHapus('{{ $u->id }}')">
                                    <span style="font-size: 1.1rem;">🗑️</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">🏢</div>
                            <h5 class="text-muted">Belum ada data rekapitulasi UPTD.</h5>
                            <p class="small text-muted">Klik tombol "Tambah Rekap" untuk memulai pencatatan laporan tahunan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalCetakUptd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <div class="modal-header border-0 pb-0 text-center d-block position-relative">
                    <h5 class="modal-title fw-bold w-100">Cetak Laporan UPTD</h5>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-4 pt-3">
                    <div class="d-grid gap-3">
                        <a href="{{ route('uptd.pdf', request()->all()) }}" class="btn btn-danger py-3 fw-bold" style="border-radius: 12px;">
                            <span style="font-size: 1.8rem; display: block; margin-bottom: 5px;">📄</span>
                            Dokumen PDF
                        </a>
                        <a href="{{ route('uptd.export', request()->all()) }}" class="btn btn-success py-3 fw-bold" style="border-radius: 12px;">
                            <span style="font-size: 1.8rem; display: block; margin-bottom: 5px;">📊</span>
                            Spreadsheet Excel
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
    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mencari form berdasarkan ID dan melakukan submit
                document.getElementById('form-hapus-' + id).submit();
            }
        });
    }
</script>
@endpush