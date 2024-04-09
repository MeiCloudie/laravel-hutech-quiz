@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="fw-bold">PHÒNG THI | CODE: {{ $room->code }}</h1>
                <h5>Người tổ chức: GV. {{ $room->owner->last_name }} {{ $room->owner->first_name }}</h5>
                <p>Bộ đề thi: {{ $room->quizCollection->name }}</p>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ url('rooms') }}" class="btn btn-danger">
                    <i class="bi bi-box-arrow-left"></i> RỜI PHÒNG
                </a>
                <a href="{{ url('rooms/' . $room->id . '/play') }}" class="btn btn-success">
                    <i class="bi bi-play-circle"></i> BẮT ĐẦU
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editRoomModal">
                    <i class="bi bi-pencil"></i> CHỈNH SỬA
                </button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRoomModal">
                    <i class="bi bi-trash"></i> XOÁ
                </button>
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
                        <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL XÁC NHẬN XOÁ --}}
    <div class="modal fade" id="deleteRoomModal" tabindex="-1" aria-labelledby="deleteRoomModalLabel" aria-hidden="true">
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
@endsection
