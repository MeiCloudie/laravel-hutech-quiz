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
        <a class="navbar-brand" href="{{ URL::to('quizzes') }}">quiz Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('quizzes') }}">View All quizzes</a></li>
        <li><a href="{{ URL::to('quizzes/create') }}">Create a quiz</a>
    </ul>
</nav>

<h1>Showing {{ $quiz->id }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $quiz->id }}</h2>
        <p>
            <strong>Content:</strong> {{ $quiz->content }}<br>
            <strong>Explaination:</strong> {{ $quiz->explaination }}
        </p>
    </div>

</div>
</body>
</html>