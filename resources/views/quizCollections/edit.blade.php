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
                <a class="navbar-brand" href="{{ url('quizCollection') }}">Quiz collection Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('quizCollection') }}">View All Quiz collections</a></li>
                <li><a href="{{ url('quizCollection/create') }}">Create a Quiz collection</a></li>
            </ul>
        </nav>

        <h1>Edit {{ $quizCollection->content }}</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('quizCollections.update', $quizCollection->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $quizCollection->name }}"
                    class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Edit the Quiz collection!</button>
        </form>

    </div>
</body>

</html>
