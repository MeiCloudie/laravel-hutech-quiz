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

            {{-- Select Option Quiz Collection --}}
            <div class="form-group mt-2">
                <label for="quiz_collection_id">Bộ Đề Thi</label>
                <select id="quiz_collection_id" name="quiz_collection_id" class="form-control">
                    <option value="" selected disabled>Chọn Bộ Đề Thi</option>
                    @foreach ($quizCollections as $quizCollection)
                        <option value="{{ $quizCollection->id }}">{{ $quizCollection->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Vòng lặp cho phần câu trả lời --}}
            <div class="answers mt-4">
                @for ($i = 1; $i <= 1; $i++)
                    <div class="form-group mt-2">
                        <label for="answer{{ $i }}">Câu trả lời {{ $i }}:</label>
                        <input type="text" id="answer{{ $i }}" name="answers[]" class="ms-2">
                        <input type="checkbox" id="isCorrect{{ $i }}" name="isCorrect[]" class="ms-2">
                        <label for="isCorrect{{ $i }}">Đúng</label>
                    </div>
                @endfor
            </div>

            <!-- Nút thêm câu trả lời -->
            <div class="text-start mt-3">
                <button type="button" class="btn btn-secondary" id="addAnswer">THÊM CÂU TRẢ LỜI</button>
            </div>

            <!-- Hiển thị thông báo lỗi nếu có -->
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lắng nghe sự kiện click nút thêm câu trả lời
            document.getElementById('addAnswer').addEventListener('click', function() {
                const answersContainer = document.querySelector('.answers');
                const answerCount = answersContainer.children.length;
                const newAnswerCount = answerCount + 1;

                // Tạo phần tử input mới cho câu trả lời và checkbox
                const newAnswerGroup = document.createElement('div');
                newAnswerGroup.classList.add('form-group', 'mt-2');
                newAnswerGroup.innerHTML = `
                    <label for="answer${newAnswerCount}">Câu trả lời ${newAnswerCount}:</label>
                    <input type="text" id="answer${newAnswerCount}" name="answers[]" class="ms-2">
                    <input type="checkbox" id="isCorrect${newAnswerCount}" name="isCorrect[]" class="ms-2">
                    <label for="isCorrect${newAnswerCount}">Đúng</label>
                `;

                // Thêm phần tử mới vào container
                answersContainer.appendChild(newAnswerGroup);
            });
        });
    </script>
@endpush
