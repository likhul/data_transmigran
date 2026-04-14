@extends('layouts.app')

@section('title', 'Input Penyerahan UPTD')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                
                <div class="card-header bg-white pt-4 border-0 px-4 px-md-5">
                    <h4 class="fw-bold text-center mb-4" style="color: #0f766e;">INPUT DATA PENYERAHAN UPTD</h4>
                    
                    <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                        <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 50%;"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2 small fw-bold text-muted">
                        <span id="labelStep1" class="text-success">Langkah 1: Identitas & Penempatan</span>
                        <span id="labelStep2">Langkah 2: Realisasi & Desa Baru</span>
                    </div>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('uptd.store') }}" method="POST" id="wizardForm">
                        @csrf
                        
                        <div id="step1">
                            <div class="p-4 mb-4 rounded-4" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                <h6 class="fw-bold mb-4 text-primary border-bottom pb-2"><i class="bi bi-geo-alt-fill me-2"></i>I. Identitas Lokasi</h6>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Tahun Penyerahan <span class="text-danger">*</span></label>
                                    <input type="number" name="tahun_penyerahan" class="form-control form-control-lg shadow-sm" placeholder="Contoh: 1975" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Kabupaten <span class="text-danger">*</span></label>
                                    <select id="kabupaten_id" name="kabupaten_id" class="form-select form-control-lg shadow-sm" required>
                                        <option value="">-- Pilih Kabupaten --</option>
                                        @foreach($kabupatens as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kabupaten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Kecamatan <span class="text-danger">*</span></label>
                                    <select id="kecamatan_id" name="kecamatan_id" class="form-select form-control-lg shadow-sm" required disabled>
                                        <option value="">-- Pilih Kab. Dahulu --</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold small">UPT / Desa Trans <span class="text-danger">*</span></label>
                                    <select id="nama_upt" name="nama_upt" class="form-select form-control-lg shadow-sm" required disabled>
                                        <option value="">-- Pilih Kec. Dahulu --</option>
                                    </select>
                                </div>

                                <div class="mb-3 mt-4">
                                    <label class="small fw-bold">Bulan/Tahun Penempatan Awal <span class="text-danger">*</span></label>
                                    <input type="text" name="waktu_penempatan" class="form-control form-control-lg shadow-sm" placeholder="Contoh: 1967/1968" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold">KK Awal <span class="text-danger">*</span></label>
                                    <input type="number" name="kk_awal" class="form-control form-control-lg shadow-sm" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold">Jiwa Awal <span class="text-danger">*</span></label>
                                    <input type="number" name="jiwa_awal" class="form-control form-control-lg shadow-sm" required>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('uptd.index') }}" class="btn btn-light px-4 py-2 shadow-sm text-muted" style="border-radius: 50px; font-weight: 600; border: 1px solid #e2e8f0;">
                                    <i class="bi bi-x-circle me-2"></i> Batal
                                </a>
                                <button type="button" class="btn btn-primary px-4 py-2 shadow-sm" onclick="nextStep()" style="border-radius: 50px; font-weight: 600;">
                                    Lanjut Langkah 2 <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <div id="step2" style="display: none;">
                            <div class="p-4 mb-4 rounded-4" style="background-color: #f0fdf4; border: 1px solid #bbf7d0;">
                                <h6 class="fw-bold mb-4 text-success border-bottom pb-2"><i class="bi bi-check-circle-fill me-2"></i>II. Realisasi & Desa Baru</h6>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold text-success">Nama Desa Baru (Sekarang) <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_desa_baru" class="form-control form-control-lg shadow-sm" placeholder="Nama desa saat ini" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold text-success">Status <span class="text-danger">*</span></label>
                                    <select name="status_desa" class="form-select form-control-lg shadow-sm">
                                        <option value="DEF">DEF (Definitif)</option>
                                        <option value="SEM">SEM (Persiapan)</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold text-success">KK Saat Serah <span class="text-danger">*</span></label>
                                    <input type="number" name="kk_baru" class="form-control form-control-lg shadow-sm" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold text-success">Jiwa Saat Serah <span class="text-danger">*</span></label>
                                    <input type="number" name="jiwa_baru" class="form-control form-control-lg shadow-sm" required>
                                </div>

                                <div class="mb-3 mt-4">
                                    <label class="small fw-bold text-danger">No. Berita Acara Penyerahan <span class="text-danger">*</span></label>
                                    <input type="text" name="no_ba_penyerahan" class="form-control form-control-lg border-danger border-opacity-25 shadow-sm" placeholder="Contoh: NO.E.1193/I-VI-7/75" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold">Pola</label>
                                    <input type="text" name="pola" class="form-control form-control-lg shadow-sm" placeholder="Contoh: TU">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="small fw-bold">Keterangan / Masalah</label>
                                    <textarea name="permasalahan" class="form-control form-control-lg shadow-sm" rows="3" placeholder="Tuliskan catatan atau permasalahan jika ada..."></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4 gap-2">
                                <button type="button" class="btn btn-light px-4 py-2 shadow-sm text-muted" onclick="prevStep()" style="border-radius: 50px; font-weight: 600; border: 1px solid #e2e8f0;">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </button>
                                <div>
                                    <a href="{{ route('uptd.index') }}" class="btn btn-outline-secondary px-4 py-2 me-2" style="border-radius: 50px; font-weight: 600;">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn text-white px-5 py-2 shadow" style="background-color: #0f766e; border-radius: 50px; font-weight: 600;">
                                        <i class="bi bi-save me-2"></i> Simpan Data
                                    </button>
                                </div>
                            </div>
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
    // FUNGSI WIZARD 
    function nextStep() {
        let isValid = true;
        
        // Cek validasi hanya pada input/select di step 1 yang memiliki atribut required
        $('#step1 input[required], #step1 select[required]').each(function() {
            if ($(this).val() === '' || $(this).val() === null) {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $('#step1').fadeOut(250, function() {
                $('#step2').fadeIn(300);
                $('#progressBar').css('width', '100%');
                $('#labelStep2').addClass('text-success');
                $('#labelStep1').removeClass('text-success').addClass('text-muted');
            });
            // Scroll ke atas dengan halus
            $('html, body').animate({ scrollTop: $(".card-header").offset().top - 50 }, 300);
        } else {
            Swal.fire({ 
                icon: 'warning', 
                title: 'Data Belum Lengkap', 
                text: 'Silakan isi semua kolom yang bertanda bintang merah (*).',
                confirmButtonColor: '#0f766e'
            });
        }
    }

    function prevStep() {
        $('#step2').fadeOut(250, function() {
            $('#step1').fadeIn(300);
            $('#progressBar').css('width', '50%');
            $('#labelStep1').addClass('text-success').removeClass('text-muted');
            $('#labelStep2').removeClass('text-success');
        });
        $('html, body').animate({ scrollTop: $(".card-header").offset().top - 50 }, 300);
    }

    // FUNGSI AJAX DROPDOWN
    $(document).ready(function() {
        $('#kabupaten_id').on('change', function() {
            var kabID = $(this).val();
            $('#kecamatan_id').empty().append('<option value="">Memuat...</option>').prop('disabled', true);
            $('#nama_upt').empty().append('<option value="">-- Pilih Kec. Dahulu --</option>').prop('disabled', true);

            if(kabID) {
                $.ajax({
                    url: '/get-kecamatan/' + kabID, 
                    type: 'GET',
                    success: function(res) {
                        $('#kecamatan_id').empty().append('<option value="">-- Pilih Kecamatan --</option>').prop('disabled', false);
                        $.each(res, function(key, item) {
                            $('#kecamatan_id').append('<option value="'+ item.id +'">'+ item.nama_kecamatan +'</option>');
                        });
                    }
                });
            }
        });

        $('#kecamatan_id').on('change', function() {
            var kecID = $(this).val();
            $('#nama_upt').empty().append('<option value="">Memuat...</option>').prop('disabled', true);

            if(kecID) {
                $.ajax({
                    url: '/get-master-uptd/' + kecID,
                    type: 'GET',
                    success: function(res) {
                        $('#nama_upt').empty().append('<option value="">-- Pilih UPT / Desa --</option>').prop('disabled', false);
                        if(res.length === 0) {
                            $('#nama_upt').append('<option value="">(Data Master UPT Kosong)</option>');
                        } else {
                            $.each(res, function(key, item) {
                                $('#nama_upt').append('<option value="'+ item.nama_uptd +'">'+ item.nama_uptd +'</option>');
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endpush