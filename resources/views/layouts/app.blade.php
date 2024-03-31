<!doctype html>
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

    <style>
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

        .dropdown-item {
            color: #000;
        }

        .dropdown-item:hover {
            background-color: #eaeaea;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:visited {
            color: #000;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/home') }}">
                    <img class="mx-2" src="{{ asset('images/logoHutech.png') }}" alt="HUTECH Quiz" width="30"
                        height="34">
                    HUTECH QUIZ
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                    @else
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('home') ? ' active' : '' }}" href="{{ route('home') }}"><i
                                        class="bi bi-house-fill me-1"></i>Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('rooms') ? ' active' : '' }}"
                                    href="{{ route('rooms.index') }}"><i class="bi bi-mortarboard-fill me-1"></i>Phòng
                                    thi</a>
                            </li>
                        </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <a class="nav-link{{ Request::is('login') ? ' active' : '' }}" href="{{ route('login') }}">Hãy
                                Đăng Nhập!</a>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle me-2 fs-5"></i>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="bi bi-person-lines-fill me-2"></i>
                                        Hồ Sơ
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-left me-2"></i>
                                        Đăng Xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="padding-top: 100px; padding-bottom: 100px;" class="fs-5">
            @yield('content')
        </main>

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
