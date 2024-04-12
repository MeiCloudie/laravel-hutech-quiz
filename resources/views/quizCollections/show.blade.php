@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold">CHI TIẾT BỘ ĐỀ THI</h1>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ID: {{ $quizCollection->id }}</h5>
                        <p class="card-text">Tên Bộ Đề Thi: {{ $quizCollection->name }}</p>
                    </div>
                </div>
            </div>
        </div>

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

        <a class="btn btn-primary btn-lg mt-3" href="{{ URL::to('quizCollections') }}" role="button">VỀ DANH SÁCH</a>
    </div>
@endsection
