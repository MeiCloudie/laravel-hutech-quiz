@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">DANH SÁCH BỘ CÂU HỎI</h1>
            <a href="{{ URL::to('quizzes/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>TẠO BỘ CÂU
                HỎI</a>
        </div>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info mt-3">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nội dung</th>
                    <th class="text-center">Giải thích</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $key => $value)
                    <tr>
                        <td class="text-center">{{ $value->id }}</td>
                        <td>{{ $value->content }}</td>
                        <td>{{ $value->explaination }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td class="text-center">

                            <!-- show the quiz (uses the show method found at GET /quizzes/{id} -->
                            <a class="btn btn-success mr-2" href="{{ URL::to('quizzes/' . $value->id) }}"><i
                                    class="bi bi-eye-fill me-2"></i>Xem</a>

                            <!-- edit this quiz (uses the edit method found at GET /quizzes/{id}/edit -->
                            <a class="btn btn-info mr-2" href="{{ URL::to('quizzes/' . $value->id . '/edit') }}"><i
                                    class="bi bi-pen-fill me-2"></i>Chỉnh
                                sửa</a>

                            <!-- delete this quiz -->
                            <form action="{{ url('quizzes/' . $value->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i
                                        class="bi bi-trash-fill me-2"></i>Xoá</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
