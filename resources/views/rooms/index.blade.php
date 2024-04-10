@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="mb-4 fw-bold">DANH SÁCH PHÒNG</h1>
            <div>
                {{-- NÚT TẠO PHÒNG --}}
                @if (Auth::user()->role == 'ADMIN')
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRoomModal">
                        <i class="bi bi-plus-circle"></i> TẠO PHÒNG
                    </a>
                @endif

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
                                <form id="createRoomForm" action="{{ url('rooms') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="hidden" id="ownerId" name="ownerId" value="{{ Auth::user()->id }}"
                                            class="form-control">
                                        <label for="quizCollectionId" class="form-label">Chọn Bộ Đề Thi</label>
                                        <select class="form-select" id="quizCollectionId" name="quizCollectionId" required>
                                            <option value="" disabled selected>Chọn bộ đề</option>
                                            @foreach ($quizCollections as $quizCollection)
                                                <option value="{{ $quizCollection->id }}">{{ $quizCollection->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                                    <a href="{{ url('rooms/create') }}" class="btn btn-outline-secondary">ĐẾN TRANG</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NÚT TÌM PHÒNG --}}
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
                                <form id="findRoomForm" action="{{ url('rooms/find') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Nhập CODE phòng thi tại đây!</label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror"
                                            id="code" maxlength="6" name="code" required>
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                            @if (Auth::user()->role == 'ADMIN' || Auth::user()->id == $room->owner_id)
                                <div class="dropdown position-absolute top-1 end-0 me-3">
                                    <button class="btn btn-sm btn-light p-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Icon for dropdown menu -->
                                        <i class="bi bi-three-dots-vertical fs-5"></i>
                                    </button>
                                    <!-- Dropdown menu -->

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#deleteRoomModal-{{ $room->id }}">Xoá phòng</a>
                                        </li>
                                        {{-- Chỉ hiển thị nếu phòng chưa đóng --}}
                                        @if (!$room->is_closed)
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#closeRoomModal-{{ $room->id }}">Đóng phòng</a>
                                            </li>
                                        @endif

                                        @if ($room->is_closed)
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#openRoomModal-{{ $room->id }}">Mở phòng</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif

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
                            @if ($room->is_closed)
                                <button class="btn btn-secondary d-block w-100" disabled>
                                    PHÒNG THI ĐÃ ĐÓNG<i class="bi bi-dash-circle-fill ms-2"></i>
                                </button>
                            @else
                                <a href="{{ URL::to('rooms/join/' . $room->id) }}" class="btn btn-primary d-block w-100">
                                    VÀO PHÒNG<i class="bi bi-arrow-right-circle-fill ms-2"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>

                {{-- Modal for confirming actions --}}
                <div class="modal fade" id="deleteRoomModal-{{ $room->id }}" tabindex="-1"
                    aria-labelledby="deleteRoomModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteRoomModalLabel">Xác nhận XOÁ PHÒNG</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xoá phòng này không?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('rooms/' . $room->id) }}" method="POST" class="pull-right">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                    <button type="submit" class="btn btn-danger">Xác nhận xoá</button>
                                </form>
                                {{-- <button type="button" class="btn btn-danger">Xác nhận xoá</button> --}}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal for closing room --}}
                <div class="modal fade" id="closeRoomModal-{{ $room->id }}" tabindex="-1"
                    aria-labelledby="closeRoomModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="closeRoomModalLabel">Xác nhận ĐÓNG PHÒNG</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn đóng phòng này không?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                <a type="button" class="btn btn-danger"
                                    href="{{ URL::to('/rooms/close/' . $room->id) }}">Xác nhận đóng</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal for opening room --}}
                <div class="modal fade" id="openRoomModal-{{ $room->id }}" tabindex="-1"
                    aria-labelledby="openRoomModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="openRoomModalLabel">Xác nhận MỞ PHÒNG</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn MỞ phòng này không?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                <a type="button" class="btn btn-danger"
                                    href="{{ URL::to('/rooms/open/' . $room->id) }}">Xác nhận mở</a>
                            </div>
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
