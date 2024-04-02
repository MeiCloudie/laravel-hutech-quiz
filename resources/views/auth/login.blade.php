@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Logo --}}
        <div class="d-flex flex-column justify-content-center align-items-center">
            <!-- Ảnh logo -->
            <div class="text-center">
                <img src="{{ asset('images/logo-hutech-quiz-system.png') }}" alt="Logo" class="img-fluid" width="55%"
                    height="55%">
            </div>
            <div class="my-2">
                <!-- Text -->
                <h2 class="fw-bold text-center fs-4">HỆ THỐNG QUẢN LÝ CÁC BÀI KIỂM TRA TRẮC NGHIỆM</h2>
            </div>
        </div>

        {{-- Form Đăng Nhập --}}
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="my-2">
                    <h1 class="text-center fw-bold">{{ __('ĐĂNG NHẬP') }}</h1>

                    <div class="mt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- TODO: Sửa "email" thành "username" --}}
                            {{-- Tài khoản --}}
                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-start"><i
                                        class="bi bi-person-fill me-2"></i>{{ __('Tài khoản') }}</label>

                                <div class="col-md-10">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Mật khẩu --}}
                            <div class="row mb-2">
                                <label for="password" class="col-md-2 col-form-label text-md-start"><i
                                        class="bi bi-shield-lock-fill me-2"></i>{{ __('Mật khẩu') }}</label>

                                <div class="col-md-10">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Remember me --}}
                            <div class="row mb-3 text-start">
                                <div class="col-md-6 offset-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input text-md-start" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Duy trì đăng nhập') }}
                                        </label>
                                    </div>
                                </div>

                                {{-- Quên mật khẩu --}}
                                @if (Route::has('password.request'))
                                    <a class="col-md-4 btn btn-link text-end" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                @endif
                            </div>

                            {{-- Nút đăng nhập --}}
                            <div class=" mb-2">
                                <div class="">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg w-4">
                                            {{ __('ĐĂNG NHẬP') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="">
                                    <p class="text-center fs-5 fst-italic text-muted">Bạn chưa có tài khoản?<a
                                            href="{{ route('register') }}" class="btn btn-link btn-md fst-normal">ĐĂNG KÝ
                                            NGAY</a></p>
                                </div>
                            </div>
                        </form>

                        {{-- Thông báo hệ thống --}}
                        <div class="alert alert-primary pb-0 mt-4" role="alert">
                            <h5 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Hệ thống</h5>
                            <p class="fs-6 ms-4">
                                Xem thêm thông tin tại <a href="https://hutech-classroom-edu.vercel.app/"
                                    target="_blank">HUTECH CLASSROOM</a> hoặc liên hệ Phòng Đào Tạo - Khảo Thí
                                <strong>daotao@hutech.edu.vn</strong>
                            </p>
                        </div>

                        {{-- Version --}}
                        <div class="mt-2 mb-0">
                            <p class="text-muted text-center fs-6">Version 1.0.0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
