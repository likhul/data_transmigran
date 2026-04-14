@extends('layouts.app')

@section('title', 'Dashboard - SI Transmigran Jambi')

@push('css')
<style>
    :root {
        --blue-primary: #2563eb;
        --navy-dark: #0f172a;
        --bg-surface: #ffffff;
    }

    /* Card Statistik Modern */
    .card-stat {
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        background: var(--bg-surface);
    }
    .card-stat:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important;
    }
    .icon-box {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    /* Chart Card */
    .card-chart {
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        background: #ffffff;
    }

    /* Tabel Styling */
    .table-custom thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-top: none;
        padding: 15px;
    }
    .table-custom tbody td {
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
    }
</style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold" style="color: var(--navy-dark); letter-spacing: -1px;">Dashboard Statistik</h3>
            <p class="text-muted small mb-0">Ringkasan data real-time penempatan transmigran Jambi.</p>
        </div>
        <div>
            <span class="badge bg-white text-dark px-3 py-2 rounded-pill shadow-sm border fw-bold" style="font-size: 0.85rem;">
                <i class="bi bi-person-circle me-1 text-primary"></i> Admin: {{ Auth::user()->name ?? 'Administrator' }}
            </span>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card card-stat shadow-sm">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary me-3"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <h6 class="text-muted small mb-1">Total Warga</h6>
                        <h4 class="mb-0 fw-bold" style="color: var(--navy-dark);">{{ number_format($total_transmigran) }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat shadow-sm">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-box bg-info bg-opacity-10 text-info me-3"><i class="bi bi-building-fill"></i></div>
                    <div>
                        <h6 class="text-muted small mb-1">UPTD Diserahkan</h6>
                        <h4 class="mb-0 fw-bold" style="color: var(--navy-dark);">{{ $total_rekap_uptd }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat shadow-sm">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning me-3"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <h6 class="text-muted small mb-1">Total Kabupaten</h6>
                        <h4 class="mb-0 fw-bold" style="color: var(--navy-dark);">{{ $total_kabupaten }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat shadow-sm">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-box bg-success bg-opacity-10 text-success me-3"><i class="bi bi-map-fill"></i></div>
                    <div>
                        <h6 class="text-muted small mb-1">Total Kecamatan</h6>
                        <h4 class="mb-0 fw-bold" style="color: var(--navy-dark);">{{ $total_kecamatan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-7">
            <div class="card card-chart shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-bold mb-0 text-dark">📈 Tren Histori Penempatan (Seluruh Tahun)</h6>
                        <span class="badge bg-light text-primary border px-2 py-1">Line Chart</span>
                    </div>
                    <div style="height: 320px;">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card card-chart shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-bold mb-0 text-dark">📊 Sebaran Jiwa per Kabupaten</h6>
                        <span class="badge bg-light text-success border px-2 py-1">Bar Chart</span>
                    </div>
                    <div style="height: 320px;">
                        <canvas id="kabupatenChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="d-flex justify-content-between align-items-center p-4">
                <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-clock-history me-2 text-primary"></i>Data Penyerahan UPTD Terbaru</h6>
                <a href="{{ url('/uptd') }}" class="btn btn-sm btn-outline-primary fw-bold px-3" style="border-radius: 10px;">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle table-custom mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">Tahun</th>
                            <th>Nama UPTD</th>
                            <th>Wilayah Administratif</th>
                            <th class="text-center">Total Jiwa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekap_uptd as $uptd)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-primary border fw-bold px-3 py-2" style="border-radius: 8px;">{{ $uptd->tahun_penyerahan }}</span>
                            </td>
                            <td class="fw-bold text-dark">{{ $uptd->nama_upt }}</td>
                            <td>
                                <div class="small fw-bold">Kab. {{ $uptd->kabupaten->nama_kabupaten ?? '-' }}</div>
                                <div class="small text-muted">Kec. {{ $uptd->kecamatan->nama_kecamatan ?? '-' }}</div>
                            </td>
                            <td class="text-center fw-bold text-success">
                                {{ number_format($uptd->jiwa_baru) }} <span class="small text-muted fw-normal">Jiwa</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data penyerahan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- Grafik 1: TREN SEMUA TAHUN ---
        new Chart(document.getElementById('trendChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!}, // Mengambil tahun asli dari DB
                datasets: [{
                    label: 'Jumlah Jiwa',
                    data: {!! json_encode($dataWarga) !!}, // Mengambil angka jiwa asli dari DB
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { 
                    y: { beginAtZero: true },
                    x: { ticks: { autoSkip: true, maxRotation: 45 } }
                }
            }
        });

        // --- Grafik 2: SEBARAN KABUPATEN ---
        new Chart(document.getElementById('kabupatenChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($label_kabupaten) !!},
                datasets: [{
                    data: {!! json_encode($data_kabupaten) !!},
                    backgroundColor: '#10b981',
                    borderRadius: 8
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    });
</script>