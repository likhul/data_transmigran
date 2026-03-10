<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->judul_website }}</title>
    
    @if($profil->favicon_website)
        <link rel="icon" href="{{ asset('logo/' . $profil->favicon_website) }}">
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1e3c72;
            --secondary-color: #2a5298;
            --accent-color: #f39c12;
            --dark-bg: #121212;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            overflow-x: hidden; 
            color: #333;
            background-color: #fcfcfc;
        }

        /* Navbar Glassmorphism */
        .navbar { 
            backdrop-filter: blur(15px); 
            background: rgba(33, 37, 41, 0.9) !important; 
            padding: 15px 0;
        }

        /* Hero Section - Padding ditingkatkan agar tidak tumpang tindih */
        .hero-section {
            background: linear-gradient(rgba(15, 32, 67, 0.85), rgba(20, 43, 89, 0.85)), 
                        url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=2000');
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed;
            color: white; 
            padding: 220px 0 280px 0; /* Ruang sangat luas untuk teks */
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);
        }

        /* Stat Cards - Floating Effect */
        .stats-wrapper {
            margin-top: -120px;
            position: relative;
            z-index: 10;
        }
        .stat-card { 
            border: none; 
            border-radius: 24px; 
            background: white;
            box-shadow: 0 15px 45px rgba(0,0,0,0.1); 
            transition: 0.4s;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .stat-card:hover { transform: translateY(-10px); }

        .section-title { font-weight: 800; letter-spacing: -1px; margin-bottom: 40px; }
        .section-title span { color: var(--secondary-color); }

        /* Chart Card */
        .chart-container {
            background: white;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        }

        /* Team Slider Boxy */
        .team-box {
            width: 260px; height: 260px; overflow: hidden;
            border-radius: 25px; border: 6px solid white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        .team-box img { width: 100%; height: 100%; object-fit: cover; }

        /* Maps Boxed - Tidak Full Layar */
        .map-box {
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            border: 8px solid white;
        }
        .map-box iframe { width: 100%; height: 400px; border: 0; display: block; }

        /* Small Contact Info */
        .contact-minimalist {
            background: #f8f9fa;
            border-top: 1px solid #eee;
            padding: 30px 0;
        }
        .contact-item h6 { font-size: 0.75rem; color: #888; letter-spacing: 1px; margin-bottom: 5px; }
        .contact-item p { font-size: 0.9rem; font-weight: 600; margin-bottom: 0; }
        
        .social-link {
            width: 35px; height: 35px;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 10px; background: white; color: #333;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: 0.3s;
        }
        .social-link:hover { transform: translateY(-3px); background: var(--secondary-color); color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                @if($profil->logo_website)
                    <img src="{{ asset('logo/' . $profil->logo_website) }}" alt="Logo" height="40" class="me-2 bg-white rounded p-1">
                @endif
                {{ $profil->judul_website }}
            </a>
            <div class="ms-auto">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm">Admin Panel</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill px-4">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container" data-aos="fade-up">
            <h1 class="display-3 fw-800 mb-4" style="font-weight: 800;">Portal Data Informasi <br><span class="text-warning">Transmigrasi Jambi</span></h1>
            <p class="lead opacity-75 mx-auto" style="max-width: 850px;">{{ $profil->deskripsi_singkat }}</p>
        </div>
    </section>

    <div class="stats-wrapper">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card stat-card p-4">
                        <i class="bi bi-people-fill text-primary fs-2 mb-2"></i>
                        <h2 class="fw-bold mb-0">{{ number_format($statistik['transmigran'] ?? 0) }}</h2>
                        <span class="text-muted small fw-bold">TOTAL TRANSMIGRAN</span>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card stat-card p-4">
                        <i class="bi bi-geo-alt-fill text-success fs-2 mb-2"></i>
                        <h2 class="fw-bold mb-0">{{ number_format($statistik['uptd'] ?? 0) }}</h2>
                        <span class="text-muted small fw-bold">UNIT WILAYAH UPTD</span>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card stat-card p-4">
                        <i class="bi bi-arrow-repeat text-warning fs-2 mb-2"></i>
                        <h2 class="fw-bold mb-0">{{ number_format($statistik['mutasi'] ?? 0) }}</h2>
                        <span class="text-muted small fw-bold">RIWAYAT MUTASI</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container my-5 py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Visualisasi <span>Pertumbuhan</span></h2>
            <p class="text-muted">Akumulasi pertumbuhan Kepala Keluarga (KK) per tahun penempatan.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <div class="chart-container">
                    <canvas id="chartTahunan" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark py-5" style="background: linear-gradient(#1a1a1a, #000);">
        <div class="container text-center py-5 text-white" data-aos="fade-up">
            <h2 class="section-title text-white">Struktur <span>Organisasi</span></h2>
            <div id="carouselStruktur" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
                <div class="carousel-inner">
                    @foreach($penguruses as $key => $p)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="d-flex flex-column align-items-center">
                            <div class="team-box"><img src="{{ asset('pengurus/'.$p->foto) }}"></div>
                            <h4 class="fw-bold mb-1">{{ $p->nama }}<span class="text-warning">{{ $p->gelar ? ', '.$p->gelar : '' }}</span></h4>
                            <p class="text-primary text-uppercase fw-bold small">{{ $p->jabatan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-9" data-aos="zoom-in">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Lokasi <span>Kantor</span></h2>
                    </div>
                    <div class="map-box shadow">
                        @if($profil->google_maps) 
                            {!! $profil->google_maps !!} 
                        @else 
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 400px;">
                                <p class="text-muted">Peta lokasi belum tersedia.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-minimalist">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 contact-item mb-3 mb-md-0">
                    <h6>ALAMAT KANTOR</h6>
                    <p>{{ $profil->alamat_kantor ?? '-' }}</p>
                </div>
                <div class="col-md-4 contact-item mb-3 mb-md-0">
                    <h6>HUBUNGI KAMI</h6>
                    <p>{{ $profil->nomor_telepon ?? '-' }}</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-flex justify-content-md-end gap-2">
                        @if($profil->link_facebook) <a href="{{ $profil->link_facebook }}" class="social-link"><i class="bi bi-facebook"></i></a> @endif
                        @if($profil->link_instagram) <a href="{{ $profil->link_instagram }}" class="social-link"><i class="bi bi-instagram"></i></a> @endif
                        @if($profil->link_youtube) <a href="{{ $profil->link_youtube }}" class="social-link"><i class="bi bi-youtube"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 bg-white border-top text-center text-muted small">
        <div class="container">&copy; {{ date('Y') }} {{ $profil->judul_website }}. Hak Cipta Dilindungi.</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        AOS.init({ duration: 1000, once: true });

        const ctx = document.getElementById('chartTahunan').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(30, 60, 114, 0.4)');
        gradient.addColorStop(1, 'rgba(30, 60, 114, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total Akumulasi KK',
                    data: {!! json_encode($totals) !!},
                    borderColor: '#1e3c72',
                    backgroundColor: gradient,
                    borderWidth: 4,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        ticks: { callback: function(value) { return value.toLocaleString('id-ID') + ' KK'; } }
                    }
                }
            }
        });
    </script>
</body>
</html>