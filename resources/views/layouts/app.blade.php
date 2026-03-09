<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SI Transmigran Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('css')
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background-color: #1e293b; color: white; padding-top: 20px; }
        .sidebar a { color: #cbd5e1; text-decoration: none; padding: 12px 20px; display: block; font-weight: 500; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: #334155; color: white; border-left: 4px solid #3b82f6; }
        .main-content { padding: 30px; }
        .navbar-custom { background-color: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar d-none d-md-block">
            <h4 class="text-center text-white fw-bold mb-4">SI Transmigran</h4>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">📊 Dashboard</a>
            <a href="{{ url('/transmigran') }}" class="{{ request()->is('transmigran*') ? 'active' : '' }}">👨‍👩‍👧‍👦 Data Warga</a>
            <a href="{{ url('/mutasi') }}" class="{{ request()->is('mutasi*') ? 'active' : '' }}">🔄 Mutasi</a>
            <a href="{{ url('/uptd') }}" class="{{ request()->is('uptd*') ? 'active' : '' }}">🏢 Data UPTD</a>

            @if(auth()->check() && auth()->user()->role === 'superadmin')
                <a href="{{ url('/pengaturan-admin') }}" class="{{ request()->is('pengaturan-admin*') ? 'active' : '' }}">👥 Manajemen Admin</a>
                <a href="{{ route('admin.log') }}" class="{{ request()->routeIs('admin.log') ? 'active' : '' }}">📹 Log Aktivitas</a>
            @endif
        </div>

        <div class="col-md-10 p-0">
            <nav class="navbar navbar-expand-lg navbar-custom px-4 py-3 mb-4">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 fw-bold text-primary">Sistem Informasi Transmigran Jambi</span>
                    
                    <div class="d-flex align-items-center">
                        <span class="me-3 fw-bold text-secondary">👤 {{ Auth::user()->name ?? 'Admin' }}</span>
                        
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm border-0">
                                🚪 Logout
                            </button>
                        </form>

                    </div>
                </div>
            </nav>

            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@stack('scripts')
</body>
</html>