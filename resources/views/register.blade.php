<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
        }
        .register-box {
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
        .register-title {
            color: #2980b9;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
            color: #666;
        }
        .password-requirements {
            font-size: 0.8rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <div class="register-box">
                    <h2 class="text-center mb-4 register-title">Create Account</h2>
                    
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/register" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                id="name" 
                                value="{{ old('name') }}" 
                                placeholder="Enter your full name"
                                required 
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}" 
                                placeholder="Enter your email"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                id="password" 
                                placeholder="Create a password"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="password-requirements mt-2">
                                Password must be at least 8 characters long and contain letters and numbers
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                placeholder="Confirm your password"
                                required
                            >
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom btn-lg">
                                Create Account
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <span>Already have an account? </span>
                            <a href="/login" class="text-decoration-none">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
