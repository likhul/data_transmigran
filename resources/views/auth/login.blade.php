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
            /* Mesh Gradient Background */
            background-image: 
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(29, 78, 216, 0.1) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(15, 23, 42, 1) 0px, transparent 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px; /* Jarak agar tidak menyentuh pinggir layar di HP */
            overflow: hidden;
        }

        .login-card {
            display: flex;
            width: 100%;
            max-width: 900px; /* Lebar persegi panjang yang ideal */
            background: #ffffff;
            border-radius: 32px; /* Lebih melengkung agar modern */
            overflow: hidden;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.6);
            animation: cardAppear 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: scale(0.95) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* SISI KIRI: VISUAL BRANDING */
        .brand-side {
            flex: 1;
            background: var(--navy-dark);
            background-image: linear-gradient(145deg, #0f172a 0%, #1e3a8a 100%);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            color: white;
        }

        .brand-logo-wrapper {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .brand-side h1 {
            font-weight: 800;
            font-size: 2.2rem;
            letter-spacing: -1px;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .brand-side p {
            font-size: 0.95rem;
            opacity: 0.7;
            font-weight: 500;
            line-height: 1.6;
        }

        /* SISI KANAN: FORM LOGIN */
        .form-side {
            flex: 1.2;
            padding: 50px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .form-side h2 {
            font-weight: 800;
            color: var(--navy-dark);
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: var(--slate-400);
            font-weight: 500;
            margin-bottom: 35px;
            font-size: 0.9rem;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.75rem;
            color: var(--navy-dark);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }

        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--slate-400);
            font-size: 1.1rem;
            transition: 0.3s;
        }

        .form-control-premium {
            background: var(--slate-100);
            border: 2px solid transparent;
            border-radius: 16px;
            padding: 14px 20px 14px 52px;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--navy-dark);
            width: 100%;
            transition: 0.3s;
        }

        .form-control-premium:focus {
            background: white;
            border-color: var(--blue-primary);
            box-shadow: 0 0 0 5px rgba(37, 99, 235, 0.08);
            outline: none;
        }

        .form-control-premium:focus + i {
            color: var(--blue-primary);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--blue-primary) 0%, #1d4ed8 100%);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 14px;
            font-weight: 700;
            font-size: 0.95rem;
            width: 100%;
            margin-top: 10px;
            transition: 0.3s;
            box-shadow: 0 8px 20px -5px rgba(37, 99, 235, 0.4);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -5px rgba(37, 99, 235, 0.5);
        }

        .alert-modern {
            background: #fff1f2;
            border-radius: 14px;
            color: #e11d48;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1px solid #ffe4e6;
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: var(--slate-400);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-link a:hover { color: var(--blue-primary); }

        /* RESPONSIVE */
        @media (max-width: 850px) {
            .login-card { flex-direction: column; max-width: 420px; }
            .brand-side { padding: 40px; text-align: center; align-items: center; }
            .form-side { padding: 40px; }
            .brand-side h1 { font-size: 1.8rem; }
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
                    <i class="bi bi-exclamation-circle-fill me-2"></i> Akun tidak ditemukan.
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

                <div class="d-flex align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label small fw-semibold text-muted" for="remember">
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