<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

.register-container {
    max-width: 500px;
    width: 100%;
    backdrop-filter: blur(15px);
    background: rgba(255, 255, 255, 0.65);
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    animation: fadeIn 0.8s ease;
}


.card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    background: transparent;
    box-shadow: none;
}
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5245d9, #7B26D1);
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(98, 84, 232, 0.4);
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
        
        a {
            color: #6254e8;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        a:hover {
            color: #8A2BE2;
            text-decoration: underline;
        }
        
        .login-link {
            font-size: 15px;
            color: #fff;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
            margin-top: 20px;
        }
        
        .login-link a {
            color: #fff;
            font-weight: 600;
            text-decoration: underline;
        }
        
        .login-link a:hover {
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
        
        .password-strength {
            height: 5px;
            margin-top: 8px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .password-strength-text {
            font-size: 12px;
            margin-top: 5px;
            transition: all 0.3s;
        }
        
        .password-requirements {
            font-size: 12px;
            color: #6c757d;
            margin-top: 8px;
        }
        
        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 2px;
        }
        
        .requirement i {
            margin-right: 5px;
            font-size: 10px;
        }
        
        .check-circle {
            color: #28a745;
        }
        
        .times-circle {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Create Account</h3>
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

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" name="name" value="{{ old('name') }}" required autofocus
                                placeholder="Enter your full name">
                            <span class="input-icon">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}" required
                                placeholder="Enter your email address">
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
                                placeholder="Create a strong password" onkeyup="checkPasswordStrength()">
                            <span class="input-icon" onclick="togglePassword('password', 'toggleIcon')">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                        <div class="password-strength" id="passwordStrength"></div>
                        <div class="password-strength-text" id="passwordStrengthText"></div>
                        <div class="password-requirements mt-2">
                            <div class="requirement" id="lengthReq">
                                <i class="fas fa-times-circle times-circle"></i> At least 8 characters
                            </div>
                            <div class="requirement" id="upperReq">
                                <i class="fas fa-times-circle times-circle"></i> At least one uppercase letter
                            </div>
                            <div class="requirement" id="numberReq">
                                <i class="fas fa-times-circle times-circle"></i> At least one number
                            </div>
                            <div class="requirement" id="specialReq">
                                <i class="fas fa-times-circle times-circle"></i> At least one special character
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center login-link">
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
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
        
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('passwordStrengthText');
            
            // Check requirements
            const lengthReq = document.getElementById('lengthReq').querySelector('i');
            const upperReq = document.getElementById('upperReq').querySelector('i');
            const numberReq = document.getElementById('numberReq').querySelector('i');
            const specialReq = document.getElementById('specialReq').querySelector('i');
            
            // Update requirement indicators
            if (password.length >= 8) {
                lengthReq.className = 'fas fa-check-circle check-circle';
            } else {
                lengthReq.className = 'fas fa-times-circle times-circle';
            }
            
            if (/[A-Z]/.test(password)) {
                upperReq.className = 'fas fa-check-circle check-circle';
            } else {
                upperReq.className = 'fas fa-times-circle times-circle';
            }
            
            if (/[0-9]/.test(password)) {
                numberReq.className = 'fas fa-check-circle check-circle';
            } else {
                numberReq.className = 'fas fa-times-circle times-circle';
            }
            
            if (/[^A-Za-z0-9]/.test(password)) {
                specialReq.className = 'fas fa-check-circle check-circle';
            } else {
                specialReq.className = 'fas fa-times-circle times-circle';
            }
            
            // Calculate strength
            let strength = 0;
            if (password.length > 0) {
                // Length
                if (password.length >= 8) strength += 25;
                
                // Uppercase
                if (/[A-Z]/.test(password)) strength += 25;
                
                // Numbers
                if (/[0-9]/.test(password)) strength += 25;
                
                // Special chars
                if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            }
            
            // Update UI
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthBar.style.backgroundColor = '#e0e0e0';
                strengthText.textContent = '';
            } else if (strength <= 25) {
                strengthBar.style.width = '25%';
                strengthBar.style.backgroundColor = '#dc3545';
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#dc3545';
            } else if (strength <= 50) {
                strengthBar.style.width = '50%';
                strengthBar.style.backgroundColor = '#ffc107';
                strengthText.textContent = 'Fair';
                strengthText.style.color = '#ffc107';
            } else if (strength <= 75) {
                strengthBar.style.width = '75%';
                strengthBar.style.backgroundColor = '#17a2b8';
                strengthText.textContent = 'Good';
                strengthText.style.color = '#17a2b8';
            } else {
                strengthBar.style.width = '100%';
                strengthBar.style.backgroundColor = '#28a745';
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#28a745';
            }
        }
    </script>
</body>
</html>