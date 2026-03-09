@extends('layouts.app')

@section('title', 'Edit Mutasi - SI Jambi')

@push('css')
<style>
    /* Styling Form Modern Neo-Gov */
    .form-label { font-weight: 700; color: #475569; font-size: 0.9rem; margin-bottom: 0.6rem; }
    .form-control, .form-select { 
        border: 2px solid #e2e8f0; border-radius: 12px; padding: 0.75rem 1rem; 
        background-color: #f8fafc; transition: 0.3s;
    }
    .form-control:focus, .form-select:focus { 
        border-color: #0f766e; background-color: #ffffff; box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.1); 
    }

    /* Radio Card Kreatif untuk Jenis Mutasi */
    .mutasi-card {
        border: 2px solid #e2e8f0; border-radius: 12px; padding: 1.2rem;
        text-align: center; cursor: pointer; transition: 0.3s; background: white; display: block;
    }
    .mutasi-input { display: none; }
    
    .mutasi-input:checked + .mutasi-card.masuk { 
        border-color: #3b82f6; background-color: #eff6ff; color: #1e40af;
        transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.2);
    }
    .mutasi-input:checked + .mutasi-card.keluar { 
        border-color: #f59e0b; background-color: #fffbeb; color: #92400e;
        transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(245, 158, 11, 0.2);
    }
    .mutasi-title { font-weight: 800; display: block; font-size: 1.1rem; margin-top: 5px; }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; margin-right: 15px;">
                <span style="font-size: 1.5rem;">🔄</span>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 800; color: #1e293b;">Edit Riwayat Mutasi</h4>
                <p class="text-muted mb-0">Memperbarui catatan pergerakan warga transmigrasi.</p>
            </div>
        </div>

        <div class="card-modern p-4 p-md-5" style="border-top: 5px solid #0f766e !important;">
            <form action="{{ route('mutasi.update', $mutasi->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-4">
                    <label class="form-label">Nama Kepala Keluarga</label>
                    <select name="transmigran_id" class="form-select" required>
                        @foreach($transmigrans as $t)
                            <option value="{{ $t->id }}" {{ $mutasi->transmigran_id == $t->id ? 'selected' : '' }}>
                                {{ $t->nama_kepala_keluarga }} (Asal: {{ $t->asal_daerah }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Jenis Pergerakan (Mutasi)</label>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="w-100">
                                <input type="radio" name="jenis_mutasi" value="Masuk" class="mutasi-input" {{ $mutasi->jenis_mutasi == 'Masuk' ? 'checked' : '' }} required>
                                <div class="mutasi-card masuk">
                                    <span style="font-size: 1.8rem;">📥</span>
                                    <span class="mutasi-title">Mutasi Masuk</span>
                                    <small>Warga Datang / Menetap</small>
                                </div>
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="w-100">
                                <input type="radio" name="jenis_mutasi" value="Keluar" class="mutasi-input" {{ $mutasi->jenis_mutasi == 'Keluar' ? 'checked' : '' }} required>
                                <div class="mutasi-card keluar">
                                    <span style="font-size: 1.8rem;">📤</span>
                                    <span class="mutasi-title">Mutasi Keluar</span>
                                    <small>Warga Pindah / Pergi</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Tanggal Mutasi</label>
                        <input type="date" name="tanggal_mutasi" class="form-control" value="{{ $mutasi->tanggal }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Keterangan / Alasan</label>
                        <textarea name="keterangan" class="form-control" rows="1">{{ $mutasi->keterangan }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('mutasi.index') }}" class="text-decoration-none fw-bold text-muted">← Kembali</a>
                    <button type="submit" class="btn-utama px-5 py-3 shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection