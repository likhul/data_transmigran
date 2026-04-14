@extends('layouts.app')

@section('title', 'Log Aktivitas - SI Jambi')

@push('css')
<style>
    .premium-card { background: #fff; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid #f1f5f9; overflow: hidden; }
    .table-modern thead th { background: #f8fafc; color: #475569; font-weight: 700; font-size: 0.7rem; text-transform: uppercase; padding: 16px; border-bottom: 2px solid #e2e8f0; }
    .table-modern tbody td { padding: 16px; border-bottom: 1px solid #f1f5f9; font-size: 0.85rem; color: #1e293b; }
    .badge-log { padding: 5px 10px; border-radius: 6px; font-weight: 800; font-size: 0.65rem; text-transform: uppercase; }
    .bg-tambah { background: #d1fae5; color: #065f46; }
    .bg-edit { background: #fef3c7; color: #92400e; }
    .bg-hapus { background: #fee2e2; color: #991b1b; }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">
    <div class="mb-4">
        <h1 class="fw-bold h3 mb-1" style="color: #0f172a;">Log Aktivitas Sistem</h1>
        <p class="text-muted small"><i class="bi bi-clock-history me-1"></i>Rekam jejak perubahan data yang dilakukan oleh tim Admin.</p>
    </div>

    <div class="premium-card">
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Waktu Kejadian</th>
                        <th>Pelaku</th>
                        <th>Aksi</th>
                        <th>Modul</th>
                        <th>Detail Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td class="text-muted">{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y, H:i') }}</td>
                        <td class="fw-bold text-primary">{{ $log->user->name ?? 'User Dihapus' }}</td>
                        <td>
                            @php $cls = $log->aksi == 'Tambah' ? 'bg-tambah' : ($log->aksi == 'Edit' ? 'bg-edit' : 'bg-hapus'); @endphp
                            <span class="badge-log {{ $cls }}">{{ $log->aksi }}</span>
                        </td>
                        <td class="fw-bold text-dark">{{ $log->modul }}</td>
                        <td class="text-muted small">{{ $log->keterangan }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data terekam.</td></tr>
                    @endforelse
                </tbody>
            </table>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $logs->links('pagination::bootstrap-5') }}
                </div>
        </div>
    </div>
</div>
@endsection