<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Transmigran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .login-box { margin-top: 100px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 login-box">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center mb-4">Login Sistem Transmigran</h4>
                    
                    @if($errors->any())
                        <div class="alert alert-danger py-2">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required autofocus>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>