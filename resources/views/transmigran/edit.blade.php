@extends('layouts.app')

@section('title', 'Edit Transmigran - SI Jambi')

@push('css')
<style>
    :root { --blue-primary: #2563eb; --navy-dark: #0f172a; }
    .premium-card { background: #fff; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); border: 1px solid #e2e8f0; padding: 40px; }
    .form-control-premium { border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px; background: #f8fafc; transition: 0.3s; }
    /* ... (CSS lain sama dengan create.blade.php) ... */
</style>
@endpush

@section('content')
<div class="row justify-content-center py-3">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center rounded-4 me-3" style="width: 50px; height: 50px; color: #f59e0b;"><i class="bi bi-pencil-square fs-3"></i></div>
            <div>
                <h4 class="fw-bold mb-0" style="color: var(--navy-dark);">Perbarui Profil Warga</h4>
                <p class="text-muted small mb-0">Mengedit data: <b>{{ $transmigran->nama_kepala_keluarga }}</b></p>
            </div>
        </div>

        <div class="premium-card">
            <form action="{{ route('transmigran.update', $transmigran->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala_keluarga" class="form-control-premium w-100" value="{{ $transmigran->nama_kepala_keluarga }}" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('transmigran.index') }}" class="text-decoration-none fw-bold text-muted small">← KEMBALI</a>
                    <button type="submit" class="btn-premium btn-blue shadow px-5 py-3">SIMPAN PERUBAHAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection