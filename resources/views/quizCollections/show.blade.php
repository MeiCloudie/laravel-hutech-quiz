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
        <a class="navbar-brand" href="{{ URL::to('quizCollections') }}">quiz Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('quizCollections') }}">View All quiz collections</a></li>
        <li><a href="{{ URL::to('quizCollections/create') }}">Create a quiz collection</a>
    </ul>
</nav>

<h1>Showing {{ $quizCollection->id }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $quizCollection->id }}</h2>
        <p>
            <strong>Content:</strong> {{ $quizCollection->name }}<br>
        </p>
    </div>

</div>
</body>
</html>