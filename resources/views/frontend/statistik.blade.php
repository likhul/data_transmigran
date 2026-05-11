@extends('layouts.frontend')
@section('title', 'Statistik & Analisis | SI-Trans Jambi')

@push('css')
<style>
    :root {
        --md-surface: #ffffff;
        --md-background: #f8fafc;
        --md-primary: #2563eb;
        --soft-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        --hover-shadow: 0 15px 35px rgba(37, 99, 235, 0.12);
        --grid-color: rgba(148, 163, 184, 0.2); 
    }

    body { background-color: var(--md-background); font-size: 14px; overflow-x: hidden; }

    /* --- HERO SECTION --- */
    .hero-mini {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(79, 70, 229, 0.6) 100%), 
                    url('https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?auto=format&fit=crop&q=80&w=2000');
        background-size: cover; 
        background-position: center;
        background-attachment: fixed;
        padding: clamp(120px, 15vh, 150px) 0 clamp(60px, 10vh, 100px);
        position: relative; 
        color: white;
        border-bottom-left-radius: 40px; 
        border-bottom-right-radius: 40px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
    }
    
    .hero-title-main { 
        font-weight: 900; font-size: clamp(1.5rem, 5vw, 3rem); 
        letter-spacing: -0.5px; line-height: 1.2; margin-bottom: 12px !important; 
        text-shadow: 0 4px 15px rgba(0,0,0,0.3); 
    }
    .hero-subtitle { 
        font-size: clamp(0.9rem, 2vw, 1.15rem); line-height: 1.6; 
        max-width: 650px; opacity: 0.95; font-weight: 400;
    }

    /* --- STAT CARD --- */
    .stat-card-modern {
        background: var(--md-surface); border-radius: clamp(16px, 3vw, 24px); 
        padding: clamp(18px, 2.5vw, 25px) clamp(12px, 1.5vw, 15px);
        text-align: center; cursor: pointer; box-shadow: var(--soft-shadow); 
        border: 1px solid rgba(226,232,240,0.8); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        position: relative; height: 100%; display: flex; flex-direction: column; justify-content: center;
    }
    .stat-card-modern:hover { transform: translateY(-8px); box-shadow: var(--hover-shadow); border-color: var(--md-primary); }
    
    .stat-card-modern .icon-box {
        width: clamp(50px, 7vw, 65px); height: clamp(50px, 7vw, 65px); border-radius: clamp(14px, 2vw, 20px); 
        display: flex; align-items: center; justify-content: center;
        font-size: clamp(1.4rem, 3.5vw, 2rem); margin: 0 auto 15px; transition: 0.3s;
    }
    .stat-card-modern:hover .icon-box { transform: scale(1.1) rotate(10deg); }
    
    .bg-jiwa { background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); color: #2563eb; } 
    .bg-uptd { background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #059669; }
    .bg-kab { background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%); color: #ea580c; } 
    .bg-kec { background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%); color: #7c3aed; }
    
    .stat-card-modern h2 { font-weight: 900; font-size: clamp(1.5rem, 4.5vw, 2.5rem); margin-bottom: 5px; color: #0f172a; letter-spacing: -1px; line-height: 1; }
    .stat-card-modern p { font-weight: 800; color: #64748b; font-size: clamp(0.65rem, 1.5vw, 0.85rem); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0; }

    /* --- CHART BOX --- */
    .chart-box { 
        background: var(--md-surface); border-radius: clamp(20px, 3.5vw, 28px); 
        padding: clamp(20px, 3.5vw, 35px); border: 1px solid rgba(226,232,240,0.8); 
        box-shadow: var(--soft-shadow); height: 100%; display: flex; flex-direction: column; 
        transition: 0.4s ease; overflow: hidden;
    }
    .chart-box:hover { box-shadow: 0 15px 40px rgba(0,0,0,0.08); }
    
    .chart-title { font-weight: 900; font-size: clamp(1rem, 2.2vw, 1.25rem); color: #0f172a; margin-bottom: 25px; display: flex; align-items: center; line-height: 1.3; }
    .chart-icon { 
        width: clamp(35px, 6.5vw, 48px); height: clamp(35px, 6.5vw, 48px); border-radius: clamp(10px, 1.5vw, 14px); 
        display: inline-flex; align-items: center; justify-content: center; margin-right: 15px; font-size: clamp(1.1rem, 2.5vw, 1.4rem); flex-shrink: 0;
    }
    
    /* Area grafik diperbesar agar tidak terlihat kecil */
    .chart-wrapper { flex-grow: 1; min-height: clamp(350px, 45vh, 450px); position: relative; width: 100%; }

    /* --- MOBILE OPTIMIZATION --- */
    @media (max-width: 767.98px) {
        .stat-card-modern { padding: 15px 10px; }
        .chart-box { padding: 15px; }
        .chart-title { margin-bottom: 15px; flex-direction: column; align-items: flex-start; gap: 10px; }
        .select-kabupaten-wrapper { width: 100%; margin-top: 10px; }
        .chart-wrapper { min-height: 300px; }
    }
</style>
@endpush

@section('content')
    <div class="hero-mini text-center">
        <div class="container position-relative z-3 px-3">
            <span class="badge bg-white text-primary px-4 py-2 rounded-pill fw-bold mb-3 shadow" style="font-size: 0.8rem; letter-spacing: 1.5px;">PUSAT DATA ANALITIK</span>
            <h1 class="hero-title-main mb-3 text-white">Demografi & Sebaran Transmigrasi</h1>
            <p class="hero-subtitle text-white-50 mx-auto mb-0">Visualisasi data statistik persebaran transmigran Provinsi Jambi yang disajikan secara interaktif, <i>real-time</i>, dan transparan.</p>
        </div>
    </div>

    <div class="container mb-5" style="margin-top: clamp(-50px, -8vw, -80px); position: relative; z-index: 10;">
        <div class="row row-cols-2 row-cols-lg-4 g-3 g-md-4"> 
            <div class="col" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card-modern" data-bs-toggle="modal" data-bs-target="#modalJiwa">
                    <div class="icon-box bg-jiwa"><i class="bi bi-people-fill"></i></div>
                    <h2>{{ number_format($statistik['transmigran'] ?? 0) }}</h2><p>Total Jiwa</p>
                </div>
            </div>
            <div class="col" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card-modern" data-bs-toggle="modal" data-bs-target="#modalUptd">
                    <div class="icon-box bg-uptd"><i class="bi bi-building-check"></i></div>
                    <h2>{{ number_format($statistik['uptd'] ?? 0) }}</h2><p>Unit UPT</p>
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
                        <h6 class="chart-title mb-0">
                            <span class="chart-icon bg-jiwa"><i class="bi bi-graph-up-arrow"></i></span>
                            Tren Pertumbuhan Populasi
                        </h6>
                        <div class="select-kabupaten-wrapper">
                            <select id="filterKabupaten" class="form-select form-select-sm w-100 fw-bold text-primary border-0 bg-light shadow-sm" style="border-radius: 10px; cursor: pointer; padding: 10px 35px 10px 15px;">
                                <option value="Semua">Semua Kabupaten</option>
                                @foreach($kabLabels ?? [] as $kab)
                                    <option value="{{ $kab }}">{{ $kab }}</option>
                                @endforeach
                            </select>
                        </div>
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
                        Komparasi Total Keluarga dan Total Jiwa
                    </h6>
                    <div class="chart-wrapper"><canvas id="chartKkJiwa"></canvas></div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="chart-box">
                    <h6 class="chart-title mb-3 mb-md-4">
                        <span class="chart-icon bg-kec"><i class="bi bi-bullseye"></i></span>
                        Era Serah Terima UPT
                    </h6>
                    <div class="chart-wrapper"><canvas id="chartEra"></canvas></div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3 pb-3" data-aos="fade-up" data-aos-delay="250">
            <div class="col-12">
                <div class="chart-box">
                    <h6 class="chart-title mb-3 mb-md-4">
                        <span class="chart-icon" style="background: linear-gradient(135deg, #fef08a, #fde047); color: #b45309;"><i class="bi bi-trophy-fill"></i></span>
                        Top 5 UPT Terpadat (Jumlah Jiwa)
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
    Chart.defaults.color = '#64748b'; 
    
    // Tooltip Mewah & Responsif
    Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(15, 23, 42, 0.95)';
    Chart.defaults.plugins.tooltip.titleFont = { size: 14, weight: '800' };
    Chart.defaults.plugins.tooltip.bodyFont = { size: 13, weight: '500' };
    Chart.defaults.plugins.tooltip.padding = 15;
    Chart.defaults.plugins.tooltip.cornerRadius = 12;
    Chart.defaults.plugins.tooltip.boxPadding = 8;
    Chart.defaults.plugins.tooltip.borderColor = 'rgba(255,255,255,0.1)';
    Chart.defaults.plugins.tooltip.borderWidth = 1;

    const formatNumber = (num) => {
        return num.toLocaleString('id-ID');
    };

    function createGradient(ctx, colorStart, colorEnd) {
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, colorStart);
        gradient.addColorStop(1, colorEnd);
        return gradient;
    }

    const gridStyle = { display: true, color: 'rgba(148, 163, 184, 0.2)', borderDash: [5, 5] };

    // --- 1. LINE CHART ---
    const ctxLine = document.getElementById('chartTahunan').getContext('2d');
    const dataAsliTahunan = {!! json_encode($totals ?? []) !!};
    const dataTrenKabupaten = {!! isset($trenKabupaten) ? json_encode($trenKabupaten) : '{}' !!};

    const chartLine = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: {!! json_encode($labels ?? []) !!},
            datasets: [{ 
                label: ' Total Jiwa', 
                data: dataAsliTahunan, 
                borderColor: '#3b82f6', 
                backgroundColor: createGradient(ctxLine, 'rgba(59, 130, 246, 0.5)', 'rgba(59, 130, 246, 0.0)'), 
                fill: true, tension: 0.4, borderWidth: 4, pointRadius: 0, pointHoverRadius: 8, 
                pointHoverBackgroundColor: '#ffffff', pointHoverBorderColor: '#3b82f6', pointHoverBorderWidth: 3
            }]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, 
            plugins: { 
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + formatNumber(context.parsed.y);
                        }
                    }
                }
            }, 
            scales: { 
                y: { 
                    grid: gridStyle, border: { display: false }, 
                    ticks: { font: {size: window.innerWidth < 768 ? 10 : 12, weight: '600'} } 
                }, 
                x: { 
                    grid: gridStyle, border: { display: false }, 
                    ticks: { 
                        font: {weight: '700', size: window.innerWidth < 768 ? 10 : 12}, 
                        autoSkip: false, 
                        maxRotation: 0,
                        callback: function(val, index) {
                            let label = this.getLabelForValue(val);
                            let year = parseInt(label);
                            if (!isNaN(year) && year % 5 === 0) {
                                return year;
                            }
                            return null;
                        }
                    } 
                } 
            },
            interaction: { mode: 'index', intersect: false } 
        }
    });

    document.getElementById('filterKabupaten').addEventListener('change', function() {
        const kabDipilih = this.value;
        if (kabDipilih === 'Semua') {
            chartLine.data.datasets[0].data = dataAsliTahunan;
        } else {
            chartLine.data.datasets[0].data = dataTrenKabupaten[kabDipilih] || Array({!! count($labels ?? []) !!}).fill(0); 
        }
        chartLine.update(); 
    });

    // --- 2. Doughnut Chart ---
    // --- 2. Doughnut Chart ---
    const ctxDoughnut = document.getElementById('chartKabupaten').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($kabLabels ?? []) !!},
            datasets: [{ 
                data: {!! json_encode($kabTotals ?? []) !!}, 
                // PALET WARNA DIPERBANYAK MENJADI 12 WARNA UNIK
                backgroundColor: [
                    '#3b82f6', // Biru
                    '#10b981', // Hijau Emerald
                    '#f59e0b', // Oranye/Amber
                    '#8b5cf6', // Ungu
                    '#ec4899', // Pink
                    '#06b6d4', // Cyan
                    '#64748b', // Slate / Abu-abu
                    '#ef4444', // Merah
                    '#84cc16', // Lime (Hijau Muda)
                    '#eab308', // Kuning
                    '#4f46e5', // Indigo (Biru Tua)
                    '#14b8a6'  // Teal (Hijau Tosca)
                ], 
                borderWidth: 4, borderColor: '#ffffff', hoverOffset: 12 
            }]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, cutout: '72%', 
            plugins: { 
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20, font: {size: window.innerWidth < 768 ? 10 : 12, weight: '700'} } },
                tooltip: { callbacks: { label: function(context) { return ' ' + formatNumber(context.parsed) + ' Jiwa'; } } }
            }
        }
    });

    // --- 3. Grouped Bar Chart (DIBUAT LEBIH BESAR DAN TEBAL) ---
    const ctxKkJiwa = document.getElementById('chartKkJiwa').getContext('2d');
    new Chart(ctxKkJiwa, {
        type: 'bar',
        data: {
            labels: {!! json_encode($kabLabels ?? []) !!},
            datasets: [
                // Mengatur barPercentage menjadi 0.9 agar batangnya lebih tebal
                { label: ' Total Keluarga', data: {!! json_encode($kabKkTotals ?? []) !!}, backgroundColor: createGradient(ctxKkJiwa, '#34d399', '#059669'), borderRadius: 8, barPercentage: 0.9, categoryPercentage: 0.8 },
                { label: ' Total Jiwa', data: {!! json_encode($kabTotals ?? []) !!}, backgroundColor: createGradient(ctxKkJiwa, '#60a5fa', '#2563eb'), borderRadius: 8, barPercentage: 0.9, categoryPercentage: 0.8 }
            ]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, 
            plugins: { 
                legend: { position: 'top', align: window.innerWidth < 768 ? 'start' : 'center', labels: { usePointStyle: true, font: {weight: '800', size: window.innerWidth < 768 ? 10 : 12}, boxWidth: 10, padding: 20 } },
                tooltip: { callbacks: { label: function(context) { return context.dataset.label + ': ' + formatNumber(context.parsed.y); } } }
            }, 
            scales: { 
                y: { grid: gridStyle, border: { display: false }, ticks: { font: {size: window.innerWidth < 768 ? 10 : 12, weight: '600'} } }, 
                x: { grid: gridStyle, border: { display: false }, ticks: { font: {weight: '700', size: window.innerWidth < 768 ? 10 : 12} } } 
            } 
        }
    });

    // --- 4. Polar Area Chart ---
    const ctxEra = document.getElementById('chartEra').getContext('2d');
    const eraColors = [
        'rgba(99, 102, 241, 0.85)', 'rgba(236, 72, 153, 0.85)', 'rgba(16, 185, 129, 0.85)', 
        'rgba(245, 158, 11, 0.85)', 'rgba(59, 130, 246, 0.85)', 'rgba(139, 92, 246, 0.85)', 
        'rgba(14, 165, 233, 0.85)', 'rgba(244, 63, 94, 0.85)'
    ];

    new Chart(ctxEra, {
        type: 'polarArea',
        data: {
            labels: {!! json_encode($eraLabels ?? []) !!},
            datasets: [{ 
                data: {!! json_encode($eraTotals ?? []) !!}, 
                backgroundColor: eraColors, borderColor: '#ffffff', borderWidth: 3
            }]
        },
        options: { 
            responsive: true, maintainAspectRatio: false, 
            plugins: { 
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 15, font: {weight: '700', size: window.innerWidth < 768 ? 10 : 12} } },
                tooltip: { callbacks: { label: function(context) { return ' ' + formatNumber(context.parsed.r) + ' UPT'; } } }
            },
            scales: { r: { grid: { color: 'rgba(148, 163, 184, 0.2)' }, ticks: { display: false }, angleLines: { color: 'rgba(148, 163, 184, 0.2)' } } }
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
                backgroundColor: gradientBar, borderRadius: 10, maxBarThickness: 35 
            }]
        },
        options: {
            indexAxis: 'y', responsive: true, maintainAspectRatio: false, 
            plugins: { 
                legend: { display: false },
                tooltip: { callbacks: { label: function(context) { return ' Populasi: ' + formatNumber(context.parsed.x) + ' Jiwa'; } } }
            },
            scales: { 
                x: { grid: gridStyle, border: { display: false }, ticks: { font: {size: window.innerWidth < 768 ? 10 : 12, weight: '600'} } }, 
                y: { grid: { display: false }, border: { display: false }, ticks: { font: {weight: '800', size: window.innerWidth < 768 ? 10 : 12}, color: '#0f172a' } } 
            }
        }
    });
</script>
@endpush