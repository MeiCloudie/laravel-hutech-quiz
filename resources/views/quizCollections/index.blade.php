@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">DANH SÁCH BỘ ĐỀ THI</h1>
            <a href="{{ URL::to('quizCollections/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>TẠO
                BỘ ĐỀ THI</a>
        </div>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info mt-3">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên Bộ Đề Thi</th>
                    <th class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizCollections as $key => $value)
                    <tr>
                        <td class="text-center">{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td class="text-center">

                            <!-- show the quiz (uses the show method found at GET /quizCollections/{id} -->
                            <a class="btn btn-success mr-2" href="{{ URL::to('quizCollections/' . $value->id) }}"><i
                                    class="bi bi-eye-fill me-2"></i>XEM</a>

                            <!-- edit this quiz (uses the edit method found at GET /quizCollections/{id}/edit -->
                            <a class="btn btn-info mr-2" href="{{ URL::to('quizCollections/' . $value->id . '/edit') }}"><i
                                    class="bi bi-pen-fill me-2"></i>CHỈNH SỬA</a>

                            <!-- delete this quiz -->
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRoomModal">
                                <i class="bi bi-trash-fill me-2"></i> XOÁ
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
                        <p>Bạn có chắc chắn muốn xoá BỘ ĐỀ THI này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HUỶ</button>
                        <form action="{{ url('quizCollections/' . $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">XÁC NHẬN XOÁ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
