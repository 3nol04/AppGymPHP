<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #333333;
            color: white;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Menghilangkan scrollbar untuk efek estetis */
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #000000, #4d0000);
            position: relative;
        }
        .register-card {
            background-color: #232323;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1; /* Memastikan register card berada di atas background image */
            width: 100%;
            max-width: 400px; /* Membatasi lebar register card */
        }
        .register-card h3 {
            color: #FF0000;
            text-align: center;
            margin-bottom: 20px;
        }
        .register-card .form-control {
            background-color: #333333;
            border: none;
            border-bottom: 1px solid #FFFFFF;
            color: white;
            border-radius: 0;
        }
        .register-card .form-control:focus {
            background-color: #333333;
            color: white;
            border-color: #FF0000;
            box-shadow: none;
        }
        .register-card .btn-register {
            background-color: #0E0F13;
            color: #FF0000;
            border: none;
            width: 100%;
        }
        .register-card .btn-register:hover {
            background-color: #232323;
        }
        .register-card .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-card .login-link a {
            color: #00BFFF;
            text-decoration: none;
        }
        .register-card .login-link a:hover {
            text-decoration: underline;
        }
        .background-image {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 50%;
            height: 100%;
            background: url('path_to_your_image.jpg') no-repeat center center/cover;
            z-index: 0; /* Memastikan background image berada di bawah register card */
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <h3>REGISTER</h3>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama Anda" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" >
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password" >
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-register">Register</button>
                <div class="login-link">
                    <p>Sudah punya akun? <a href="{{ url('/login') }}">Login Now</a></p>
                </div>
            </form>
        </div>
        <div class="background-image"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
