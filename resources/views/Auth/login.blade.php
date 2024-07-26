<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #333333;
            color: white;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Menghilangkan scrollbar untuk efek estetis */
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #000000, #4d0000);
            position: relative;
        }
        .login-card {
            background-color: #232323;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1; /* Memastikan login card berada di atas background image */
            width: 100%;
            max-width: 400px; /* Membatasi lebar login card */
        }
        .login-card h3 {
            color: #FF0000;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-card .form-control {
            background-color: #333333;
            border: none;
            border-bottom: 1px solid #FFFFFF;
            color: white;
            border-radius: 0;
        }
        .login-card .form-control:focus {
            background-color: #333333;
            color: white;
            border-color: #FF0000;
            box-shadow: none;
        }
        .login-card .btn-login {
            background-color: #0E0F13;
            color: #FF0000;
            border: none;
            width: 100%;
        }
        .login-card .btn-login:hover {
            background-color: #232323;
        }
        .login-card .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-card .register-link a {
            color: #00BFFF;
            text-decoration: none;
        }
        .login-card .register-link a:hover {
            text-decoration: underline;
        }
        .background-image {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 50%;
            height: 100%;
            background: url('path_to_your_image.jpg') no-repeat center center/cover;
            z-index: 0; 
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            @if(session('error'))
                <div class="alert h-15 w-full bg-red-600 transition-all duration-500">
                    {{session('error')}}    
                </div>
                <script>
                    setTimeout(()=>{
                        const alert = document.querySelector('.alert');
                        if(alert){
                            alert.classList.add('opacity-0');
                            alert.classList.add('translate-x-10');
                            setTimeout(()=>{
                                alert.remove();
                            },300);
                        }
                    },2000);
                </script>
            @endif
            <h3 class="text-center text-3xl " style="font-family: Poppins, sans-serif">LOGIN</h3>
            <form action="{{route('login')}}" method="POST" id="logForm">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">USERNAME</label>
                    <input type="text" class="form-control" id="username" name="email" placeholder="Enter Username" value="{{old('email')}}">
                    @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">PASSWORD</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Enter Password">
                    @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-login"> LOGIN </button>
            </form>
            <div class="register-link">
                <p>Belum punya akun? <a href="{{route('register')}}">Register sekarang</a></p>
            </div>            
        </div>
        <div class="background-image"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
