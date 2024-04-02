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

        {{-- Form Đăng Ký --}}
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="my-2">
                    <h1 class="text-center fw-bold">{{ __('ĐĂNG KÝ') }}</h1>

                    <div class="mt-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-3 col-form-label text-md-start"><i
                                        class="bi bi-person-fill me-2"></i>{{ __('Họ Tên') }}</label>

                                <div class="col-md-9">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="row mb-3">
                                <label for="email" class="col-md-3 col-form-label text-md-start"><i
                                        class="bi bi-envelope-fill me-2"></i>{{ __('Email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="row mb-3">
                                <label for="password" class="col-md-3 col-form-label text-md-start"><i
                                        class="bi bi-shield-lock-fill me-2"></i>{{ __('Mật khẩu') }}</label>

                                <div class="col-md-9">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-start"><i
                                        class="bi bi-lock-fill me-2"></i>{{ __('Xác nhận mật khẩu') }}</label>

                                <div class="col-md-9">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Nút đăng ký --}}
                            <div class="mb-2">
                                <div class="">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg w-4">
                                            {{ __('ĐĂNG KÝ') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="">
                                    <p class="text-center fs-5 fst-italic text-muted">Bạn đã có tài khoản?<a
                                            href="{{ route('login') }}" class="btn btn-link btn-md fst-normal">ĐĂNG NHẬP
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
