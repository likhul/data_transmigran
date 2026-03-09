@extends('layouts.app')

@section('title', 'Tambah Data Transmigran - SI Jambi')

@push('css')
<style>
    /* Desain Label dan Input Modern */
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

    /* Kreatif: Radio Card untuk Status agar tidak kaku */
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

    .input-group-text {
        border: 2px solid #e2e8f0;
        border-left: none;
        border-radius: 0 12px 12px 0;
        background-color: #f1f5f9;
        font-weight: 700;
        color: #64748b;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; margin-right: 15px;">
                <span style="font-size: 1.5rem;">📝</span>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 800; color: #1e293b;">Form Tambah Data Transmigran</h4>
                <p class="text-muted mb-0">Silakan lengkapi data kepala keluarga dan lokasi penempatan.</p>
            </div>
        </div>

        <div class="card-modern p-4 p-md-5">
            @if($errors->any())
                <div class="alert alert-danger shadow-sm border-0" style="border-radius: 12px;">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('transmigran.store') }}" method="POST">
                @csrf 
                
                <div class="mb-4">
                    <label class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala_keluarga" class="form-control" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Jumlah Anggota Keluarga</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_anggota" class="form-control" style="border-radius: 12px 0 0 12px;" placeholder="4" required min="1">
                            <span class="input-group-text">Jiwa</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Asal Daerah</label>
                        <input type="text" name="asal_daerah" class="form-control" placeholder="Contoh: Jawa Tengah" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Kabupaten Penempatan</label>
                        <select name="kabupaten_id" id="kabupaten_id" class="form-select" required>
                            <option value="">-- Pilih Kabupaten --</option>
                            @foreach($kabupatens as $kab)
                                <option value="{{ $kab->id }}">{{ $kab->nama_kabupaten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama UPTD</label>
                        <select name="uptd_id" id="uptd_id" class="form-select" required>
                            <option value="">-- Pilih Kabupaten Terlebih Dahulu --</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tahun Penempatan</label>
                        <input type="number" name="tahun_penempatan" class="form-control" placeholder="Contoh: 2023" required>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="form-label">Status Domisili</label>
                    <div class="row g-3">
                        <div class="col-4">
                            <label class="w-100">
                                <input type="radio" name="status" value="Aktif" class="status-input" checked>
                                <div class="status-card aktif">Aktif</div>
                            </label>
                        </div>
                        <div class="col-4">
                            <label class="w-100">
                                <input type="radio" name="status" value="Pindah" class="status-input">
                                <div class="status-card pindah">Pindah</div>
                            </label>
                        </div>
                        <div class="col-4">
                            <label class="w-100">
                                <input type="radio" name="status" value="Meninggal" class="status-input">
                                <div class="status-card meninggal">Meninggal</div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('transmigran.index') }}" class="text-decoration-none fw-bold text-muted">
                        ← Kembali ke Daftar
                    </a>
                    <button type="submit" class="btn-utama px-5 py-3">
                        Simpan Data Transmigran
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
    $('#kabupaten_id').on('change', function() {
        var kabupatenID = $(this).val();
        
        // Reset dropdown UPTD
        $('#uptd_id').empty();
        $('#uptd_id').append('<option value="">-- Sedang Memuat... --</option>');

        if(kabupatenID) {
            $.ajax({
                url: '/get-uptd/' + kabupatenID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#uptd_id').empty();
                    
                    if(data.length > 0) {
                        $('#uptd_id').append('<option value="">-- Pilih UPTD --</option>');
                        $.each(data, function(key, value) {
                            $('#uptd_id').append('<option value="'+ value.id +'">'+ value.nama_uptd +'</option>');
                        });
                    } else {
                        $('#uptd_id').append('<option value="">-- Belum ada UPTD di Kabupaten ini --</option>');
                    }
                },
                error: function() {
                    $('#uptd_id').empty().append('<option value="">-- Gagal memuat data --</option>');
                }
            });
        } else {
            $('#uptd_id').empty();
            $('#uptd_id').append('<option value="">-- Pilih Kabupaten Terlebih Dahulu --</option>');
        }
    });
});
</script>
@endpush