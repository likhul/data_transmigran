@extends('layouts.app')

@section('title', 'Input Penyerahan UPT')

@push('css')
<style>
    /* Konfigurasi Warna Premium */
    :root {
        --teal-primary: #0f766e;
        --teal-light: #f0fdfa;
        --navy-dark: #0f172a;
        --bg-input: #f8fafc;
        --border-input: #cbd5e1;
    }

    /* Styling Form Input */
    .form-control-premium, .form-select-premium {
        background-color: var(--bg-input);
        border: 1px solid var(--border-input);
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        color: #334155;
    }
    .form-control-premium:focus, .form-select-premium:focus {
        background-color: #ffffff;
        border-color: var(--teal-primary);
        box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.1);
        outline: none;
    }
    .form-control-premium::placeholder { color: #94a3b8; font-size: 0.85rem; }

    /* Area File Upload */
    .upload-box {
        background: #ffffff; border: 1px dashed #cbd5e1; border-radius: 12px;
        padding: 15px; transition: 0.3s;
    }
    .upload-box:hover { border-color: var(--teal-primary); background: var(--teal-light); }
    .upload-box input[type="file"] { font-size: 0.8rem; }

    /* Tombol Navigasi */
    .btn-wizard {
        border-radius: 50px; font-weight: 700; padding: 12px 28px;
        letter-spacing: 0.5px; transition: all 0.3s ease; display: inline-flex; align-items: center;
    }
    .btn-teal-solid { background: var(--teal-primary); color: white; border: none; box-shadow: 0 4px 10px rgba(15, 118, 110, 0.2); }
    .btn-teal-solid:hover { background: #0d645d; color: white; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(15, 118, 110, 0.3); }
    .btn-outline-cancel { background: white; color: #64748b; border: 1px solid #cbd5e1; }
    .btn-outline-cancel:hover { background: #f1f5f9; color: #475569; transform: translateY(-2px); }

    /* Progress Bar */
    .progress-bar-teal { background-color: var(--teal-primary) !important; }
    .step-label { font-size: 0.85rem; font-weight: 700; transition: 0.3s; }
    .step-active { color: var(--teal-primary); }
    .step-inactive { color: #94a3b8; }

    /* Section Header */
    .section-header {
        background: linear-gradient(to right, rgba(15, 118, 110, 0.05), transparent);
        border-left: 4px solid var(--teal-primary);
        padding: 12px 16px; border-radius: 0 8px 8px 0; margin-bottom: 24px;
    }
    .section-header h6 { margin: 0; font-weight: 800; color: var(--teal-primary); letter-spacing: 0.5px; }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg" style="border-radius: 24px; overflow: hidden; background: #ffffff;">
                
                {{-- WIZARD HEADER --}}
                <div class="card-header bg-white pt-5 pb-3 border-0 px-4 px-md-5">
                    <h4 class="fw-bold text-center mb-4" style="color: var(--navy-dark); letter-spacing: -0.5px;">INPUT DATA PENYERAHAN UPT</h4>
                    
                    <div class="progress" style="height: 10px; border-radius: 10px; background-color: #f1f5f9; overflow: hidden;">
                        <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated progress-bar-teal" role="progressbar" style="width: 50%;"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-3 px-1">
                        <span id="labelStep1" class="step-label step-active"><i class="bi bi-1-circle-fill me-1"></i> Identitas & Lokasi</span>
                        <span id="labelStep2" class="step-label step-inactive"><i class="bi bi-2-circle-fill me-1"></i> Realisasi & Arsip</span>
                    </div>
                </div>
                
                <div class="card-body px-4 px-md-5 pb-5 pt-3">
                    <form action="{{ route('uptd.store') }}" method="POST" enctype="multipart/form-data" id="wizardForm">
                        @csrf
                        
                        {{-- ========================================== --}}
                        {{-- LANGKAH 1 --}}
                        {{-- ========================================== --}}
                        <div id="step1">
                            <div class="section-header">
                                <h6>I. Identitas Lokasi & Penempatan</h6>
                            </div>
                                
                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small mb-1">Tahun Penyerahan <span class="text-danger">*</span></label>
                                    <input type="text" name="tahun_penyerahan" class="form-control form-control-premium" placeholder="Contoh: 1975" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small mb-1">Kabupaten <span class="text-danger">*</span></label>
                                    <select id="kabupaten_id" name="kabupaten_id" class="form-select form-select-premium" required>
                                        <option value="">-- Pilih Kabupaten --</option>
                                        @foreach($kabupatens as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kabupaten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small mb-1">Kecamatan <span class="text-danger">*</span></label>
                                    <select id="kecamatan_id" name="kecamatan_id" class="form-select form-select-premium" required disabled>
                                        <option value="">-- Pilih Kab. Dahulu --</option>
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small mb-1">UPT / Desa Trans <span class="text-danger">*</span></label>
                                    <select id="nama_upt" name="nama_upt" class="form-select form-select-premium" required disabled>
                                        <option value="">-- Pilih Kec. Dahulu --</option>
                                    </select>
                                </div>

                                <div class="col-12 pt-3 border-top mt-4">
                                    <label class="form-label fw-bold text-muted small mb-1">Bulan/Tahun Penempatan Awal <span class="text-danger">*</span></label>
                                    <input type="text" name="waktu_penempatan" class="form-control form-control-premium" placeholder="Contoh: 1967/1968" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small mb-1">KK Awal <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" name="kk_awal" class="form-control form-control-premium border-end-0" required>
                                        <span class="input-group-text bg-white border-start-0 text-muted fw-bold">KK</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small mb-1">Jiwa Awal <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" name="jiwa_awal" class="form-control form-control-premium border-end-0" required>
                                        <span class="input-group-text bg-white border-start-0 text-muted fw-bold">Jiwa</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-5">
                                <a href="{{ route('uptd.index') }}" class="btn btn-wizard btn-outline-cancel">
                                    <i class="bi bi-x-lg me-2"></i> Batal
                                </a>
                                <button type="button" class="btn btn-wizard btn-teal-solid" onclick="nextStep()">
                                    Lanjut Langkah 2 <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ========================================== --}}
                        {{-- LANGKAH 2 --}}
                        {{-- ========================================== --}}
                        <div id="step2" style="display: none;">
                            <div class="section-header">
                                <h6>II. Realisasi & Desa Baru</h6>
                            </div>
                                
                            <div class="row g-4">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold text-muted small mb-1">Nama Desa Baru (Sekarang) <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_desa_baru" class="form-control form-control-premium" placeholder="Nama desa saat ini" required>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-muted small mb-1">Status Desa <span class="text-danger">*</span></label>
                                    <select name="status_desa" class="form-select form-select-premium">
                                        <option value="DEF">DEF (Definitif)</option>
                                        <option value="SEM">SEM (Persiapan)</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small mb-1">KK Baru <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" name="kk_baru" class="form-control form-control-premium border-end-0" required>
                                        <span class="input-group-text bg-white border-start-0 text-muted fw-bold">KK</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small mb-1">Jiwa Baru <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" name="jiwa_baru" class="form-control form-control-premium border-end-0" required>
                                        <span class="input-group-text bg-white border-start-0 text-muted fw-bold">Jiwa</span>
                                    </div>
                                </div>

                                <div class="col-12 pt-3 border-top mt-4">
                                    <label class="form-label fw-bold text-danger small mb-1">No. Berita Acara Penyerahan <span class="text-danger">*</span></label>
                                    <input type="text" name="no_ba_penyerahan" class="form-control form-control-premium border-danger border-opacity-50" placeholder="Contoh: NO.E.1193/I-VI-7/75" required style="background-color: #fef2f2;">
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small mb-1">Pola Penempatan</label>
                                    <input type="text" name="pola" class="form-control form-control-premium" placeholder="Contoh: TU">
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small mb-1">Keterangan / Permasalahan</label>
                                    <textarea name="permasalahan" class="form-control form-control-premium" rows="3" placeholder="Tuliskan catatan, status, atau permasalahan jika ada..."></textarea>
                                </div>
                            </div>

                            <div class="section-header mt-5">
                                <h6>III. Arsip Dokumen Digital (Opsional)</h6>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="upload-box text-center">
                                        <i class="bi bi-file-earmark-pdf fs-3 text-danger mb-2 d-block"></i>
                                        <label class="form-label small fw-bold text-navy mb-1">SK Penyerahan</label>
                                        <input type="file" name="file_sk_penyerahan" class="form-control form-control-sm mt-2" accept=".pdf,.jpg,.jpeg,.png">
                                        <small class="text-muted d-block mt-2" style="font-size: 0.65rem;">PDF/JPG/PNG. Maks: 5MB</small>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="upload-box text-center">
                                        <i class="bi bi-file-earmark-pdf fs-3 text-danger mb-2 d-block"></i>
                                        <label class="form-label small fw-bold text-navy mb-1">SK Penempatan</label>
                                        <input type="file" name="file_sk_penempatan" class="form-control form-control-sm mt-2" accept=".pdf,.jpg,.jpeg,.png">
                                        <small class="text-muted d-block mt-2" style="font-size: 0.65rem;">PDF/JPG/PNG. Maks: 5MB</small>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="upload-box text-center">
                                        <i class="bi bi-image fs-3 text-primary mb-2 d-block"></i>
                                        <label class="form-label small fw-bold text-navy mb-1">Peta Lokasi / Site Plan</label>
                                        <input type="file" name="file_peta_lokasi" class="form-control form-control-sm mt-2" accept=".pdf,.jpg,.jpeg,.png">
                                        <small class="text-muted d-block mt-2" style="font-size: 0.65rem;">PDF/JPG/PNG. Maks: 5MB</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-5 pt-3 border-top">
                                <button type="button" class="btn btn-wizard btn-outline-cancel" onclick="prevStep()">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </button>
                                <div>
                                    <a href="{{ route('uptd.index') }}" class="btn btn-link text-muted fw-bold me-2 text-decoration-none">Batal</a>
                                    <button type="submit" class="btn btn-wizard btn-teal-solid">
                                        <i class="bi bi-save-fill me-2"></i> Simpan Data UPT
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // FUNGSI WIZARD 
    function nextStep() {
        let isValid = true;
        
        // Cek validasi input di step 1
        $('#step1 input[required], #step1 select[required]').each(function() {
            if ($(this).val() === '' || $(this).val() === null) {
                isValid = false;
                $(this).addClass('is-invalid');
                $(this).css('border-color', '#ef4444');
            } else {
                $(this).removeClass('is-invalid');
                $(this).css('border-color', 'var(--border-input)');
            }
        });

        if (isValid) {
            $('#step1').fadeOut(250, function() {
                $('#step2').fadeIn(300);
                $('#progressBar').css('width', '100%');
                $('#labelStep2').addClass('step-active').removeClass('step-inactive');
                $('#labelStep1').removeClass('step-active').addClass('step-inactive');
            });
            $('html, body').animate({ scrollTop: $(".card-header").offset().top - 30 }, 300);
        } else {
            Swal.fire({ 
                icon: 'warning', 
                title: 'Data Belum Lengkap!', 
                text: 'Silakan isi semua kolom yang bertanda bintang merah (*).',
                confirmButtonColor: 'var(--teal-primary)',
                borderRadius: '16px'
            });
        }
    }

    function prevStep() {
        $('#step2').fadeOut(250, function() {
            $('#step1').fadeIn(300);
            $('#progressBar').css('width', '50%');
            $('#labelStep1').addClass('step-active').removeClass('step-inactive');
            $('#labelStep2').removeClass('step-active').addClass('step-inactive');
        });
        $('html, body').animate({ scrollTop: $(".card-header").offset().top - 30 }, 300);
    }

    // FUNGSI AJAX DROPDOWN UPTD
    $(document).ready(function() {
        $('#kabupaten_id').on('change', function() {
            var kabID = $(this).val();
            $('#kecamatan_id').empty().append('<option value="">Memuat...</option>').prop('disabled', true);
            $('#nama_upt').empty().append('<option value="">-- Pilih Kec. Dahulu --</option>').prop('disabled', true);

            if(kabID) {
                $.ajax({
                    url: "{{ url('/get-kecamatan') }}/" + kabID, 
                    type: 'GET',
                    dataType: 'json',
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
                    url: "{{ url('/get-master-uptd') }}/" + kecID,
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
        
        // Hapus styling merah (error) saat user mulai mengetik ulang
        $('input[required], select[required]').on('input change', function() {
            if ($(this).val() !== '') {
                $(this).removeClass('is-invalid');
                $(this).css('border-color', 'var(--border-input)');
            }
        });
    });
</script>
@endpush