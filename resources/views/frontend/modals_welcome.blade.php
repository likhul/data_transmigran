<style>
    /* Styling Khusus Modal & Table Modern */
    .modal-content { border-radius: 24px; border: none; }
    .modal-header { padding: 25px 30px 15px; }
    .modal-body { padding: 15px 30px 30px; }
    
    /* Tabel Melayang */
    .table-modern { border-collapse: separate; border-spacing: 0 12px; width: 100%; }
    .table-modern thead th { 
        border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; 
        color: #64748b; padding: 0 20px 10px; font-weight: 700;
    }
    .table-modern tbody tr { 
        background: #f8fafc; box-shadow: 0 4px 6px rgba(0,0,0,0.02); transition: 0.3s;
    }
    .table-modern tbody tr:hover { transform: translateY(-3px); box-shadow: 0 8px 15px rgba(0,0,0,0.05); background: #fff;}
    .table-modern tbody td { 
        border: none; padding: 16px 20px; vertical-align: middle; 
    }
    .table-modern tbody td:first-child { border-top-left-radius: 16px; border-bottom-left-radius: 16px; }
    .table-modern tbody td:last-child { border-top-right-radius: 16px; border-bottom-right-radius: 16px; }
    
    /* Badge Angka */
    .badge-soft-primary { background: #eff6ff; color: #2563eb; padding: 8px 16px; border-radius: 50px; font-weight: 800; }
    .badge-soft-success { background: #ecfdf5; color: #059669; padding: 8px 16px; border-radius: 50px; font-weight: 800; }
</style>

<div class="modal fade" id="modalKabupaten" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg">
            <div class="modal-header border-0">
                <h5 class="fw-800 text-navy-deep"><i class="bi bi-map-fill me-2 fs-4 text-warning align-middle"></i> Rincian Data Kabupaten</h5>
                <button type="button" class="btn-close bg-light rounded-circle p-3" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th>Nama Kabupaten</th>
                                <th class="text-center">Jml UPTD</th>
                                <th class="text-center">Total KK</th>
                                <th class="text-center">Total Jiwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kabupaten_list ?? [] as $kab)
                            <tr>
                                <td class="fw-bold text-dark">{{ $kab['nama'] ?? '-' }}</td>
                                <td class="text-center fw-bold text-muted">{{ $kab['total_uptd'] ?? 0 }} Unit</td>
                                <td class="text-center fw-bold">{{ number_format($kab['kk'] ?? 0) }}</td>
                                <td class="text-center"><span class="badge-soft-primary">{{ number_format($kab['jiwa'] ?? 0) }} Jiwa</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUptd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg">
            <div class="modal-header border-0">
                <h5 class="fw-800 text-navy-deep"><i class="bi bi-building-check me-2 fs-4 text-success align-middle"></i> Rincian Data UPTD</h5>
                <button type="button" class="btn-close bg-light rounded-circle p-3" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th>Nama UPTD</th>
                                <th class="text-center">Total KK</th>
                                <th class="text-center">Total Jiwa</th>
                                <th class="text-center">Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uptd_list ?? [] as $upt)
                            <tr>
                                <td class="fw-bold text-dark">{{ $upt->nama_upt ?? '-' }}</td>
                                <td class="text-center fw-bold text-muted">{{ number_format($upt->kk_baru ?? 0) }}</td>
                                <td class="text-center"><span class="badge-soft-success">{{ number_format($upt->jiwa_baru ?? 0) }} Jiwa</span></td>
                                <td class="text-center fw-bold text-secondary">{{ $upt->tahun_penyerahan ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKecamatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg">
            <div class="modal-header border-0">
                <h5 class="fw-800 text-navy-deep"><i class="bi bi-geo-alt-fill me-2 fs-4 text-primary align-middle"></i> Rincian Data Kecamatan</h5>
                <button type="button" class="btn-close bg-light rounded-circle p-3" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th>Kecamatan</th>
                                <th class="text-center">Jml UPTD</th>
                                <th class="text-center">Total KK</th>
                                <th class="text-center">Total Jiwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kecamatan_list ?? [] as $kec)
                            <tr>
                                <td class="fw-bold text-dark">{{ $kec->nama_kecamatan ?? '-' }}</td>
                                <td class="text-center fw-bold text-muted">{{ $kec->jml_uptd ?? 0 }} Unit</td>
                                <td class="text-center fw-bold">{{ number_format($kec->total_kk ?? 0) }}</td>
                                <td class="text-center"><span class="badge-soft-primary">{{ number_format($kec->total_jiwa ?? 0) }} Jiwa</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalJiwa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-800 text-navy-deep mx-auto pt-3">Ringkasan Demografi</h5>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-4 bg-light rounded-circle p-2" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center pt-4">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-4 rounded-4" style="background: linear-gradient(135deg, #eff6ff, #dbeafe);">
                            <h2 class="fw-900 mb-0 text-primary" style="letter-spacing: -1px;">{{ number_format($statistik['transmigran'] ?? 0) }}</h2>
                            <small class="text-primary fw-bold" style="letter-spacing: 1px;">TOTAL JIWA</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 rounded-4" style="background: linear-gradient(135deg, #ecfdf5, #d1fae5);">
                            <h2 class="fw-900 mb-0 text-success" style="letter-spacing: -1px;">{{ number_format($statistik['kk'] ?? 0) }}</h2>
                            <small class="text-success fw-bold" style="letter-spacing: 1px;">TOTAL KK</small>
                        </div>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-light rounded-4 text-start">
                    <p class="mb-2 text-dark"><i class="bi bi-check-circle-fill text-success me-2"></i> Tersebar di <strong>{{ $statistik['kabupaten'] ?? 0 }} Kabupaten</strong></p>
                    <p class="mb-0 text-dark"><i class="bi bi-check-circle-fill text-success me-2"></i> Terbagi dalam <strong>{{ $statistik['uptd'] ?? 0 }} UPTD</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>