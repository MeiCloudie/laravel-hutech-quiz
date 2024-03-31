<!DOCTYPE html>
<html>

<head>
    <title>Quiz App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('quizzes') }}">Quiz Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('quizzes') }}">View All quizzes</a></li>
                <li><a href="{{ URL::to('quizzes/create') }}">Create a quiz</a>
            </ul>
        </nav>

        <h1>All the quizzes</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Content</td>
                    <td>Explaination</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->content }}</td>
                        <td>{{ $value->explaination }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the quiz (uses the destroy method DESTROY /quizzes/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                            <!-- show the quiz (uses the show method found at GET /quizzes/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('quizzes/' . $value->id) }}">Show this
                                quiz</a>

                            <!-- edit this quiz (uses the edit method found at GET /quizzes/{id}/edit -->
                            <a class="btn btn-small btn-info"
                                href="{{ URL::to('quizzes/' . $value->id . '/edit') }}">Edit this quiz</a>

                            <!-- delete this quiz -->

                            <form action="{{ url('quizzes/' . $value->id) }}" method="POST" class="pull-right">
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
</body>

</html>
