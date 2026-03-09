@extends('layouts.app')

@section('title', 'Edit Profil Transmigran - SI Jambi')

@push('css')
<style>
    /* Styling Form Modern */
    .form-label { font-weight: 700; color: #475569; font-size: 0.9rem; margin-bottom: 0.6rem; }
    .form-control, .form-select { 
        border: 2px solid #e2e8f0; 
        border-radius: 12px; 
        padding: 0.75rem 1rem; 
        background-color: #f8fafc; 
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus { 
        border-color: #0f766e; 
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.1); 
    }

    /* Radio Card Status Kreatif */
    .status-card {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.8rem;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
        background: white;
        display: block;
        font-weight: 600;
    }
    .status-input { display: none; }
    .status-input:checked + .status-card.aktif { border-color: #16a34a; background-color: #f0fdf4; color: #166534; }
    .status-input:checked + .status-card.pindah { border-color: #ca8a04; background-color: #fefce8; color: #854d0e; }
    .status-input:checked + .status-card.meninggal { border-color: #dc2626; background-color: #fef2f2; color: #991b1b; }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; margin-right: 15px;">
                <span style="font-size: 1.5rem;">✏️</span>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 800; color: #1e293b;">Edit Profil Transmigran</h4>
                <p class="text-muted mb-0">Memperbarui data untuk warga: <strong>{{ $transmigran->nama_kepala_keluarga }}</strong></p>
            </div>
        </div>

        <div class="card-modern p-4 p-md-5">
            <form action="{{ route('transmigran.update', $transmigran->id) }}" method="POST">
                @csrf 
                @method('PUT') <div class="mb-4">
                    <label class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ $transmigran->nama_kepala_keluarga }}" required>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Jumlah Anggota Keluarga</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_anggota" class="form-control" style="border-radius: 12px 0 0 12px;" value="{{ $transmigran->jumlah_anggota }}" required min="1">
                            <span class="input-group-text" style="border: 2px solid #e2e8f0; border-left: none; border-radius: 0 12px 12px 0;">Jiwa</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Asal Daerah</label>
                        <input type="text" name="asal_daerah" class="form-control" value="{{ $transmigran->asal_daerah }}" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Kabupaten Penempatan</label>
                        <select name="kabupaten_id" id="kabupaten_id" class="form-select" required>
                            @foreach($kabupatens as $kab)
                                <option value="{{ $kab->id }}" {{ $transmigran->kabupaten_id == $kab->id ? 'selected' : '' }}>
                                    {{ $kab->nama_kabupaten }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama UPTD</label>
                        <select name="uptd_id" id="uptd_id" class="form-select" required>
                            <option value="{{ $transmigran->uptd_id }}">{{ $transmigran->uptd->nama_uptd ?? 'Pilih UPTD' }}</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tahun Penempatan</label>
                        <input type="number" name="tahun_penempatan" class="form-control" value="{{ $transmigran->tahun_penempatan }}" required>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="form-label">Update Status Domisili</label>
                    <div class="row g-3">
                        <div class="col-4">
                            <label class="w-100">
                                <input type="radio" name="status" value="Aktif" class="status-input" {{ $transmigran->status == 'Aktif' ? 'checked' : '' }}>
                                <div class="status-card aktif">Aktif</div>
                            </label>
                        </div>
                        <div class="col-4">
                            <label class="w-100">
                                <input type="radio" name="status" value="Pindah" class="status-input" {{ $transmigran->status == 'Pindah' ? 'checked' : '' }}>
                                <div class="status-card pindah">Pindah</div>
                            </label>
                        </div>
                        <div class="col-4">
                            <label class="w-100">
                                <input type="radio" name="status" value="Meninggal" class="status-input" {{ $transmigran->status == 'Meninggal' ? 'checked' : '' }}>
                                <div class="status-card meninggal">Meninggal</div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('transmigran.index') }}" class="text-decoration-none fw-bold text-muted">
                        ← Batalkan Perubahan
                    </a>
                    <button type="submit" class="btn-utama px-5 py-3">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Fungsi untuk mengambil data UPTD
    function loadUPTD(kabupatenID, selectedUPTD = null) {
        if(kabupatenID) {
            $('#uptd_id, #nama_uptd').empty().append('<option value="">-- Sedang Memuat... --</option>');
            $.ajax({
                url: '/get-uptd/' + kabupatenID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#uptd_id, #nama_uptd').empty().append('<option value="">-- Pilih UPTD --</option>');
                    $.each(data, function(key, value) {
                        // Cek apakah ID atau Nama ini yang sedang diedit
                        let isSelected = (value.id == selectedUPTD || value.nama_uptd == selectedUPTD) ? 'selected' : '';
                        
                        // Gunakan value.id untuk Transmigran, value.nama_uptd untuk Rekap UPTD
                        let optionValue = $('#uptd_id').length ? value.id : value.nama_uptd;
                        
                        $('#uptd_id, #nama_uptd').append('<option value="'+ optionValue +'" '+ isSelected +'>'+ value.nama_uptd +'</option>');
                    });
                }
            });
        }
    }

    // 1. Jalankan OTOMATIS saat halaman pertama kali dibuka
    let initialKabID = $('#kabupaten_id').val();
    let currentUPTD = "{{ $transmigran->uptd_id ?? ($uptd->nama_uptd ?? '') }}"; 
    if(initialKabID) {
        loadUPTD(initialKabID, currentUPTD);
    }

    // 2. Jalankan saat Kabupaten DIUBAH manual
    $('#kabupaten_id').on('change', function() {
        loadUPTD($(this).val());
    });
});
</script>
@endpush