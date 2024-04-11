@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold mb-2">CHỈNH SỬA BỘ ĐỀ THI</h1>

        <hr class="mb-4" />

        <form action="{{ route('quizCollections.update', $quizCollection->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên Bộ Đề Thi</label>
                <input type="text" id="name" name="name" value="{{ $quizCollection->name }}" class="form-control">
            </div>

            <!-- Hiển thị thông báo lỗi nếu có -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary mt-4">LƯU THAY ĐỔI</button>
            <a href="{{ URL::to('quizCollections') }}" class="btn btn-outline-secondary mt-4">HỦY THAO TÁC</a>
        </form>

        {{-- TODO: Chưa có list quiz --}}
        <div>

        </div>
    </div>
@endsection
