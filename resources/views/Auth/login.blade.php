<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cuciin.Cuy</title>
    
    <!-- CSS Template Spark Admin -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Blue -->
    <style>
        body {
            /* Background Gradient Biru */
            background: linear-gradient(135deg, #0d6efd 0%, #032830 100%);
        }
        .login-card {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .brand-icon {
            background-color: #e7f1ff;
            color: #0d6efd;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .input-group-text {
            background-color: #f0f5ff;
            border-right: none;
            color: #0d6efd;
        }
        .form-control {
            border-left: none;
            background-color: #f8faff;
        }
        .form-control:focus {
            background-color: #ffffff;
            border-color: #86b7fe;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <!-- CARD FORM LOGIN -->
                <div class="card login-card p-4 p-md-5">
                    
                    <!-- BRANDING LOGO CUCIIN.CUY -->
                    <div class="text-center mb-4">
                        <div class="brand-icon mb-3 shadow-sm">
                            <i class="bi bi-box-seam fs-2"></i>
                        </div>
                        <h3 class="fw-bold text-primary mb-1">Cuciin.Cuy</h3>
                        <p class="text-muted small">Login Cuy</p>
                    </div>

                    <!-- ALERT PESAN ERROR LOGIN -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        
                        <!-- INPUT EMAIL -->
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-semibold text-secondary">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- INPUT PASSWORD -->
                        <div class="mb-3">
                            <label for="password" class="form-label small fw-semibold text-secondary">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- REMEMBER ME -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold text-uppercase tracking-wider">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                        </button>
                    </form>
                </div>

                <!-- FOOTER -->
                <div class="text-center mt-4">
                    <p class="text-white-50 small">&copy; {{ date('Y') }} Cuciin.Cuy. All rights reserved.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- JS Template -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>