@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Info phòng --}}
            <div class="col-md-8">
                <h1 class="fw-bold">PHÒNG THI • CODE: {{ $room->code }}</h1>
                <h5>Người tổ chức: GV. {{ $room->owner->last_name }} {{ $room->owner->first_name }}</h5>
                <p>Bộ đề thi: {{ $room->quizCollection->name }}</p>
            </div>

            {{-- CÁC NÚT --}}
            <div class="col-md-2 text-end">
                @if (Auth::user()->role == 'ADMIN' || Auth::user()->id == $room->owner_id)
                    <div class="d-grid gap-2 mt-2">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editRoomModal">
                            <i class="bi bi-pencil"></i> CHỈNH SỬA
                        </button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRoomModal">
                            <i class="bi bi-trash"></i> XOÁ
                        </button>
                    </div>
                @endif
            </div>

            <div class="col-md-2 text-end">
                <div class="d-grid gap-2 mt-2">
                    <a href="{{ url('rooms/leave/' . $room->id) }}" class="btn btn-danger">
                        <i class="bi bi-box-arrow-left"></i> RỜI PHÒNG
                    </a>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmStartModal">
                        <i class="bi bi-play-circle"></i> BẮT ĐẦU
                    </button>
                </div>
            </div>

            <hr class="mt-1" />

            {{-- PHẦN HIỂN THỊ CÁC THÀNH VIÊN TRONG PHÒNG --}}
            <div class="mt-2">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($room->users as $user)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <img src="{{ asset('images/avatar_hutech_quiz.png') }}"
                                            class="rounded-circle mb-3 border" width="50" height="50" alt="Avatar">
                                        <div class="ms-2">
                                            <h5 class="card-title fw-bold mb-0 mt-1">
                                                {{ $user->last_name . ' ' . $user->first_name }}</h5>
                                            <p class="card-text">{{ $user->username }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>


        {{-- MODAL CHỈNH SỬA BỘ ĐỀ THI --}}
        <div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoomModalLabel">CHỈNH SỬA BỘ ĐỀ THI</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Form chỉnh sửa bộ đề thi --}}
                        <form action="{{ url('rooms/' . $room->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="quizCollectionId" class="form-label">Chọn Bộ Đề Thi</label>
                                <select class="form-select" id="quizCollectionId" name="quizCollectionId" required>
                                    <option value="" disabled selected>Chọn bộ đề</option>
                                    @foreach ($quizCollections as $quizCollection)
                                        <option value="{{ $quizCollection->id }}">{{ $quizCollection->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                            <a href="{{ URL::to('rooms/' . $room->id . '/edit') }}" class="btn btn-outline-secondary">ĐẾN
                                TRANG</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL XÁC NHẬN XOÁ --}}
        <div class="modal fade" id="deleteRoomModal" tabindex="-1" aria-labelledby="deleteRoomModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteRoomModalLabel">XÁC NHẬN XOÁ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xoá phòng này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HUỶ</button>
                        <form action="{{ url('rooms/' . $room->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">XÁC NHẬN XOÁ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL XÁC NHẬN BẮT ĐẦU --}}
        <div class="modal fade" id="confirmStartModal" tabindex="-1" aria-labelledby="confirmStartModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmStartModalLabel">XÁC NHẬN BẮT ĐẦU</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn bắt đầu bài thi này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HUỶ</button>
                        <a href="{{ URL::to('rooms/' . $room->id . '/play') }}" class="btn btn-success">
                            BẮT ĐẦU
                        </a>
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
        </style>
    </div>
@endsection
