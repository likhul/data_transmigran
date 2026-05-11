@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
        <div class="card-header bg-white pt-4 border-0 text-center">
            <h4 class="fw-bold" style="color: #0f766e;">EDIT DATA PENYERAHAN UPT</h4>
            <p class="text-muted small">Pastikan semua kolom administrasi terisi dengan benar.</p>
        </div>
        
        <div class="card-body p-4">
            <form action="{{ route('uptd.update', $uptd->id) }}" method="POST"enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="p-3 mb-4 rounded-4 bg-light border">
                    <h6 class="fw-bold text-secondary mb-3 small">IDENTITAS WILAYAH</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-bold small">Tahun Penyerahan</label>
                            <input type="text" name="tahun_penyerahan" class="form-control" value="{{ $uptd->tahun_penyerahan }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold small">Kabupaten</label>
                            <select id="kabupaten_id" name="kabupaten_id" class="form-select" required>
                                @foreach($kabupatens as $k)
                                    <option value="{{ $k->id }}" {{ $uptd->kabupaten_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold small">Kecamatan</label>
                            <select id="kecamatan_id" name="kecamatan_id" class="form-select" required>
                                @foreach($kecamatans as $kec)
                                    <option value="{{ $kec->id }}" {{ $uptd->kecamatan_id == $kec->id ? 'selected' : '' }}>{{ $kec->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold small">Nama UPT</label>
                            <select id="nama_upt" name="nama_upt" class="form-select" required>
                                @foreach($master_uptds as $m)
                                    <option value="{{ $m->nama_uptd }}" {{ $uptd->nama_upt == $m->nama_uptd ? 'selected' : '' }}>{{ $m->nama_uptd }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 rounded-4 border-start border-4 border-primary h-100" style="background-color: #f0f9ff;">
                            <h6 class="fw-bold text-primary small mb-3">PENEMPATAN AWAL</h6>
                            <div class="mb-3">
                                <label class="small fw-bold">Bulan/Tahun Penempatan</label>
                                <input type="text" name="waktu_penempatan" class="form-control" value="{{ $uptd->waktu_penempatan }}" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="small fw-bold">KK Awal</label>
                                    <input type="number" name="kk_awal" class="form-control" value="{{ $uptd->kk_awal }}" required>
                                </div>
                                <div class="col-6">
                                    <label class="small fw-bold">Jiwa Awal</label>
                                    <input type="number" name="jiwa_awal" class="form-control" value="{{ $uptd->jiwa_awal }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-4 border-start border-4 border-success h-100" style="background-color: #f0fdf4;">
                            <h6 class="fw-bold text-success small mb-3">KONDISI DESA BARU</h6>
                            <div class="mb-3">
                                <label class="small fw-bold">Nama Desa Baru</label>
                                <input type="text" name="nama_desa_baru" class="form-control" value="{{ $uptd->nama_desa_baru }}" required>
                            </div>
                            <div class="row g-2">
                                <div class="col-4">
                                    <label class="small fw-bold">Status</label>
                                    <select name="status_desa" class="form-select">
                                        <option value="DEF" {{ $uptd->status_desa == 'DEF' ? 'selected' : '' }}>DEF</option>
                                        <option value="SEM" {{ $uptd->status_desa == 'SEM' ? 'selected' : '' }}>SEM</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="small fw-bold">KK</label>
                                    <input type="number" name="kk_baru" class="form-control" value="{{ $uptd->kk_baru }}" required>
                                </div>
                                <div class="col-4">
                                    <label class="small fw-bold">Jiwa</label>
                                    <input type="number" name="jiwa_baru" class="form-control" value="{{ $uptd->jiwa_baru }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3 mb-4 rounded-4" style="background-color: #fff1f2; border: 1px solid #fecdd3;">
                    <h6 class="fw-bold text-danger mb-3 small">DATA ADMINISTRASI & CATATAN</h6>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-5">
                            <label class="small fw-bold">No. Berita Acara (BA) Penyerahan</label>
                            <input type="text" name="no_ba_penyerahan" class="form-control" value="{{ $uptd->no_ba_penyerahan }}" required>
                        </div>
                        <div class="col-md-2">
                            <label class="small fw-bold">Pola</label>
                            <input type="text" name="pola" class="form-control" value="{{ $uptd->pola }}">
                        </div>
                        <div class="col-md-5">
                            <label class="small fw-bold">Permasalahan / Keterangan</label>
                            <input type="text" name="permasalahan" class="form-control" value="{{ $uptd->permasalahan }}">
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label small fw-bold text-muted">Sejarah Singkat / Profil Desa UPT</label>
                            <textarea name="sejarah_desa" class="tinymce-editor form-control shadow-sm" rows="5" placeholder="Tuliskan sejarah terbentuknya UPT, tokoh perintis, atau informasi historis lainnya...">{{ old('sejarah_desa', $uptd->sejarah_desa ?? '') }}</textarea>
                        </div>

                        <div class="p-4 mb-4 rounded-4" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                            <h6 class="fw-bold mb-3 text-primary border-bottom pb-2">
                                <i class="bi bi-folder-check me-2"></i>III. Arsip Dokumen Digital (Opsional)
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-muted">File SK Penyerahan</label>
                                    <input type="file" name="file_sk_penyerahan" class="form-control shadow-sm" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="text-muted" style="font-size: 0.65rem;">Format: PDF/JPG/PNG. Maks: 5MB</small>
                                    
                                    {{-- Khusus untuk form EDIT: Tampilkan info jika file sudah ada --}}
                                    @if(isset($uptd) && $uptd->file_sk_penyerahan)
                                        <div class="mt-2 text-success small fw-bold">
                                            <i class="bi bi-check-circle-fill"></i> File sudah terupload
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-muted">File SK Penempatan</label>
                                    <input type="file" name="file_sk_penempatan" class="form-control shadow-sm" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="text-muted" style="font-size: 0.65rem;">Format: PDF/JPG/PNG. Maks: 5MB</small>
                                    
                                    @if(isset($uptd) && $uptd->file_sk_penempatan)
                                        <div class="mt-2 text-success small fw-bold">
                                            <i class="bi bi-check-circle-fill"></i> File sudah terupload
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-muted">Peta Lokasi / Site Plan</label>
                                    <input type="file" name="file_peta_lokasi" class="form-control shadow-sm" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="text-muted" style="font-size: 0.65rem;">Format: PDF/JPG/PNG. Maks: 5MB</small>
                                    
                                    @if(isset($uptd) && $uptd->file_peta_lokasi)
                                        <div class="mt-2 text-success small fw-bold">
                                            <i class="bi bi-check-circle-fill"></i> File sudah terupload
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow" style="border-radius: 12px; background: #0f766e; border: none;">
                        <i class="bi bi-save me-2"></i> SIMPAN PERUBAHAN
                    </button>
                    <a href="{{ route('uptd.index') }}" class="btn btn-light btn-lg px-4 ms-2" style="border-radius: 12px;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#kabupaten_id').on('change', function() {
        var kabID = $(this).val();
        if(kabID) {
            $.ajax({
                url: '/get-kecamatan/' + kabID,
                type: 'GET',
                success: function(res) {
                    $('#kecamatan_id').empty().append('<option value="">-- Pilih Kecamatan --</option>');
                    $('#nama_upt').empty().append('<option value="">-- Pilih Kec. Dahulu --</option>');
                    $.each(res, function(key, item) {
                        $('#kecamatan_id').append('<option value="'+ item.id +'">'+ item.nama_kecamatan +'</option>');
                    });
                }
            });
        }
    });

    $('#kecamatan_id').on('change', function() {
        var kecID = $(this).val();
        if(kecID) {
            $.ajax({
                url: '/get-uptd-by-kecamatan/' + kecID,
                type: 'GET',
                success: function(res) {
                    $('#nama_upt').empty().append('<option value="">-- Pilih UPT --</option>');
                    $.each(res, function(key, item) {
                        $('#nama_upt').append('<option value="'+ item.nama_uptd +'">'+ item.nama_uptd +'</option>');
                    });
                }
            });
        }
    });
});
</script>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>

<script>
    $(document).ready(function() {
        // Menyalakan mesin TinyMCE
        tinymce.init({
            selector: '.tinymce-editor', // Targetkan class kotak teks sejarah
            height: 350, // Tinggi kotak teks
            plugins: 'lists link preview wordcount', // Fitur yang diaktifkan
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat', // Tombol-tombol di atas
            menubar: false, // Sembunyikan menu bar atas biar rapi
            branding: false, // Hilangkan watermark TinyMCE
            promotion: false, // Hilangkan tombol upgrade
            content_style: 'body { font-family: "Plus Jakarta Sans", Helvetica, Arial, sans-serif; font-size:15px; color: #334155; line-height: 1.6; }'
        });
    });
</script>
@endpush