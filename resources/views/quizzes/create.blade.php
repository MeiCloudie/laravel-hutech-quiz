@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">TẠO MỚI BỘ CÂU HỎI</h1>
        </div>

        <hr class="mb-4" />

        <form action="{{ url('quizzes') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" id="content" name="content" value="{{ old('content') }}" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="explaination">Giải thích</label>
                <input type="text" id="explaination" name="explaination" value="{{ old('explaination') }}"
                    class="form-control">
            </div>

            {{-- TODO: Cần làm lại chỗ này --}}
            <div class="answers mt-4">
                <div class="form-group mt-2">
                    <label for="answer1">Câu trả lời 1:</label>
                    <input type="text" id="answer1" name="answers[]" class="ms-2">
                    <input type="checkbox" id="isCorrect1" name="isCorrect[]" class="ms-2">
                    <label for="isCorrect1">Đúng</label>
                </div>

                <div class="form-group mt-2">
                    <label for="answer2">Câu trả lời 2:</label>
                    <input type="text" id="answer2" name="answers[]" class="ms-2">
                    <input type="checkbox" id="isCorrect2" name="isCorrect[]" class="ms-2">
                    <label for="isCorrect2">Đúng</label>
                </div>
            </div>

            <!-- if there are creation errors, they will show here -->
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary mt-4">XÁC NHẬN TẠO MỚI</button>
            <a href="{{ url('quizzes') }}" class="btn btn-outline-secondary mt-4">VỀ DANH SÁCH</a>
        </form>
    </div>
@endsection
