@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="mb-4 fw-bold">DANH SÁCH PHÒNG</h1>
            <div>
                {{-- NÚT TẠO PHÒNG --}}
                {{-- TODO: Check lại logic  --}}
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRoomModal">
                    <i class="bi bi-plus-circle"></i> TẠO PHÒNG
                </a>

                {{-- MODAL NÚT TẠO PHÒNG --}}
                <div class="modal fade" id="createRoomModal" tabindex="-1" aria-labelledby="createRoomModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createRoomModalLabel">TẠO PHÒNG</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createRoomForm">
                                    <div class="mb-3">
                                        <label for="selectExam" class="form-label">Chọn Bộ Đề Thi</label>
                                        {{-- !: Phần này còn hard code --}}
                                        <select class="form-select" id="selectExam" required>
                                            <option value="" disabled selected>Chọn bộ đề</option>
                                            <option value="Toán">Toán</option>
                                            <option value="Tiếng Việt">Tiếng Việt</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NÚT TÌM PHÒNG --}}
                {{-- TODO: Check lại logic chỗ này luôn  --}}
                <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#findRoomModal">
                    <i class="bi bi-search"></i> TÌM PHÒNG
                </a>

                {{-- MODAL NÚT TÌM PHÒNG --}}
                <div class="modal fade" id="findRoomModal" tabindex="-1" aria-labelledby="findRoomModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="findRoomModalLabel">TÌM PHÒNG</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="findRoomForm">
                                    <div class="mb-3">
                                        <label for="inputCode" class="form-label">Nhập CODE phòng thi tại đây!</label>
                                        <input type="text" class="form-control" id="inputCode" maxlength="6" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- CARD ROOM --}}
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Dropdown trigger button -->
                            <div class="dropdown position-absolute top-1 end-0 me-3">
                                <button class="btn btn-sm btn-light p-0" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Icon for dropdown menu -->
                                    <i class="bi bi-three-dots-vertical fs-5"></i>
                                </button>
                                <!-- Dropdown menu -->
                                {{-- TODO: Chưa có logic và xét role để hiển thị phần Dropdown --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Xoá phòng</a></li>
                                    <li><a class="dropdown-item" href="#">Đóng phòng</a></li>
                                </ul>
                            </div>

                            <!-- Card content -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon bg-primary rounded-circle px-3 py-2">
                                    <i class="bi bi-mortarboard-fill text-white fs-4 fw-bold"></i>
                                </div>
                                <div class="ms-2 mb-0">
                                    <h4 class="card-title fw-bold mb-1">{{ $room->code }}</h4>
                                    <h6 class="card-subtitle mb-0 text-muted">Giảng viên: {{ $room->owner->last_name }}
                                        {{ $room->owner->first_name }}</h6>
                                </div>
                            </div>

                            <img src="{{ asset('images/banner-hutech-quiz.png') }}" class="img-fluid rounded border mb-3"
                                alt="Banner">

                            <!-- Button -->
                            {{-- TODO: KIỂM TRA LẠI PHẦN NÚT CLOSED --}}
                            @if ($room->is_closed)
                                <button class="btn btn-primary d-block w-100" disabled>
                                    PHÒNG THI ĐÃ ĐÓNG<i class="bi bi-dash-circle-fill ms-2"></i>
                                </button>
                            @else
                                <a href="{{ URL::to('rooms/' . $room->id) }}" class="btn btn-primary d-block w-100">
                                    VÀO PHÒNG<i class="bi bi-arrow-right-circle-fill ms-2"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
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
