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
                        <h4 class="card-title fw-bold mb-2">Họ tên: ...</h4>
                        <h5 class="card-text">Số câu đúng: ...</h5>
                        <h5 class="card-text">Số câu sai: ...</h5>
                        <h5 class="card-text fw-bold text-danger">TỔNG ĐIỂM: ...</h5>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-2" />

        {{-- BẢNG KẾT QUẢ ĐÚNG SAI --}}
        <div class="row mt-2">
            {{-- !: Chỗ này biến chưa đúng nha --}}
            {{-- Lặp qua danh sách câu --}}
            @foreach ($records as $index => $record)
                @if ($record['answer']->is_correct)
                    {{-- Hiển thị giao diện cho câu đúng --}}
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body mb-0">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h4 class="card-title fw-bold me-2 pt-2">Câu {{ $index + 1 }}:</h4>
                                    {{-- <h5 class="card-title fw-bold me-2 pt-2">{{ $record->quiz->content }}</h5> --}}
                                    <h5 class="card-text me-2 pt-2">{{ $record['answer']->content }}</h5>
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
                                    <h4 class="card-title fw-bold me-2 pt-2">Câu {{ $index + 1 }}:</h4>
                                    {{-- <h5 class="card-title fw-bold me-2 pt-2">{{ $record->quiz->content }}</h5> --}}
                                    
                                    <h5 class="card-text me-2 pt-2">{{ $record['answer']->content }}</h5>
                                    <h5 class="card-text me-2 pt-2">-> 
                                        @foreach ($record['correctAnswers'] as $answer)
                                            {{ $answer->content }}
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
