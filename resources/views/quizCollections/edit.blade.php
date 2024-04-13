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

        {{-- Hiển thị danh sách câu hỏi --}}
        <div class="mt-4">
            <div class="row row-cols-1">
                <h3 class="fw-bold">Danh sách bộ câu hỏi:</h3>
                @foreach ($quizCollection->quizzes as $quiz)
                    <div class="col mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">Câu {{ $quiz->quizToQuizCollection->order }}:
                                    {{ $quiz->content }}</h5>
                                <p class="card-text">{{ $quiz->explaination }}</p>
                                <div class="list-group">
                                    @foreach ($quiz->answers->sortBy(function ($item, $key) {
            return $item->order;
        }) as $answer)
                                        <label class="list-group-item">
                                            <input type="radio" disabled name="answers[{{ $quiz->id }}]"
                                                value="{{ $answer->id }}">
                                            {{ chr($answer->order + 64) }}. {{ $answer->content }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
