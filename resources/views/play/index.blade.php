@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Info phòng --}}
            <div class="col-md-12">
                <h1 class="fw-bold">PHÒNG THI • CODE: {{ $room->code }}</h1>
                <h5>Người tổ chức: GV. {{ $room->owner->last_name }} {{ $room->owner->first_name }}</h5>
                <p>Bộ đề thi: {{ $room->quizCollection->name }}</p>
            </div>

            <hr class="mt-1" />

            {{-- CÁC CÂU HỎI --}}
            <div class="mt-2">
                <div class="row row-cols-1">
                    @foreach ($room->quizCollection->quizzes as $quiz)
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold mb-2">{{ $quiz->content }}</h5>
                                    <p class="card-text">{{ $quiz->explaination }}</p>
                                    <div class="list-group">
                                        @foreach ($quiz->answers as $answer)
                                            <label class="list-group-item">
                                                <input type="radio" name="answer_{{ $quiz->id }}"
                                                    value="{{ $answer->id }}">
                                                {{ $answer->content }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <hr class="mt-2" />

            {{-- CÁC NÚT --}}
            <div class="d-flex justify-content-end">
                <div>
                    <button class="btn btn-primary px-5" disabled>
                        LƯU BÀI
                    </button>
                    <button class="btn btn-success px-5" data-bs-toggle="modal" data-bs-target="#submitTestModal">
                        NỘP BÀI
                    </button>
                </div>
            </div>

            {{-- MODAL NỘP BÀI --}}
            <div class="modal fade" id="submitTestModal" tabindex="-1" aria-labelledby="submitTestModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="submitTestModalLabel">NỘP BÀI</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Bạn có chắn chắn muốn NỘP BÀI không?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HUỶ</button>
                            <form action="" method="POST">
                                {{-- @csrf --}}
                                <button type="submit" class="btn btn-success">XÁC NHẬN NỘP BÀI</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .card {
                    transition: box-shadow 0.3s ease;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);
                }

                .card:hover {
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                }

                .list-group-item {
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                .list-group-item:hover,
                .list-group-item:focus {
                    background-color: #e4ecfc;
                    /* Màu nền khi hover hoặc focus */
                }

                .list-group-item input[type="radio"]:checked+.list-group-item {
                    background-color: #e2f0ff;
                    /* Màu nền khi radio button được chọn */
                }
            </style>
        </div>
    @endsection
