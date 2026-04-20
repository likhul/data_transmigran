@extends('layouts.frontend')
@section('title', 'Statistik & Analisis | SI-Trans Jambi')

@push('css')
<style>
    /* VARIABEL WARNA MATERIAL DESIGN 3 & NEUMORPHISM */
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        --hover-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
    }

    body { background-color: var(--md-background); font-size: 14px; }

    /* 1. HERO SECTION (Micro-Clean MD3) */
    .hero-mini {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(37, 99, 235, 0.75) 100%), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
        /* Padding atas dipangkas, padding bawah diberi ruang ekstra untuk overlapping kartu */
        padding-top: clamp(80px, 12vh, 120px);
        padding-bottom: clamp(60px, 10vh, 100px); 
        position: relative;
        border-bottom-left-radius: clamp(16px, 4vw, 32px);
        border-bottom-right-radius: clamp(16px, 4vw, 32px);
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
    }
    
    /* Ukuran Judul Dinamis App-like */
    .hero-title-main {
        font-weight: 800; 
        font-size: clamp(1.2rem, 4.5vw, 2.5rem); 
        letter-spacing: -0.5px;
        line-height: 1.3;
        margin-bottom: 6px !important;
    }
    .hero-subtitle {
        font-size: clamp(0.75rem, 1.8vw, 1rem);
        line-height: 1.5; 
        max-width: 500px;
        opacity: 0.9;
    }

    /* KARTU STATISTIK MELAYANG (Neumorphism Compact) */
    .stat-card-modern {
        background: var(--md-surface); 
        border-radius: clamp(12px, 2.5vw, 20px); 
        padding: clamp(12px, 2vw, 24px) clamp(8px, 1.5vw, 15px);
        text-align: center; cursor: pointer;
        box-shadow: var(--soft-shadow); 
        border: 1px solid rgba(226,232,240,0.4);
        transition: all 0.3s ease; 
        position: relative; height: 100%;
    }
    .stat-card-modern:hover { transform: translateY(-4px); box-shadow: var(--hover-shadow); }
    
    .stat-card-modern .icon-box {
        width: clamp(35px, 6vw, 55px); height: clamp(35px, 6vw, 55px); 
        border-radius: clamp(10px, 1.5vw, 16px); 
        display: flex; align-items: center; justify-content: center;
        font-size: clamp(1rem, 3vw, 1.5rem); margin: 0 auto 10px; transition: 0.3s;
    }
    .stat-card-modern:hover .icon-box { transform: scale(1.05) rotate(5deg); }
    
    /* Gradien Pastel untuk Icon Box */
    .bg-jiwa { background: linear-gradient(135deg, #eff6ff 0%, #bfdbfe 100%); color: #2563eb; } 
    .bg-uptd { background: linear-gradient(135deg, #ecfdf5 0%, #a7f3d0 100%); color: #059669; }
    .bg-kab { background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%); color: #ea580c; } 
    .bg-kec { background: linear-gradient(135deg, #f5f3ff 0%, #ddd6fe 100%); color: #7c3aed; }
    
    /* Teks dalam Kartu Statistik */
    .stat-card-modern h2 { 
        font-weight: 800; 
        font-size: clamp(1.1rem, 4vw, 2rem); 
        margin-bottom: 2px; color: #0f172a; letter-spacing: -0.5px;
    }
    .stat-card-modern p { 
        font-weight: 700; color: #64748b; 
        font-size: clamp(0.55rem, 1.2vw, 0.75rem); 
        text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0;
    }

    /* KOTAK GRAFIK (Soft UI Frame) */
    .chart-box { 
        background: var(--md-surface); 
        border-radius: clamp(16px, 3vw, 24px); 
        padding: clamp(15px, 3vw, 25px); 
        border: 1px solid rgba(226,232,240,0.4); 
        box-shadow: var(--soft-shadow); 
        height: 100%; display: flex; flex-direction: column; 
        transition: 0.3s ease; overflow: hidden;
    }
    .chart-box:hover { box-shadow: var(--hover-shadow); }
    
    .chart-title { 
        font-weight: 800; 
        font-size: clamp(0.85rem, 2vw, 1.1rem); 
        color: #0f172a; 
        margin-bottom: 15px; display: flex; align-items: center; line-height: 1.3;
    }
    .chart-icon { 
        width: clamp(28px, 6vw, 40px); height: clamp(28px, 6vw, 40px); 
        border-radius: clamp(8px, 1.5vw, 12px); 
        display: inline-flex; align-items: center; justify-content: center; 
        margin-right: 10px; font-size: clamp(0.85rem, 2vw, 1.2rem); flex-shrink: 0;
    }
    
    /* Tinggi grafik dirampingkan untuk HP */
    .chart-wrapper { flex-grow: 1; min-height: clamp(200px, 35vh, 320px); position: relative; width: 100%; }

    .badge-micro { font-size: clamp(0.55rem, 1.2vw, 0.7rem); padding: 4px 10px; letter-spacing: 0.5px; }
</style>
@endpush

@section('content')
    <div class="hero-mini text-center">
        <div class="container position-relative z-3 px-3">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="font-size: 0.75rem; letter-spacing: 1.5px;">PUSAT DATA ANALITIK</span>
            <h1 class="hero-title-main mb-3 text-white">Demografi & Sebaran Transmigrasi</h1>
            <p class="hero-subtitle text-white-50 mx-auto mb-0">Visualisasi data statistik persebaran transmigran Provinsi Jambi yang disajikan secara interaktif, <i>real-time</i>, dan transparan.</p>
        </div>
    </div>

    <div class="container mb-5" style="margin-top: clamp(-40px, -6vw, -60px); position: relative; z-index: 10;">
        <div class="row row-cols-2 row-cols-lg-4 g-2 g-md-3 g-lg-4"> <div class="col" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card-modern" data-bs-toggle="modal" data-bs-target="#modalJiwa">
                    <div class="icon-box bg-jiwa"><i class="bi bi-people-fill"></i></div>
                    <h2>{{ number_format($statistik['transmigran'] ?? 0) }}</h2><p>Total Jiwa</p>
                </div>
            </div>
            <div class="col" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card-modern" data-bs-toggle="modal" data-bs-target="#modalUptd">
                    <div class="icon-box bg-uptd"><i class="bi bi-building-check"></i></div>
                    <h2>{{ number_format($statistik['uptd'] ?? 0) }}</h2><p>Unit UPTD</p>
                </div>
            </div>
            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card-modern" data-bs-toggle="modal" data-bs-target="#modalKabupaten">
                    <div class="icon-box bg-kab"><i class="bi bi-map-fill"></i></div>
                    <h2>{{ $statistik['kabupaten'] ?? 0 }}</h2><p>Kabupaten</p>
                </div>
            </div>
            <div class="col" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card-modern" data-bs-toggle="modal" data-bs-target="#modalKecamatan">
                    <div class="icon-box bg-kec"><i class="bi bi-geo-alt-fill"></i></div>
                    <h2>{{ $statistik['kecamatan'] ?? 0 }}</h2><p>Kecamatan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container section-padding pt-0">
        
        <div class="row g-3 g-lg-4 mb-3 mb-lg-4">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="chart-box">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 mb-md-4">
                        <h6 class="chart-title mb-3 mb-md-0">
                            <span class="chart-icon bg-jiwa"><i class="bi bi-graph-up-arrow"></i></span>
                            Tren Pertumbuhan Populasi
                        </h6>
                        <select id="filterKabupaten" class="form-select form-select-sm w-100 w-md-auto fw-bold text-primary border-0 bg-light shadow-sm" style="border-radius: 10px; cursor: pointer; max-width: 100%;">
                            <option value="Semua">Semua Kabupaten</option>
                            @foreach($kabLabels ?? [] as $kab)
                                <option value="{{ $kab }}">{{ $kab }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="chart-wrapper"><canvas id="chartTahunan"></canvas></div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="chart-box">
                    <h6 class="chart-title mb-3 mb-md-4">
                        <span class="chart-icon bg-uptd"><i class="bi bi-pie-chart-fill"></i></span>
                        Sebaran per Kabupaten
                    </h6>
                    <div class="chart-wrapper"><canvas id="chartKabupaten"></canvas></div>
                </div>
            </div>
        </div>

        <div class="row g-3 g-lg-4 mb-3 mb-lg-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="150">
                <div class="chart-box">
                    <h6 class="chart-title mb-3 mb-md-4">
                        <span class="chart-icon bg-kab"><i class="bi bi-bar-chart-fill"></i></span>
                        Komparasi Kepala Keluarga vs Jiwa
                    </h6>
                    <div class="chart-wrapper"><canvas id="chartKkJiwa"></canvas></div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="chart-box">
                    <h6 class="chart-title mb-3 mb-md-4">
                        <span class="chart-icon bg-kec"><i class="bi bi-bullseye"></i></span>
                        Era Serah Terima UPTD
                    </h6>
                    <div class="chart-wrapper"><canvas id="chartEra"></canvas></div>
                </div>
            </div>
        </div>

        <div class="row g-3" data-aos="fade-up" data-aos-delay="250">
            <div class="col-12">
                <div class="chart-box">
                    <h6 class="chart-title mb-3 mb-md-4">
                        <span class="chart-icon" style="background: linear-gradient(135deg, #fef08a, #fde047); color: #b45309;"><i class="bi bi-trophy-fill"></i></span>
                        Top 5 UPTD Terpadat (Jumlah Jiwa)
                    </h6>
                    <div class="chart-wrapper"><canvas id="chartTopUptd"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.modals_welcome')
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
    Chart.defaults.color = '#94a3b8';
    
    // Tooltip Mewah & Responsif
    Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(15, 23, 42, 0.95)';
    Chart.defaults.plugins.tooltip.titleFont = { size: 13, weight: '800' };
    Chart.defaults.plugins.tooltip.bodyFont = { size: 12, weight: '500' };
    Chart.defaults.plugins.tooltip.padding = 12;
    Chart.defaults.plugins.tooltip.cornerRadius = 10;
    Chart.defaults.plugins.tooltip.boxPadding = 6;

    function createGradient(ctx, colorStart, colorEnd) {
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, colorStart);
        gradient.addColorStop(1, colorEnd);
        return gradient;
    }

    // --- 1. LINE CHART ---
    const ctxLine = document.getElementById('chartTahunan').getContext('2d');
    const dataAsliTahunan = {!! json_encode($totals ?? []) !!};
    const dataTrenKabupaten = {!! isset($trenKabupaten) ? json_encode($trenKabupaten) : '{}' !!};

    const chartLine = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: {!! json_encode($labels ?? []) !!},
            datasets: [{ 
                label: ' Total Jiwa (Semua Wilayah)', 
                data: dataAsliTahunan, 
                borderColor: '#3b82f6', 
                backgroundColor: createGradient(ctxLine, 'rgba(59, 130, 246, 0.6)', 'rgba(59, 130, 246, 0.05)'), 
                fill: true, tension: 0.4, borderWidth: 3, pointRadius: 0, pointHoverRadius: 6, pointHoverBackgroundColor: '#ffffff', pointHoverBorderColor: '#3b82f6', pointHoverBorderWidth: 2
            }]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, 
            scales: { y: { grid: { borderDash: [5, 5], color: '#f1f5f9' }, border: { display: false }, ticks: { font: {size: window.innerWidth < 768 ? 9 : 11} } }, x: { grid: { display: false }, border: { display: false }, ticks: { font: {weight: 'bold', size: window.innerWidth < 768 ? 9 : 11}, maxTicksLimit: window.innerWidth < 768 ? 5 : 10 } } },
            interaction: { mode: 'index', intersect: false } 
        }
    });

    document.getElementById('filterKabupaten').addEventListener('change', function() {
        const kabDipilih = this.value;
        if (kabDipilih === 'Semua') {
            chartLine.data.datasets[0].data = dataAsliTahunan;
            chartLine.data.datasets[0].label = ' Total Jiwa (Semua Wilayah)';
        } else {
            if (dataTrenKabupaten[kabDipilih]) {
                chartLine.data.datasets[0].data = dataTrenKabupaten[kabDipilih];
            } else {
                chartLine.data.datasets[0].data = Array({!! count($labels ?? []) !!}).fill(0); 
            }
            chartLine.data.datasets[0].label = ' Total Jiwa (' + kabDipilih + ')';
        }
        chartLine.update(); 
    });

    // --- 2. Doughnut Chart ---
    const ctxDoughnut = document.getElementById('chartKabupaten').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($kabLabels ?? []) !!},
            datasets: [{ 
                data: {!! json_encode($kabTotals ?? []) !!}, 
                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899', '#06b6d4', '#64748b'], 
                borderWidth: 3, borderColor: '#ffffff', hoverOffset: 10 
            }]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, cutout: '70%', 
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 15, font: {size: window.innerWidth < 768 ? 10 : 11, weight: '600'} } } }
        }
    });

    // --- 3. Grouped Bar Chart ---
    const ctxKkJiwa = document.getElementById('chartKkJiwa').getContext('2d');
    new Chart(ctxKkJiwa, {
        type: 'bar',
        data: {
            labels: {!! json_encode($kabLabels ?? []) !!},
            datasets: [
                { label: ' Kepala Keluarga', data: {!! json_encode($kabKkTotals ?? []) !!}, backgroundColor: createGradient(ctxKkJiwa, '#34d399', '#059669'), borderRadius: 6, barPercentage: 0.7 },
                { label: ' Total Jiwa', data: {!! json_encode($kabTotals ?? []) !!}, backgroundColor: createGradient(ctxKkJiwa, '#60a5fa', '#2563eb'), borderRadius: 6, barPercentage: 0.7 }
            ]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, 
            plugins: { legend: { position: 'top', align: window.innerWidth < 768 ? 'start' : 'center', labels: { usePointStyle: true, font: {weight: '700', size: window.innerWidth < 768 ? 10 : 11}, boxWidth: 8 } } }, 
            scales: { y: { grid: { borderDash: [5, 5], color: '#f1f5f9' }, border: { display: false }, ticks: { font: {size: window.innerWidth < 768 ? 9 : 10} } }, x: { grid: { display: false }, border: { display: false }, ticks: { font: {weight: '600', size: window.innerWidth < 768 ? 9 : 10} } } } 
        }
    });

    // --- 4. Polar Area Chart ---
    const ctxEra = document.getElementById('chartEra').getContext('2d');
    new Chart(ctxEra, {
        type: 'polarArea',
        data: {
            labels: {!! json_encode($eraLabels ?? []) !!},
            datasets: [{ 
                data: {!! json_encode($eraTotals ?? []) !!}, 
                backgroundColor: ['rgba(236, 72, 153, 0.7)', 'rgba(139, 92, 246, 0.7)', 'rgba(59, 130, 246, 0.7)', 'rgba(16, 185, 129, 0.7)', 'rgba(245, 158, 11, 0.7)'],
                borderColor: '#ffffff', borderWidth: 2
            }]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, 
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 15, font: {weight: '600', size: window.innerWidth < 768 ? 10 : 11} } } },
            scales: { r: { grid: { color: '#f8fafc' }, ticks: { display: false }, angleLines: { color: '#f1f5f9' } } }
        }
    });

    // --- 5. Horizontal Bar Chart ---
    const ctxBar = document.getElementById('chartTopUptd').getContext('2d');
    let gradientBar = ctxBar.createLinearGradient(0, 0, window.innerWidth > 768 ? 800 : 300, 0); 
    gradientBar.addColorStop(0, '#f59e0b'); gradientBar.addColorStop(1, '#ef4444'); 
    
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: {!! json_encode($uptdLabels ?? []) !!},
            datasets: [{ 
                label: ' Jumlah Penduduk', data: {!! json_encode($uptdTotals ?? []) !!}, 
                backgroundColor: gradientBar, borderRadius: 8, maxBarThickness: 25 
            }]
        },
        options: {
            indexAxis: 'y', responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } },
            scales: { x: { grid: { borderDash: [5, 5], color: '#f1f5f9' }, border: { display: false }, ticks: { font: {size: window.innerWidth < 768 ? 9 : 10} } }, y: { grid: { display: false }, border: { display: false }, ticks: { font: {weight: 'bold', size: window.innerWidth < 768 ? 9 : 11}, color: '#334155' } } }
        }
    });
</script>
@endpush