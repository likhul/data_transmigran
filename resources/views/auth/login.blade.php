<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | {{ config('app.name') }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--primary-gradient);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        /* Dekorasi Lingkaran Latar Belakang */
        .circle-deco {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.4);
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #555;
            margin-left: 5px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            background: #fdfdfd;
            transition: 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(30, 60, 114, 0.1);
            border-color: #1e3c72;
        }

        .btn-login {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            color: white;
            width: 100%;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(30, 60, 114, 0.3);
            color: white;
        }

        .back-to-home {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            color: #888;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .back-to-home:hover {
            color: #1e3c72;
        }
    </style>
</head>
<body>

    <div class="circle-deco" style="width: 300px; height: 300px; top: -50px; left: -50px;"></div>
    <div class="circle-deco" style="width: 200px; height: 200px; bottom: -30px; right: -30px;"></div>

    <div class="login-card">
        <div class="text-center mb-4">
            <div class="brand-logo">
                <i class="bi bi-shield-lock-fill text-primary fs-1"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">Login Admin</h4>
            <p class="text-muted small">Silakan masuk untuk mengelola data</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger py-2 small border-0 mb-4" style="border-radius: 10px;">
                <i class="bi bi-exclamation-circle-fill me-2"></i> Email atau Password salah.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius: 12px 0 0 12px;">
                        <i class="bi bi-envelope text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0" 
                           placeholder="nama@email.com" value="{{ old('email') }}" required autofocus style="border-radius: 0 12px 12px 0;">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius: 12px 0 0 12px;">
                        <i class="bi bi-lock text-muted"></i>
                    </span>
                    <input type="password" name="password" class="form-control border-start-0" 
                           placeholder="••••••••" required style="border-radius: 0 12px 12px 0;">
                </div>
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login shadow-sm">
                MASUK SEKARANG <i class="bi bi-arrow-right-short ms-1"></i>
            </button>
        </form>

        <div class="text-center">
            <a href="{{ url('/') }}" class="back-to-home">
                <i class="bi bi-house-door me-1"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>