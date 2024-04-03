@extends('layouts.app')

@section('content')
    <div class="">
        <h1>Rooms</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Code</td>
                    <td>Owner</td>
                    <td>Current Quiz</td>
                    <td>Quiz Collection</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->owner->username }}</td>
                        <td>{{ $value->currentQuiz->content }}</td>
                        <td>{{ $value->quizCollection->name }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the quiz (uses the destroy method DESTROY /rooms/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                            <!-- show the quiz (uses the show method found at GET /rooms/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('rooms/' . $value->id) }}">Show this
                                quiz</a>

                            <!-- edit this quiz (uses the edit method found at GET /rooms/{id}/edit -->
                            <a class="btn btn-small btn-info"
                                href="{{ URL::to('rooms/' . $value->id . '/edit') }}">Edit this quiz</a>

                            <!-- delete this quiz -->

                            <form action="{{ url('rooms/' . $value->id) }}" method="POST" class="pull-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-small btn-danger">Delete this quiz</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
