@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">CHỈNH SỬA BỘ CÂU HỎI #{{ $quiz->id }}</h1>
        </div>

        <hr class="mb-4" />

        <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Nội dung</label>
                <input type="text" id="content" name="content" value="{{ $quiz->content }}" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="explaination">Giải thích</label>
                <input type="text" id="explaination" name="explaination" value="{{ $quiz->explaination }}"
                    class="form-control">
            </div>

            <!-- Danh sách các checkbox cho bộ đề thi -->
            <div class="form-group mt-2">
                <label>Bộ Đề Thi:</label>
                <div>
                    @foreach ($quizCollections as $quizCollection)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                name="quiz_collections[{{ $quizCollection->id }}]" value="{{ $quizCollection->id }}"
                                id="quiz_collection_{{ $quizCollection->id }}"
                                {{ collect($quiz->quizCollections)->contains(function ($value) use ($quizCollection) {
                                    return $value->id == $quizCollection->id;
                                })
                                    ? 'checked'
                                    : '' }}>
                            <label class="form-check-label"
                                for="quiz_collection_{{ $quizCollection->id }}">{{ $quizCollection->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Vòng lặp cho phần câu trả lời --}}
            <div class="answers mt-4">
                @foreach ($quiz->answers as $index => $answer)
                    <div class="form-group mt-2">
                        <label for="answer{{ $index + 1 }}">Câu trả lời {{ $index + 1 }}:</label>
                        <input type="text" id="answer{{ $index + 1 }}" name="answers[{{ $answer->id }}]"
                            value="{{ $answer->content }}" class="ms-2">
                        <input type="checkbox" id="isCorrect{{ $index + 1 }}" name="isCorrect[{{ $answer->id }}]"
                            {{ $answer->is_correct ? 'checked' : '' }} class="ms-2">
                        <label for="isCorrect{{ $index + 1 }}">Đúng</label>
                    </div>
                @endforeach
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

            <button type="submit" class="btn btn-primary mt-4">LƯU THAY ĐỔI</button>
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

</html>
