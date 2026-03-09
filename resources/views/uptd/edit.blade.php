@extends('layouts.app')

@section('title', 'Edit Rekap UPTD - SI Jambi')

@push('css')
<style>
    .form-label { font-weight: 700; color: #475569; font-size: 0.9rem; margin-bottom: 0.6rem; }
    .form-control, .form-select { 
        border: 2px solid #e2e8f0; border-radius: 12px; padding: 0.75rem 1rem; 
        background-color: #f8fafc; transition: 0.3s;
    }
    .form-control:focus, .form-select:focus { 
        border-color: #0f766e; background-color: #ffffff; box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.1); 
    }
    .stat-edit-group {
        background: #f1f5f9; padding: 1.5rem; border-radius: 16px; border: 1px dashed #0f766e;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-white shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 12px; margin-right: 15px;">
                <span style="font-size: 1.5rem;">⚙️</span>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 800; color: #1e293b;">Edit Laporan Agregat UPTD</h4>
                <p class="text-muted mb-0">Memperbarui data rekapitulasi untuk tahun {{ $uptd->tahun }}.</p>
            </div>
        </div>

        <div class="card-modern p-4 p-md-5" style="border-top: 5px solid #0f766e !important;">
            <form action="{{ route('uptd.update', $uptd->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-4">
                    <label class="form-label">Kabupaten</label>
                    <select name="kabupaten_id" id="kabupaten_id" class="form-select" required>
                        @foreach($kabupatens as $k)
                            <option value="{{ $k->id }}" {{ $uptd->kabupaten_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kabupaten }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Nama UPTD</label>
                    <select name="nama_uptd" id="nama_uptd" class="form-select" required>
                        <option value="{{ $uptd->nama_uptd }}">{{ $uptd->nama_uptd }}</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tahun Laporan</label>
                    <input type="number" name="tahun" class="form-control" value="{{ $uptd->tahun }}" required>
                </div>

                <div class="stat-edit-group mb-5">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold text-success">Total KK</label>
                            <input type="number" name="total_kk" class="form-control" value="{{ $uptd->total_kk }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-primary">Total Jiwa</label>
                            <input type="number" name="total_jiwa" class="form-control" value="{{ $uptd->total_jiwa }}" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('uptd.index') }}" class="text-decoration-none fw-bold text-muted">← Kembali</a>
                    <button type="submit" class="btn-utama px-5 py-3 shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Fungsi untuk memuat UPTD
    function loadUPTD(kabID, selectedName = null) {
        if(kabID) {
            $.ajax({
                url: '/get-uptd/' + kabID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#nama_uptd').empty().append('<option value="">-- Pilih UPTD --</option>');
                    $.each(data, function(key, value) {
                        let isSelected = (value.nama_uptd == selectedName) ? 'selected' : '';
                        $('#nama_uptd').append('<option value="'+ value.nama_uptd +'" '+ isSelected +'>'+ value.nama_uptd +'</option>');
                    });
                }
            });
        }
    }

    // Jalankan saat pertama kali halaman dibuka (Page Load)
    loadUPTD($('#kabupaten_id').val(), "{{ $uptd->nama_uptd }}");

    // Jalankan saat Kabupaten diubah manual
    $('#kabupaten_id').on('change', function() {
        loadUPTD($(this).val());
    });
});
</script>
@endpush