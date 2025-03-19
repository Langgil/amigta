<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            background: transparent;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }
        
        .forgot-password-container {
            max-width: 500px;
            width: 100%;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.65);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeIn 0.8s ease;
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
            color: #6254e8;
            font-weight: 500;
            margin-top: 20px;
            text-align: center;
        }
        
        .alert-success {
            border-radius: 12px;
            background-color: rgba(212, 237, 218, 0.8);
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            border-radius: 12px;
            background-color: rgba(255, 205, 210, 0.8);
            border: 1px solid #f8d7da;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Reset Password</h3>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p class="text-muted mb-4">Enter your email address and we'll send you a link to reset your password.</p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div class="mb-4">
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
                    
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Send Reset Link
                        </button>
                    </div>
                </form>

                <div class="login-link">
                    <a href="{{ route('login') }}">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>