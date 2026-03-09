@extends('layouts.app')

@section('title', 'Manajemen Admin - SI Jambi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">👥 Manajemen Pengguna</h3>
        <p class="text-muted">Atur hak akses Super Admin dan Operator UPTD.</p>
    </div>
    <button class="btn btn-primary fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
        + Tambah Akun Baru
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        ❌ {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary">NAMA PENGGUNA</th>
                        <th class="text-secondary">EMAIL</th>
                        <th class="text-secondary">PANGKAT (ROLE)</th>
                        <th class="text-secondary text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td class="fw-bold">{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            @if($admin->role == 'superadmin')
                                <span class="badge bg-danger px-3 py-2 rounded-pill">👑 Super Admin</span>
                            @else
                                <span class="badge bg-success px-3 py-2 rounded-pill">👤 Operator / Admin UPTD</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($admin->id !== auth()->id())
                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger fw-bold">Hapus</button>
                                </form>
                            @else
                                <span class="text-muted small italic">Akun Anda</span>
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
        <div class="modal-content" style="border-radius: 16px; border: none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Buat Akun Admin Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required placeholder="Contoh: Admin Merangin">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="Contoh: merangin@transmigran.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Lengkap</label>
                        <input type="password" name="password" class="form-control" required placeholder="Minimal 8 karakter">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Pilih Pangkat (Role)</label>
                        <select name="role" class="form-select" required>
                            <option value="admin">Operator UPTD (Hanya Kelola Data)</option>
                            <option value="superadmin">Super Admin (Bisa Hapus Data & Akun)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 12px;">Simpan Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection