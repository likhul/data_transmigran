@extends('layouts.app')

@section('title', 'Riwayat Mutasi - SI Transmigran Jambi')

@push('css')
<style>
    /* Badge Mutasi Modern (Soft UI) */
    .badge-mutasi { 
        padding: 0.6em 1em; 
        border-radius: 50px; 
        font-weight: 700; 
        font-size: 0.75rem; 
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border: 1px solid transparent;
    }
    .bg-masuk-soft { background-color: #ecfdf5; color: #059669; border-color: #bbf7d0; }
    .bg-keluar-soft { background-color: #fffbeb; color: #d97706; border-color: #fef3c7; }

    /* Desain Kolom Tanggal */
    .date-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 5px 10px;
        display: inline-block;
        text-align: center;
        min-width: 100px;
    }
    .date-day { font-weight: 800; color: #1e293b; display: block; font-size: 1rem; }
    .date-month { font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: 600; }

    /* Kustom Tabel Mutasi */
    .table-mutasi thead th { 
        background-color: #f8fafc; 
        color: #64748b; 
        font-size: 0.75rem; 
        text-transform: uppercase; 
        letter-spacing: 1px;
        padding: 1.2rem 1rem;
    }
    .tr-mutasi { transition: all 0.2s; }
    .tr-mutasi:hover { background-color: #f1f5f9; transform: scale(1.002); }

    /* Tombol Aksi Minimalis */
    .btn-circle-mutasi {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: 0.3s;
    }
    .btn-edit-mutasi { background-color: #eff6ff; color: #2563eb; }
    .btn-edit-mutasi:hover { background-color: #2563eb; color: white; }
    .btn-delete-mutasi { background-color: #fff1f2; color: #e11d48; }
    .btn-delete-mutasi:hover { background-color: #e11d48; color: white; }
</style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 style="font-weight: 800; color: #1e293b; letter-spacing: -1px;">Riwayat Mutasi Warga</h3>
            <p class="text-muted mb-0">Log aktivitas perpindahan transmigran masuk dan keluar wilayah Jambi.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-success shadow-sm fw-bold" style="border-radius: 12px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#modalCetakMutasi">
                <span class="me-1">🖨️</span> Cetak / Export
            </button>
            <a href="{{ route('mutasi.create') }}" class="btn-utama text-decoration-none shadow-sm">
                <span class="me-1">+</span> Catat Mutasi
            </a>
        </div>
    </div>
    
    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 12px;" role="alert">
            <div class="d-flex align-items-center">
                <span class="me-2">✨</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
        <div class="card-body p-4">
            <form action="{{ route('mutasi.index') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <label class="form-label small fw-bold text-muted">Cari Nama Kepala Keluarga</label>
                    <input type="text" name="search" class="form-control" style="border-radius: 10px; padding: 0.6rem 1rem;" placeholder="Ketik nama untuk mencari..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted">Jenis Pergerakan</label>
                    <select name="jenis" class="form-select" style="border-radius: 10px; padding: 0.6rem 1rem;">
                        <option value="">-- Semua Pergerakan --</option>
                        <option value="Masuk" {{ request('jenis') == 'Masuk' ? 'selected' : '' }}>📥 Mutasi Masuk (Datang)</option>
                        <option value="Keluar" {{ request('jenis') == 'Keluar' ? 'selected' : '' }}>📤 Mutasi Keluar (Pindah)</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-utama w-100 py-2">🔍 Filter</button>
                    <a href="{{ route('mutasi.index') }}" class="btn btn-light w-100 py-2 border fw-bold" style="border-radius: 10px;">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card-modern overflow-hidden border-0 mb-5">
        <div class="table-responsive">
            <table class="table table-mutasi align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center">Tanggal</th>
                        <th>Warga / Kepala Keluarga</th>
                        <th class="text-center">Tipe Mutasi</th>
                        <th>Keterangan / Alasan</th>
                        <th class="text-center">Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mutasis as $m)
                    <tr class="tr-mutasi">
                        <td class="text-center">
                            <div class="date-box">
                                <span class="date-day">{{ \Carbon\Carbon::parse($m->tanggal_mutasi)->format('d') }}</span>
                                <span class="date-month">{{ \Carbon\Carbon::parse($m->tanggal_mutasi)->format('M Y') }}</span>
                            </div>
                        </td>

                        <td>
                            <div style="font-weight: 700; color: #1e293b; font-size: 1rem;">
                                {{ $m->transmigran->nama_kepala_keluarga ?? 'Data Terhapus' }}
                            </div>
                            <div style="font-size: 0.8rem; color: #64748b;">
                                Asal: {{ $m->transmigran->asal_daerah ?? '-' }}
                            </div>
                        </td>

                        <td class="text-center">
                            @if($m->jenis_mutasi == 'Masuk')
                                <span class="badge-mutasi bg-masuk-soft">📥 Masuk</span>
                            @else
                                <span class="badge-mutasi bg-keluar-soft">📤 Keluar</span>
                            @endif
                        </td>

                        <td style="max-width: 300px;">
                            <p class="mb-0 text-muted" style="font-size: 0.9rem; font-style: italic;">
                                "{{ $m->keterangan ?? 'Tidak ada catatan tambahan' }}"
                            </p>
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('mutasi.edit', $m->id) }}" class="btn-circle-mutasi btn-edit-mutasi" title="Ubah Data">
                                    ✏️
                                </a>
                                <form action="{{ route('mutasi.destroy', $m->id) }}" method="POST" id="form-hapus-{{ $m->id }}">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="button" class="border-0" style="background: transparent;" onclick="konfirmasiHapus('{{ $m->id }}')">
                                        <span style="font-size: 1.2rem;">🗑️</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <div style="font-size: 3.5rem; margin-bottom: 1rem;">🛰️</div>
                            <h5 class="fw-bold">Belum ada riwayat pergerakan.</h5>
                            <p class="small">Data mutasi warga akan muncul di sini setelah Anda menambahkannya.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
                {{ $mutasis->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCetakMutasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <div class="modal-header border-0 pb-0 text-center d-block position-relative">
                    <h5 class="modal-title fw-bold w-100">Cetak Laporan Mutasi</h5>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-4 pt-3">
                    <div class="d-grid gap-3">
                        <a href="{{ route('mutasi.pdf', request()->all()) }}" class="btn btn-danger py-3 fw-bold" style="border-radius: 12px;">
                            <span style="font-size: 1.8rem; display: block; margin-bottom: 5px;">📄</span>
                            Dokumen PDF
                        </a>
                        <a href="{{ route('mutasi.export', request()->all()) }}" class="btn btn-success py-3 fw-bold" style="border-radius: 12px;">
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