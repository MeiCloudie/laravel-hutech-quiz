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

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('ĐẶT LẠI MẬT KHẨU') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-10">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                                <div class="col-md-10">
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

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Xác nhận mật khẩu') }}</label>

                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đặt lại mật khẩu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
