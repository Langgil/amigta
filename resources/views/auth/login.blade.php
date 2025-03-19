<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            background: linear-gradient(135deg, #6254e8, #8A2BE2, #4169E1);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }
        
        .login-container {
            max-width: 430px;
            width: 100%;
        }
        
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
        
        .card-header {
            background: linear-gradient(135deg, #6254e8, #8A2BE2);
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 25px 20px;
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 60%);
            transform: rotate(30deg);
        }
        
        .card-header h3 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
            position: relative;
        }
        
        .card-body {
            padding: 30px 25px;
        }
        
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 15px;
            border: 1px solid #e0e0e0;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #6254e8;
            box-shadow: 0 0 0 3px rgba(98, 84, 232, 0.25);
            background-color: #fff;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6254e8, #8A2BE2);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5245d9, #7B26D1);
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(98, 84, 232, 0.4);
        }
        
        .form-check-input:checked {
            background-color: #6254e8;
            border-color: #6254e8;
        }
        
        a {
            color: #6254e8;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        a:hover {
            color: #8A2BE2;
            text-decoration: underline;
        }
        
        .forgot-password {
            font-size: 14px;
            font-weight: 500;
        }
        
        .register-link {
            font-size: 15px;
            color: #fff;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
            margin-top: 20px;
        }
        
        .register-link a {
            color: #fff;
            font-weight: 600;
            text-decoration: underline;
        }
        
        .register-link a:hover {
            color: #e0e0ff;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            cursor: pointer;
            z-index: 4;
        }
        
        .alert-danger {
            border-radius: 12px;
            background-color: rgba(255, 205, 210, 0.8);
            border: 1px solid #f8d7da;
        }
        
        .invalid-feedback {
            font-size: 13px;
            margin-top: 5px;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        /* Animation */
        .card {
            animation: fadeIn 0.8s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .btn-primary {
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-primary:hover::after {
            left: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Welcome Back</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="Enter your email">
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" name="password" required
                                placeholder="Enter your password">
                            <span class="input-icon" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Sign In
                        </button>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <div class="mb-3 text-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        
        <div class="text-center register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register Now</a></p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>