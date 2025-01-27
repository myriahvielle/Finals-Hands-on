<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
        }
        .login-box {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #8e44ad;
        }
        .btn-custom {
            background: #8e44ad;
            border: none;
            color: white;
        }
        .btn-custom:hover {
            background: #2980b9;
            color: white;
        }
        .login-title {
            color: #2980b9;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="login-box">
                    <h2 class="text-center mb-4 login-title">Welcome</h2>
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}" 
                                placeholder="Enter your email"
                                required 
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                id="password" 
                                placeholder="Enter your password"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    id="remember" 
                                    name="remember"
                                >
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <a href="/forgot-password" class="text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom btn-lg">
                                Sign In
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <span>Don't have an account? </span>
                            <a href="/register" class="text-decoration-none">Create Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
