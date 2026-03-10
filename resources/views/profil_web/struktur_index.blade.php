@extends('layouts.app')

@section('title', 'Manajemen Struktur Organisasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">👥 Manajemen Struktur Organisasi</h3>
        <p class="text-muted">Tambahkan anggota kepengurusan untuk ditampilkan di halaman depan.</p>
    </div>
    <a href="{{ route('profil.edit') }}" class="btn btn-secondary px-4 fw-bold">
        <i class="bi bi-arrow-left"></i> Kembali ke Pengaturan
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Tambah Anggota</h5>
                <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Budi Darmawan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Gelar (Opsional)</label>
                        <input type="text" name="gelar" class="form-control" placeholder="Contoh: S.Kom, M.Si">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" placeholder="Contoh: Kepala Dinas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Urutan Tampil (Angka)</label>
                        <input type="number" name="urutan" class="form-control" value="0">
                        <small class="text-muted">Angka terkecil muncul pertama di slide.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Foto Profil</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mt-2">💾 Simpan Anggota</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Daftar Anggota Saat Ini</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Urutan</th>
                                <th>Foto</th>
                                <th>Nama & Jabatan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penguruses as $p)
                            <tr>
                                <td class="fw-bold text-center" style="width: 80px;">{{ $p->urutan }}</td>
                                <td style="width: 100px;">
                                    <img src="{{ asset('pengurus/'.$p->foto) }}" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $p->nama }}{{ $p->gelar ? ', '.$p->gelar : '' }}</div>
                                    <div class="text-primary small fw-bold">{{ $p->jabatan }}</div>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('struktur.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada data anggota.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection