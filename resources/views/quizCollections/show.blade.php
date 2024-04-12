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

        {{-- TODO: Chưa có list quiz --}}
        <div>
            @foreach ($quizCollection->quizzes as $quiz)
                <div>{{ $quiz->quizToQuizCollection->order }}. {{ $quiz->content }}</div>
            @endforeach
        </div>

        <a class="btn btn-primary btn-lg mt-3" href="{{ URL::to('quizCollections') }}" role="button">VỀ DANH SÁCH</a>
    </div>
@endsection
