@extends('layouts.app')

@section('title', 'Log Aktivitas - SI Jambi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">📹 Log Aktivitas Sistem</h3>
        <p class="text-muted">Pantau semua perubahan data yang dilakukan oleh Admin & Operator.</p>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary">WAKTU KEJADIAN</th>
                        <th class="text-secondary">PELAKU</th>
                        <th class="text-secondary">AKSI</th>
                        <th class="text-secondary">MODUL</th>
                        <th class="text-secondary">DETAIL KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y - H:i:s') }}</td>
                        <td class="fw-bold text-primary">{{ $log->user->name ?? 'User Dihapus' }}</td>
                        <td>
                            @if($log->aksi == 'Tambah') <span class="badge bg-success">Tambah</span>
                            @elseif($log->aksi == 'Edit') <span class="badge bg-warning text-dark">Edit</span>
                            @else <span class="badge bg-danger">Hapus</span>
                            @endif
                        </td>
                        <td>{{ $log->modul }}</td>
                        <td>{{ $log->keterangan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada aktivitas yang terekam.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection