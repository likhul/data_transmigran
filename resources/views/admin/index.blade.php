@extends('layouts.app')

@section('title', 'Manajemen Admin - SI Jambi')

@push('css')
<style>
    :root {
        --blue-primary: #2563eb; --blue-hover: #1d4ed8; --blue-light: #eff6ff;
        --navy-dark: #0f172a; --text-main: #1e293b; --text-muted: #64748b;
    }
    
    .premium-card { background: #fff; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid #f1f5f9; overflow: hidden; }
    
    /* Tabel Standard */
    .table-modern thead th { background: #f8fafc; color: #475569; font-weight: 700; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 2px solid #e2e8f0; padding: 16px; }
    .table-modern tbody td { padding: 16px; vertical-align: middle; color: var(--text-main); border-bottom: 1px solid #f1f5f9; }
    
    .soft-badge { padding: 6px 12px; border-radius: 8px; font-weight: 700; font-size: 0.75rem; white-space: nowrap; }
    .badge-super { background: #fee2e2; color: #dc2626; }
    .badge-operator { background: #d1fae5; color: #065f46; }
    
    .btn-premium { border-radius: 12px; font-weight: 600; padding: 10px 20px; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; border: none; }
    .btn-blue { background: var(--blue-primary); color: white; }
    .btn-blue:hover { background: var(--blue-hover); transform: translateY(-2px); color: white; }
    
    .form-control-premium { border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px; background: #f8fafc; }
    .form-control-premium:focus { background: #fff; border-color: var(--blue-primary); box-shadow: 0 0 0 4px var(--blue-light); }

    /* =========================================
       PERBAIKAN RESPONSIVE KHUSUS MOBILE (HP) 
       ========================================= */
    @media (max-width: 768px) {
        .container-fluid { padding: 10px !important; }
        
        /* Mengecilkan header dan memposisikan tombol ke bawah (Stacking) */
        .page-header { flex-direction: column; align-items: flex-start !important; gap: 15px; }
        .page-header h1 { font-size: 1.4rem !important; }
        .btn-premium { width: 100%; justify-content: center; padding: 12px; font-size: 0.9rem; }
        
        /* Mengecilkan padding dan font pada Tabel agar tidak hancur */
        .table-modern thead th { padding: 10px; font-size: 0.65rem; }
        .table-modern tbody td { padding: 10px; font-size: 0.85rem; }
        
        /* Avatar diperkecil */
        .avatar-circle { width: 32px !important; height: 32px !important; }
        .avatar-circle i { font-size: 1rem !important; }
        
        /* Modal dipadatkan */
        .modal-body { padding: 20px !important; }
        .form-control-premium { padding: 10px; font-size: 0.85rem; }
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">
    <div class="d-flex justify-content-between align-items-center mb-4 page-header">
        <div>
            <h1 class="fw-bold h3 mb-1" style="color: var(--navy-dark);">Manajemen Pengguna</h1>
            <p class="text-muted small mb-0"><i class="bi bi-shield-lock-fill me-1"></i>Kelola hak akses Super Admin dan Operator Sistem.</p>
        </div>
        <button class="btn-premium btn-blue shadow" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
            <i class="bi bi-person-plus-fill fs-5"></i> Tambah Akun
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">✅ {{ session('success') }}</div>
    @endif

    <div class="premium-card">
        <div class="table-responsive text-nowrap">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Alamat Email</th>
                        <th>Pangkat (Role)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; color: var(--blue-primary); flex-shrink: 0;">
                                    <i class="bi bi-person-circle fs-5"></i>
                                </div>
                                <span class="fw-bold">{{ $admin->name }}</span>
                            </div>
                        </td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            @if($admin->role == 'superadmin')
                                <span class="soft-badge badge-super"><i class="bi bi-star-fill me-1"></i> Super Admin</span>
                            @else
                                <span class="soft-badge badge-operator"><i class="bi bi-person-badge me-1"></i> Operator</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($admin->id !== auth()->id())
                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Hapus akun ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-3 rounded-pill fw-bold">Hapus</button>
                                </form>
                            @else
                                <span class="badge bg-light text-muted border px-3 rounded-pill">Akun Anda</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahAdmin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.store') }}" method="POST" class="modal-content border-0 shadow-lg" style="border-radius: 24px;">
            @csrf
            <div class="modal-header border-0 p-3 p-md-4 pb-0">
                <h5 class="fw-bold">Buat Akun Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">NAMA LENGKAP</label>
                    <input type="text" name="name" class="form-control form-control-premium" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">EMAIL</label>
                    <input type="email" name="email" class="form-control form-control-premium" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">PASSWORD</label>
                    <input type="password" name="password" class="form-control form-control-premium" required>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted">HAK AKSES</label>
                    <select name="role" class="form-select form-control-premium" required>
                        <option value="admin">Operator UPTD</option>
                        <option value="superadmin">Super Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-blue w-100 py-2 py-md-3 fw-bold shadow-sm" style="border-radius: 15px;">SIMPAN AKUN</button>
            </div>
        </form>
    </div>
</div>
@endsection