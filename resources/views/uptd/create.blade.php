@extends('layouts.app')

@section('title', 'Tambah Rekap UPTD - SI Jambi')

@push('css')
<style>
    /* Styling Form Khusus */
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

    /* Card Aksentuasi Emerald */
    .card-modern {
        border-top: 5px solid #0f766e !important;
    }

    /* Container untuk field Angka agar lebih menarik */
    .stat-input-group {
        background-color: #f1f5f9;
        padding: 1.5rem;
        border-radius: 16px;
        border: 1px dashed #cbd5e1;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; margin-right: 15px;">
                <span style="font-size: 1.5rem;">🏢</span>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 800; color: #1e293b;">Input Data Agregat UPTD</h4>
                <p class="text-muted mb-0">Rekapitulasi tahunan populasi transmigran per wilayah UPTD.</p>
            </div>
        </div>

        <div class="card-modern p-4 p-md-5">
            <form action="{{ route('uptd.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="form-label">Pilih Kabupaten</label>
                    <select name="kabupaten_id" id="kabupaten_id" class="form-select" required>
                        <option value="">-- Pilih Kabupaten --</option>
                        @foreach($kabupatens as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kabupaten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Nama UPTD</label>
                    <select name="nama_uptd" id="nama_uptd" class="form-select" required>
                        <option value="">-- Pilih Kabupaten Terlebih Dahulu --</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tahun Laporan</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Contoh: 2023" required>
                </div>

                <div class="stat-input-group mb-5">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label text-success">Total Kepala Keluarga (KK)</label>
                            <div class="input-group">
                                <input type="number" name="total_kk" class="form-control" placeholder="0" required>
                                <span class="input-group-text bg-white">KK</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-primary">Total Anggota (Jiwa)</label>
                            <div class="input-group">
                                <input type="number" name="total_jiwa" class="form-control" placeholder="0" required>
                                <span class="input-group-text bg-white">Jiwa</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('uptd.index') }}" class="text-decoration-none fw-bold text-muted">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn-utama px-5 py-3 shadow-sm">
                        Simpan Laporan Agregat
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
        
        // Sensor 1: Log ID Kabupaten
        console.log("1. Kabupaten yang dipilih ID: " + kabupatenID);
        
        $('#nama_uptd').empty();
        $('#nama_uptd').append('<option value="">-- Sedang Memuat... --</option>');

        if(kabupatenID) {
            $.ajax({
                url: '/get-uptd/' + kabupatenID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    // Sensor 2: Log Data Terpanggil
                    console.log("2. Data berhasil ditangkap: ", data);
                    
                    $('#nama_uptd').empty();
                    
                    if(data.length > 0) {
                        $('#nama_uptd').append('<option value="">-- Pilih UPTD --</option>');
                        $.each(data, function(key, value) {
                            // Menyimpan string nama_uptd sesuai struktur tabel rekap
                            $('#nama_uptd').append('<option value="'+ value.nama_uptd +'">'+ value.nama_uptd +'</option>');
                        });
                    } else {
                        $('#nama_uptd').append('<option value="">-- Belum ada UPTD di Kabupaten ini --</option>');
                    }
                },
                error: function(xhr, status, error) {
                    // Sensor 3: Log Error
                    console.error("3. TERJADI ERROR: ", error);
                    console.error("Detail: ", xhr.responseText);
                    $('#nama_uptd').empty();
                    $('#nama_uptd').append('<option value="">-- Terjadi Kesalahan Sistem --</option>');
                }
            });
        } else {
            $('#nama_uptd').empty();
            $('#nama_uptd').append('<option value="">-- Pilih Kabupaten Terlebih Dahulu --</option>');
        }
    });
});
</script>
@endpush