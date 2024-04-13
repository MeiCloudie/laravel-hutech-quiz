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
                    <div class="card-header fw-bold">{{ __('XÁC NHẬN MẬT KHẨU') }}</div>

                    <div class="card-body">
                        {{ __('Vui lòng xác nhận mật khẩu của bạn trước khi tiếp tục.') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

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

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Xác nhận mật khẩu') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Quên mật khẩu?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
