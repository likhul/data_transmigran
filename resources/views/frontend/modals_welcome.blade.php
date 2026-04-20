<style>
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
    }

    /* 1. PERBAIKAN UKURAN MODAL (Tidak Full Screen di HP) */
    .modal-dialog { margin: 1.25rem; }
    .modal-content { border-radius: 24px; border: none; overflow: hidden; }

    /* 2. HEADER MODAL & SEARCH BOX */
    .modal-header { padding: 20px 20px 10px; border: none; }
    .search-container { padding: 0 20px 15px; }
    .modal-search-input {
        background: #f1f5f9; border: 1px solid #e2e8f0;
        border-radius: 12px; padding: 10px 15px; font-size: 0.9rem;
        width: 100%; transition: 0.3s;
    }
    .modal-search-input:focus { outline: none; border-color: var(--md-primary); background: #fff; }

    /* 3. PERBAIKAN TABEL (Lebih Compact) */
    .modal-body { padding: 0 15px 20px; }
    .table-wrapper { 
        max-height: 50vh; overflow-y: auto; border-radius: 16px; 
        background: #f8fafc; border: 1px solid #f1f5f9;
    }
    .table-custom { width: 100%; border-collapse: collapse; }
    .table-custom thead th {
        position: sticky; top: 0; background: #ffffff; z-index: 10;
        font-size: 0.7rem; text-transform: uppercase; color: #64748b;
        padding: 12px 10px; border-bottom: 2px solid #f1f5f9;
    }
    .table-custom tbody td {
        padding: 12px 10px; font-size: 0.85rem; color: #1e293b;
        border-bottom: 1px solid #f1f5f9;
    }

    /* 4. PERBAIKAN FONT RINGKASAN (Standard Mobile) */
    .stat-main-box {
        padding: 15px; border-radius: 20px; height: 100%;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
    }
    .stat-main-number { 
        font-weight: 800; font-size: 1.3rem; /* Diperbesar agar standar mobile */
        letter-spacing: -0.5px; line-height: 1.1; 
    }
    .stat-main-label { font-size: 0.65rem; font-weight: 700; opacity: 0.8; margin-top: 4px; }
    
    .badge-info-mungil {
        padding: 10px 15px; background: #ffffff; border-radius: 12px;
        font-size: 0.8rem; margin-bottom: 8px; border: 1px solid #e2e8f0;
    }
</style>

<div class="modal fade" id="modalJiwa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h6 class="fw-800 mb-0">Ringkasan Demografi</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="font-size: 0.7rem;"></button>
            </div>
            <div class="modal-body pt-2">
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <div class="stat-main-box" style="background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe;">
                            <div class="stat-main-number">{{ number_format($statistik['transmigran'] ?? 0) }}</div>
                            <div class="stat-main-label">TOTAL JIWA</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-main-box" style="background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                            <div class="stat-main-number">{{ number_format($statistik['kk'] ?? 0) }}</div>
                            <div class="stat-main-label">TOTAL KK</div>
                        </div>
                    </div>
                </div>
                <div class="badge-info-mungil d-flex align-items-center">
                    <i class="bi bi-geo-fill text-primary me-2"></i>
                    <span>Tersebar di <b>{{ $statistik['kabupaten'] ?? 0 }} Kabupaten</b></span>
                </div>
                <div class="badge-info-mungil d-flex align-items-center">
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                    <span>Mencakup <b>{{ $statistik['kecamatan'] ?? 0 }} Kecamatan</b></span>
                </div>
                <div class="badge-info-mungil d-flex align-items-center">
                    <i class="bi bi-building text-success me-2"></i>
                    <span>Terdiri dari <b>{{ $statistik['uptd'] ?? 0 }} UPTD</b></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKecamatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-800 mb-0"><i class="bi bi-geo-alt text-primary me-1"></i> Data Kecamatan</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="font-size: 0.7rem;"></button>
            </div>
            <div class="search-container">
                <input type="text" class="modal-search-input" placeholder="Cari nama kecamatan..." onkeyup="filterTable(this, 'tableKecamatan')">
            </div>
            <div class="modal-body">
                <div class="table-wrapper">
                    <table class="table-custom" id="tableKecamatan">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Kecamatan</th>
                                <th style="text-align: center;">Jiwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kecamatan_list ?? [] as $kec)
                            <tr>
                                <td class="fw-bold">{{ $kec->nama_kecamatan }}</td>
                                <td style="text-align: center;"><span class="text-primary fw-bold">{{ number_format($kec->total_jiwa) }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKabupaten" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-800 mb-0"><i class="bi bi-map text-warning me-1"></i> Data Kabupaten</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="font-size: 0.7rem;"></button>
            </div>
            <div class="search-container">
                <input type="text" class="modal-search-input" placeholder="Cari nama kabupaten..." onkeyup="filterTable(this, 'tableKabupaten')">
            </div>
            <div class="modal-body">
                <div class="table-wrapper">
                    <table class="table-custom" id="tableKabupaten">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Kabupaten</th>
                                <th style="text-align: center;">UPTD</th>
                                <th style="text-align: center;">Jiwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kabupaten_list ?? [] as $kab)
                            <tr>
                                <td class="fw-bold">{{ $kab['nama'] }}</td>
                                <td style="text-align: center;">{{ $kab['total_uptd'] }}</td>
                                <td style="text-align: center;"><span class="text-primary fw-bold">{{ number_format($kab['jiwa']) }}</span></td>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-800 mb-0"><i class="bi bi-building text-success me-1"></i> Data UPTD</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="font-size: 0.7rem;"></button>
            </div>
            <div class="search-container">
                <input type="text" class="modal-search-input" placeholder="Cari nama UPTD..." onkeyup="filterTable(this, 'tableUptd')">
            </div>
            <div class="modal-body">
                <div class="table-wrapper">
                    <table class="table-custom" id="tableUptd">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Nama UPTD</th>
                                <th style="text-align: center;">Tahun</th>
                                <th style="text-align: center;">Jiwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uptd_list ?? [] as $upt)
                            <tr>
                                <td class="fw-bold">{{ $upt->nama_upt }}</td>
                                <td style="text-align: center;">{{ $upt->tahun_penyerahan }}</td>
                                <td style="text-align: center;"><span class="text-primary fw-bold">{{ number_format($upt->jiwa_baru) }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function filterTable(input, tableId) {
    let filter = input.value.toUpperCase();
    let table = document.getElementById(tableId);
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td")[0]; // Cari di kolom pertama (Nama)
        if (td) {
            let txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>