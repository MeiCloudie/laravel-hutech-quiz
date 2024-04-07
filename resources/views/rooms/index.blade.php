@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">DANH SÁCH PHÒNG</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> TẠO PHÒNG
                </a>
            </div>
            <div class="col-md-6 text-end">
                <a href="#" class="btn btn-secondary">
                    <i class="bi bi-search"></i> TÌM PHÒNG
                </a>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon bg-primary rounded-circle p-2">
                                    <i class="bi bi-book"></i>
                                </div>
                                <h5 class="card-title ms-3 mb-0">{{ $room->code }}</h5>
                            </div>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $room->owner->username }}</h6>
                            <img src="{{ asset('images/banner-hutech-quiz.png') }}" class="img-fluid mb-3" alt="Banner">
                            <a href="{{ URL::to('rooms/' . $room->id) }}" class="btn btn-primary">
                                VÀO PHÒNG
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
