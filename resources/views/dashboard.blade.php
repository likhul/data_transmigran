@extends('layouts.app')

@section('title', 'Dashboard - SI Transmigran Jambi')

@push('css')
<style>
    .card-stat {
        border-radius: 16px;
        border: none;
        transition: transform 0.2s ease-in-out;
    }
    .card-stat:hover {
        transform: translateY(-5px);
    }
    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    }
</style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 style="font-weight: 800; color: #1e293b; letter-spacing: -1px;">Dashboard Statistik</h3>
            <p class="text-muted mb-0">Ringkasan data Sistem Informasi Transmigran Jambi.</p>
        </div>
        <div>
            <span class="badge bg-primary px-3 py-2 rounded-pill shadow-sm" style="font-size: 0.9rem;">
                👤 Halo, {{ Auth::user()->name ?? 'Admin' }}!
            </span>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card card-stat shadow-sm bg-white h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary me-4">
                        👨‍👩‍👧‍👦
                    </div>
                    <div>
                        <h6 class="text-muted fw-bold mb-1">Total Transmigran</h6>
                        <h2 class="mb-0 fw-bold" style="color: #1e293b;">{{ $totalTransmigran ?? 0 }} <span class="fs-6 text-muted fw-normal">Jiwa</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-stat shadow-sm bg-white h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning me-4">
                        🔄
                    </div>
                    <div>
                        <h6 class="text-muted fw-bold mb-1">Total Mutasi</h6>
                        <h2 class="mb-0 fw-bold" style="color: #1e293b;">{{ $totalMutasi ?? 0 }} <span class="fs-6 text-muted fw-normal">Riwayat</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-stat shadow-sm bg-white h-100">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="icon-box bg-success bg-opacity-10 text-success me-4">
                        🏢
                    </div>
                    <div>
                        <h6 class="text-muted fw-bold mb-1">Wilayah UPTD</h6>
                        <h2 class="mb-0 fw-bold" style="color: #1e293b;">{{ $totalUptd ?? 0 }} <span class="fs-6 text-muted fw-normal">Lokasi</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-dark">Grafik Perbandingan Data Keseluruhan</h5>
                    <div style="position: relative; height: 350px; width: 100%;">
                        <canvas id="transmigranChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('transmigranChart').getContext('2d');
        
        // Ambil data dari PHP (Controller/Route)
        const totalTransmigran = {{ $totalTransmigran ?? 0 }};
        const totalMutasi = {{ $totalMutasi ?? 0 }};
        const totalUptd = {{ $totalUptd ?? 0 }};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Data Transmigran', 'Riwayat Mutasi', 'Wilayah UPTD'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [totalTransmigran, totalMutasi, totalUptd],
                    backgroundColor: [
                        'rgba(13, 110, 253, 0.7)',  // Primary Bootstrap
                        'rgba(255, 193, 7, 0.7)',   // Warning Bootstrap
                        'rgba(25, 135, 84, 0.7)'    // Success Bootstrap
                    ],
                    borderColor: [
                        'rgb(13, 110, 253)',
                        'rgb(255, 193, 7)',
                        'rgb(25, 135, 84)'
                    ],
                    borderWidth: 2,
                    borderRadius: 8 // Ujung bar melengkung biar modern
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Sembunyikan legend karena sudah jelas dari label bawah
                    }
                }
            }
        });
    });
</script>
@endpush