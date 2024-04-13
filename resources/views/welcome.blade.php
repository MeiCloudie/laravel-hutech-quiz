<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'HUTECH QUIZ' }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logoHutech.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .vertical-line {
            border-right: 1px solid #ccc;
            height: 500px;
        }

        h4 {
            font-size: 2rem;
            color: #333;
        }

        h1 {
            font-size: 5rem;
            margin-bottom: 8px;
            color: #333;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
            color: #555;
        }

        .btn-login {
            font-size: 1.2rem;
            padding: 10px 30px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background-color: #eaeaea;
            padding: 10px 0;
            border-top: 1px solid #ddd;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="px-2">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
                    <img class="mx-2" src="{{ asset('images/logoHutech.png') }}" alt="HUTECH Quiz" width="30"
                        height="34">
                    HUTECH QUIZ
                </a>
            </div>
        </nav>

        <div class="row align-items-center">
            <div class="col-md-6 px-4 d-flex justify-content-center align-items-center vertical-line">
                <img src="{{ asset('images/logo-hutech-quiz-system.png') }}" alt="HUTECH Quiz"
                    class="img-fluid mx-auto d-block">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center mx-100">
                <div>
                    <h4>CHÀO MỪNG BẠN ĐẾN VỚI</h4>
                    <h1 class="fw-bold">HUTECH QUIZ</h1>
                    <p>HỆ THỐNG QUẢN LÝ CÁC BÀI KIỂM TRA TRẮC NGHIỆM</p>
                    @if (Auth::check())
                        <a href="{{ route('home') }}" class="btn btn-primary btn-login"><i
                                class="bi bi-house-fill me-2"></i>ĐẾN TRANG CHỦ</a>
                    @else
                        <div class="d-flex">
                            <a href="{{ route('register') }}" class="btn btn-lg btn-primary flex-fill me-2"><i
                                    class="bi bi-r-circle-fill me-2"></i>ĐĂNG KÝ</a>
                            <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary flex-fill"><i
                                    class="bi bi-door-open-fill me-2"></i>ĐĂNG NHẬP</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <footer class="footer pb-0">
            <div class="container">
                <span class="text-muted">© 2024 Khoa Công nghệ thông tin | Trường ĐH Công nghệ TP.HCM
                    (HUTECH)</span><br>
                <span class="text-muted fst-italic">(Đồ án PHP do sinh viên thực hiện)</span>
            </div>
        </footer>
    </div>
</body>

</html>
