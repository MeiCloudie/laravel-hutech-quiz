@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold mb-2">TẠO MỚI BỘ ĐỀ THI</h1>

        <hr class="mb-4" />

        <form action="{{ url('quizCollections') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Tên Bộ Đề Thi</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <!-- Hiển thị thông báo lỗi nếu có -->
            @if ($errors->any())
                <div class="alert alert-danger mt-3 mb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary mt-4 me-2">XÁC NHẬN TẠO MỚI</button>
                <a href="{{ url('quizCollections') }}" class="btn btn-outline-secondary mt-4">VỀ DANH SÁCH</a>
            </div>
        </form>

    </div>
@endsection
