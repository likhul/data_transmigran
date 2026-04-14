@extends('layouts.app')

@section('title', 'Tambah Transmigran - SI Jambi')

@push('css')
<style>
    :root { --blue-primary: #2563eb; --navy-dark: #0f172a; }
    .premium-card { background: #fff; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); border: 1px solid #e2e8f0; padding: 40px; }
    .form-label { font-weight: 700; color: var(--navy-dark); font-size: 0.85rem; text-transform: uppercase; margin-bottom: 8px; }
    .form-control-premium { border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 15px; background: #f8fafc; transition: 0.3s; }
    .form-control-premium:focus { background: #fff; border-color: var(--blue-primary); box-shadow: 0 0 0 4px var(--blue-light); }
    
    /* Radio Card Status */
    .status-input { display: none; }
    .status-card { border: 2px solid #e2e8f0; border-radius: 12px; padding: 12px; text-align: center; cursor: pointer; transition: 0.3s; font-weight: 700; background: white; }
    .status-input:checked + .status-card.aktif { border-color: #16a34a; background: #f0fdf4; color: #166534; }
    .status-input:checked + .status-card.pindah { border-color: #ca8a04; background: #fefce8; color: #854d0e; }
    .status-input:checked + .status-card.meninggal { border-color: #dc2626; background: #fef2f2; color: #991b1b; }
</style>
@endpush

@section('content')
<div class="row justify-content-center py-3">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center rounded-4 me-3" style="width: 50px; height: 50px; color: var(--blue-primary);"><i class="bi bi-person-plus-fill fs-3"></i></div>
            <div>
                <h4 class="fw-bold mb-0" style="color: var(--navy-dark);">Input Data Transmigran</h4>
                <p class="text-muted small mb-0">Lengkapi formulir untuk menambahkan warga baru.</p>
            </div>
        </div>

        <div class="premium-card">
            <form action="{{ route('transmigran.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala_keluarga" class="form-control-premium w-100" placeholder="Nama Lengkap" required>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_anggota" class="form-control-premium w-75" required min="1">
                            <span class="input-group-text border-0 bg-light rounded-end-3 fw-bold">Jiwa</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Asal Daerah</label>
                        <input type="text" name="asal_daerah" class="form-control-premium w-100" placeholder="Provinsi/Kota Asal" required>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Kabupaten</label>
                        <select name="kabupaten_id" id="kabupaten_id" class="form-select form-control-premium" required>
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab) <option value="{{ $kab->id }}">{{ $kab->nama_kabupaten }}</option> @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">UPTD / Desa</label>
                        <select name="uptd_id" id="uptd_id" class="form-select form-control-premium" required>
                            <option value="">-- Pilih Kab. Dahulu --</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 w-50">
                    <label class="form-label">Tahun Penempatan</label>
                    <input type="number" name="tahun_penempatan" class="form-control-premium w-100" placeholder="Contoh: 2023" required>
                </div>
                <div class="mb-5">
                    <label class="form-label d-block mb-3">Status Domisili</label>
                    <div class="row g-3">
                        <div class="col-4"><label class="w-100"><input type="radio" name="status" value="Aktif" class="status-input" checked><div class="status-card aktif">Aktif</div></label></div>
                        <div class="col-4"><label class="w-100"><input type="radio" name="status" value="Pindah" class="status-input"><div class="status-card pindah">Pindah</div></label></div>
                        <div class="col-4"><label class="w-100"><input type="radio" name="status" value="Meninggal" class="status-input"><div class="status-card meninggal">Meninggal</div></label></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('transmigran.index') }}" class="text-decoration-none fw-bold text-muted small">← BATALKAN</a>
                    <button type="submit" class="btn-premium btn-blue shadow px-5 py-3">SIMPAN DATA WARGA</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection