@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold">CHI TIẾT BỘ CÂU HỎI #{{ $quiz->id }}</h1>

        <hr class="my-4" />

        <div class="jumbotron">
            <p>
                <strong>Nội dung:</strong> {{ $quiz->content }}<br>
                <strong>Giải thích:</strong> {{ $quiz->explaination }}<br>
                <strong>Câu trả lời:</strong>
            </p>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Nội dung câu trả lời</th>
                        <th scope="col">Đúng/Sai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->answers as $index => $answer)
                        <tr>
                            {{-- !: Ghi chú sửa lại phần STT câu trả lời --}}
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $answer->content }}</td>
                            {{-- !: Phần này chưa lấy được đúng sai ngay lúc tạo --}}
                            <td>{{ $answer->is_correct ? 'Đúng' : 'Sai' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- TODO: Bộ câu hỏi này nằm trong Bộ đề thi nào? --}}
        <div>

        </div>

        <a href="{{ url('quizzes') }}" class="btn btn-outline-secondary mt-4">VỀ DANH SÁCH</a>
    </div>
@endsection
