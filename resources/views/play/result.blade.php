@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Info phòng --}}
            <div class="col-md-8">
                <h1 class="fw-bold">KẾT QUẢ BÀI THI</h1>
                <h5>Đề thi: <strong>{{ $room->quizCollection->name }}</strong></h5>
                <h5>Người tổ chức: GV. {{ $room->owner->last_name }} {{ $room->owner->first_name }}</h5>
                <h5>Mã phòng thi: {{ $room->code }}</h5>
            </div>

            {{-- THÔNG TIN NGƯỜI DỰ THI --}}
            {{-- !: Cập nhật user vào --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body mb-0">
                        <h4 class="card-title fw-bold mb-2">Họ tên: {{ Auth::user()->getFullName() }}</h4>
                        <h5 class="card-text">Số câu đúng: {{ $correctAnswerCount }}</h5>
                        <h5 class="card-text">Số câu sai: {{ $incorrectAnswerCount }}</h5>
                        <h5 class="card-text fw-bold text-danger">KẾT QUẢ:
                            {{ $correctAnswerCount . '/' . ($correctAnswerCount + $incorrectAnswerCount) }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-2" />

        {{-- BẢNG KẾT QUẢ ĐÚNG SAI --}}
        <div class="row mt-2">
            {{-- !: Chỗ này biến chưa đúng nha --}}
            {{-- Lặp qua danh sách câu --}}
            @foreach ($room->quizCollection->quizzes->sortby(function ($item, $key) {
            return $item->quizToQuizCollection->order;
        }) as $quiz)
                @if (isset($recordsByQuizId[$quiz->id]['answer']) && $recordsByQuizId[$quiz->id]['answer']->is_correct)
                    {{-- Hiển thị giao diện cho câu đúng --}}
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body mb-0">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h4 class="card-title fw-bold me-2 pt-2">Câu {{ $quiz->quizToQuizCollection->order }}:
                                    </h4>
                                    {{-- <h5 class="card-title fw-bold me-2 pt-2">{{ $record->quiz->content }}</h5> --}}
                                    <h5 class="card-text me-2 pt-2">
                                        {{ chr($recordsByQuizId[$quiz->id]['answer']->order + 64) }}</h5>
                                    <i class="bi bi-check text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Hiển thị giao diện cho câu sai --}}
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body mb-0">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h4 class="card-title fw-bold me-2 pt-2">Câu {{ $quiz->quizToQuizCollection->order }}:
                                    </h4>
                                    {{-- <h5 class="card-title fw-bold me-2 pt-2">{{ $record->quiz->content }}</h5> --}}

                                    {{-- <h5 class="card-text me-2 pt-2">{{ $recordsByQuizId[$quiz->id]['answer']->content }}</h5> --}}
                                    <h5 class="card-text me-2 pt-2">
                                        {{ isset($recordsByQuizId[$quiz->id]['answer']) ? chr($recordsByQuizId[$quiz->id]['answer']->order + 64) : 'Không chọn'}}</h5>
                                    <h5 class="card-text me-2 pt-2">->
                                        @foreach ($recordsByQuizId[$quiz->id]['correctAnswers'] as $answer)
                                            {{ chr($answer->order + 64) }}
                                        @endforeach
                                    </h5>
                                    <i class="bi bi-x text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <hr class="mt-2" />

        <div class="row row-cols-1">
            @foreach ($room->quizCollection->quizzes->sortby(function ($item, $key) {
            return $item->quizToQuizCollection->order;
        }) as $index => $quiz)
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
                                            value="{{ $answer->id }}"
                                            {{ isset($recordsByQuizId[$quiz->id]['answer']) &&  $recordsByQuizId[$quiz->id]['answer']->id == $answer->id ? 'checked' : '' }}>
                                        {{ chr($answer->order + 64) }}. {{ $answer->content }}
                                    </label>
                                @endforeach
                                <p
                                    class="mb-0 mt-2 ms-2 fw-bold {{ isset($recordsByQuizId[$quiz->id]['answer']) && $recordsByQuizId[$quiz->id]['answer']->is_correct ? 'text-success' : 'text-danger' }}">
                                    => Kết quả:
                                    @foreach ($recordsByQuizId[$quiz->id]['correctAnswers'] as $correctAnswer)
                                        {{ chr($correctAnswer->order + 64) }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="mt-2" />

        <style>
            .card {
                transition: box-shadow 0.3s ease;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);
            }

            .card:hover {
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            }
        </style>
    </div>
@endsection
