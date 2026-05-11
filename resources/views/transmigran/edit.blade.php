@extends('layouts.app')

@section('title', 'Edit Data Transmigran')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                
                <div class="card-header bg-white pt-4 border-0 px-4 px-md-5 text-center">
                    <h5 class="fw-bold mb-0" style="color: #0f766e; letter-spacing: 1px;">EDIT DATA TRANSMIGRAN</h5>
                    <p class="text-muted" style="font-size: 0.85rem;">Perbarui informasi biodata warga: <b>{{ $transmigran->nama_kepala_keluarga }}</b></p>
                    <hr class="mx-auto" style="width: 40px; height: 3px; background: #0f766e; border-radius: 10px; margin-top: 5px;">
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('transmigran.update', $transmigran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="p-3 mb-4 rounded-4" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                            <h6 class="fw-bold mb-3 text-primary border-bottom pb-2" style="font-size: 0.9rem;">
                                <i class="bi bi-person-badge-fill me-2"></i>I. Informasi Kepala Keluarga
                            </h6>
                            
                            <div class="mb-3">
                                <label class="fw-bold mb-1" style="font-size: 0.85rem;">Nama Kepala Keluarga <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kepala_keluarga" class="form-control shadow-sm" value="{{ $transmigran->nama_kepala_keluarga }}" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-1" style="font-size: 0.85rem;">Jumlah Anggota <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="jumlah_anggota" class="form-control shadow-sm" value="{{ $transmigran->jumlah_anggota }}" required min="1">
                                        <span class="input-group-text bg-white fw-bold text-muted">Jiwa</span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-1" style="font-size: 0.85rem;">Provinsi / Kota Asal <span class="text-danger">*</span></label>
                                    <input type="text" name="asal_daerah" class="form-control shadow-sm" value="{{ $transmigran->asal_daerah }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 mb-4 rounded-4" style="background-color: #f0fdf4; border: 1px solid #bbf7d0;">
                            <h6 class="fw-bold mb-3 text-success border-bottom pb-2" style="font-size: 0.9rem;">
                                <i class="bi bi-geo-alt-fill me-2"></i>II. Lokasi Penempatan di Jambi
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-1" style="font-size: 0.85rem;">Kabupaten Tujuan <span class="text-danger">*</span></label>
                                    <select id="kabupaten_id" name="kabupaten_id" class="form-select shadow-sm" required>
                                        <option value="">-- Pilih Kabupaten --</option>
                                        @foreach($kabupatens as $k)
                                            <option value="{{ $k->id }}" {{ $transmigran->kabupaten_id == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_kabupaten }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-1" style="font-size: 0.85rem;">Kecamatan <span class="text-danger">*</span></label>
                                    <select id="kecamatan_id" name="kecamatan_id" class="form-select shadow-sm" required>
                                        <option value="{{ $transmigran->kecamatan_id }}">{{ $transmigran->kecamatan->nama_kecamatan ?? 'Pilih Kecamatan' }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label class="fw-bold mb-1" style="font-size: 0.85rem;">Nama UPTD / Desa <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_desa" class="form-control shadow-sm" value="{{ $transmigran->nama_desa }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="fw-bold mb-1" style="font-size: 0.85rem;">Tahun Penempatan <span class="text-danger">*</span></label>
                                    <input type="number" name="tahun_penempatan" class="form-control shadow-sm" value="{{ $transmigran->tahun_penempatan }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold d-block mb-3 text-center text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">STATUS DOMISILI SAAT INI</label>
                            <div class="row g-2">
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="status" id="st_aktif" value="Aktif" {{ $transmigran->status == 'Aktif' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success w-100 py-2 fw-bold rounded-3 small" for="st_aktif">AKTIF</label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="status" id="st_pindah" value="Pindah" {{ $transmigran->status == 'Pindah' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-warning w-100 py-2 fw-bold rounded-3 small" for="st_pindah">PINDAH</label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="status" id="st_meninggal" value="Meninggal" {{ $transmigran->status == 'Meninggal' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger w-100 py-2 fw-bold rounded-3 small" for="st_meninggal">WAFAT</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-5 gap-3 pt-3 border-top">
                            <a href="{{ route('transmigran.index') }}" class="btn btn-light px-4 py-2 shadow-sm text-muted fw-bold" style="border-radius: 50px; font-size: 0.85rem; border: 1px solid #e2e8f0;">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn text-white px-5 py-2 shadow fw-bold" style="background-color: #0f766e; border-radius: 50px; font-size: 0.85rem;">
                                <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#kabupaten_id').on('change', function() {
            var kabID = $(this).val();
            $('#kecamatan_id').empty().append('<option value="">Memuat...</option>');

            if(kabID) {
                $.ajax({
                    url: "{{ url('/get-kecamatan') }}/" + kabID, 
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        $('#kecamatan_id').empty().append('<option value="">-- Pilih Kecamatan --</option>');
                        $.each(res, function(key, item) {
                            $('#kecamatan_id').append('<option value="'+ item.id +'">'+ item.nama_kecamatan +'</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endpush