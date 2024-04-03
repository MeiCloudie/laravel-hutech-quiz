@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Avatar của user -->
                        <img src="{{ asset('images/avatar_hutech_quiz.png') }}" class="rounded-circle mb-3 border"
                            width="150" height="150" alt="Avatar">

                        <!-- Họ và tên -->
                        <h4 class="card-title fw-bold">{{ $user->last_name }} {{ $user->first_name }}</h4>
                        <!-- Khoa -->
                        <p class="card-text">Khoa {{ $user->faculty->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header fw-bold"><i class="bi bi-person-fill me-2"></i>THÔNG TIN CÁ NHÂN</h5>
                    <div class="card-body">
                        <!-- Form chỉ đọc -->
                        <form>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Họ và tên lót</label>
                                <input type="text" class="form-control" id="lastName" value="{{ $user->last_name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="firstName" value="{{ $user->first_name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Mã số sinh viên</label>
                                <input type="text" class="form-control" id="username" value="{{ $user->username }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="faculty" class="form-label">Khoa</label>
                                <input type="text" class="form-control" id="faculty" value="{{ $user->faculty->name }}"
                                    readonly>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Thông báo hệ thống --}}
                <div class="alert alert-primary pb-0 mt-4" role="alert">
                    <h5 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Hệ thống</h5>
                    <p class="fs-6 ms-4 mb-2">
                        Xem thêm thông tin tại <a href="https://hutech-classroom-edu.vercel.app/" target="_blank">HUTECH
                            CLASSROOM</a> hoặc liên hệ Phòng Đào Tạo - Khảo Thí
                        <strong>daotao@hutech.edu.vn</strong>
                    </p>
                    <p class="fs-6 ms-4 fst-italic">
                        Chức năng đổi mật khẩu và ảnh đại diễn sẽ cập nhật sau!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
