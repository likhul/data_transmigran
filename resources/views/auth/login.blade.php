<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SI Transmigran Jambi</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --navy-dark: #0f172a;
            --blue-primary: #2563eb;
            --blue-hover: #1d4ed8;
            --slate-400: #94a3b8;
            --slate-100: #f1f5f9;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f172a;
            background-image: 
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(29, 78, 216, 0.1) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(15, 23, 42, 1) 0px, transparent 100%);
            /* PERBAIKAN 1: Ganti height jadi min-height dan hapus overflow:hidden agar bisa di-scroll saat keyboard HP muncul */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 15px; 
        }

        .login-card {
            display: flex;
            width: 100%;
            max-width: 900px;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            animation: cardAppear 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin: auto; /* Membantu centering saat halaman di-scroll */
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* SISI KIRI: VISUAL BRANDING */
        .brand-side {
            flex: 1;
            background: var(--navy-dark);
            background-image: linear-gradient(145deg, #0f172a 0%, #1e3a8a 100%);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            color: white;
        }

        .brand-logo-wrapper {
            width: 50px; height: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .brand-side h1 { font-weight: 800; font-size: 1.8rem; letter-spacing: -0.5px; margin-bottom: 10px; line-height: 1.2; }
        .brand-side p { font-size: 0.9rem; opacity: 0.8; font-weight: 400; line-height: 1.5; margin-bottom: 0;}

        /* SISI KANAN: FORM LOGIN */
        .form-side {
            flex: 1.2;
            padding: 40px 50px;
            display: flex; flex-direction: column; justify-content: center;
            background: white;
        }

        .form-side h2 { font-weight: 800; color: var(--navy-dark); margin-bottom: 5px; font-size: 1.6rem;}
        .subtitle { color: var(--slate-400); font-weight: 500; margin-bottom: 25px; font-size: 0.85rem; }

        .form-label {
            font-weight: 700; font-size: 0.7rem; color: var(--navy-dark);
            text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;
        }

        .input-box { position: relative; margin-bottom: 18px; }
        .input-box i {
            position: absolute; left: 16px; top: 50%; transform: translateY(-50%);
            color: var(--slate-400); font-size: 1rem; transition: 0.3s;
        }

        .form-control-premium {
            background: var(--slate-100); border: 2px solid transparent; border-radius: 12px;
            padding: 12px 15px 12px 45px; font-size: 0.9rem; font-weight: 500;
            color: var(--navy-dark); width: 100%; transition: 0.3s;
        }

        .form-control-premium:focus {
            background: white; border-color: var(--blue-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08); outline: none;
        }
        .form-control-premium:focus + i { color: var(--blue-primary); }

        .btn-login {
            background: linear-gradient(135deg, var(--blue-primary) 0%, #1d4ed8 100%);
            color: white; border: none; border-radius: 12px;
            padding: 12px; font-weight: 700; font-size: 0.9rem;
            width: 100%; margin-top: 10px; transition: 0.3s;
            box-shadow: 0 8px 15px -5px rgba(37, 99, 235, 0.4);
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 20px -5px rgba(37, 99, 235, 0.5); }

        .alert-modern {
            background: #fff1f2; border-radius: 12px; color: #e11d48;
            font-size: 0.8rem; font-weight: 600; padding: 10px 15px;
            margin-bottom: 20px; border: 1px solid #ffe4e6;
        }

        .back-link { text-align: center; margin-top: 25px; }
        .back-link a {
            color: var(--slate-400); text-decoration: none;
            font-size: 0.8rem; font-weight: 600; transition: 0.3s;
        }
        .back-link a:hover { color: var(--blue-primary); }

        /* PERBAIKAN 2: RESPONSIF MOBILE EKSTREM */
        @media (max-width: 768px) {
            .login-card { 
                flex-direction: column; 
                max-width: 400px; /* Dipersempit agar proporsional di HP */
                border-radius: 20px;
            }
            .brand-side { 
                padding: 30px 20px; 
                text-align: center; 
                align-items: center; 
            }
            .brand-logo-wrapper { 
                width: 45px; height: 45px; font-size: 1.2rem; margin-bottom: 12px; 
            }
            .brand-side h1 { font-size: 1.4rem; margin-bottom: 5px; }
            /* Menyembunyikan deskripsi di HP agar form login langsung terlihat tanpa scroll jauh */
            .brand-side p { display: none; } 
            
            .form-side { padding: 25px 20px 30px; }
            .form-side h2 { font-size: 1.4rem; }
            .subtitle { margin-bottom: 20px; font-size: 0.8rem; }
            
            .input-box { margin-bottom: 15px; }
            .form-control-premium { padding: 10px 15px 10px 40px; font-size: 0.85rem; }
            .input-box i { left: 14px; font-size: 0.95rem; }
            
            .btn-login { padding: 10px; font-size: 0.85rem; margin-top: 5px; }
            .back-link { margin-top: 20px; }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-side">
            <div class="brand-logo-wrapper">
                <i class="bi bi-compass-fill"></i>
            </div>
            <h1>SI-Trans Jambi</h1>
            <p>Akses Portal Manajemen Strategis Transmigrasi Provinsi Jambi. Monitoring dan integrasi data dalam satu genggaman.</p>
        </div>

        <div class="form-side">
            <h2>Masuk</h2>
            <p class="subtitle">Gunakan kredensial akun admin Anda</p>

            @if ($errors->any())
                <div class="alert-modern">
                    <i class="bi bi-exclamation-circle-fill me-2"></i> Kredensial tidak valid.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="input-box">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control-premium" 
                           placeholder="admin@email.com" value="{{ old('email') }}" required autofocus>
                    <i class="bi bi-envelope-at"></i>
                </div>

                <div class="input-box">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control-premium" 
                           placeholder="••••••••" required>
                    <i class="bi bi-key"></i>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label small fw-semibold text-muted" for="remember" style="font-size: 0.8rem;">
                            Ingat Sesi
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    MASUK SEKARANG <i class="bi bi-arrow-right-short ms-1 fs-5 align-middle"></i>
                </button>
            </form>

            <div class="back-link">
                <a href="{{ url('/') }}">
                    <i class="bi bi-house-door me-1"></i> Beranda Utama
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>