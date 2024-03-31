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
        <a class="navbar-brand" href="{{ url('quizzes') }}">Quiz Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ url('quizzes') }}">View All Quizzes</a></li>
        <li><a href="{{ url('quizzes/create') }}">Create a Quiz</a></li>
    </ul>
</nav>

<h1>Edit {{ $quiz->content }}</h1>

<!-- if there are creation errors, they will show here -->
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="content">Content</label>
        <input type="text" id="content" name="content" value="{{ $quiz->content }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="explaination">Explaination</label>
        <input type="text" id="explaination" name="explaination" value="{{ $quiz->explaination }}"
            class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Edit the Quiz!</button>
</form>

</div>
</body>
</html>
