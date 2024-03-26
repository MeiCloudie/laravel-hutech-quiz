<!DOCTYPE html>
<html>

<head>
    <title>Shark App</title>
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

        <h1>Create a quiz</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ url('quizzes') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" id="content" name="content" value="{{ old('content') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="explaination">Explaination</label>
                <input type="text" id="explaination" name="explaination" value="{{ old('explaination') }}"
                    class="form-control">
            </div>

            <div class="answers">
                <div class="form-group">
                    <label for="answer1">Answer 1:</label>
                    <input type="text" id="answer1" name="answers[]">
                    <input type="checkbox" id="isCorrect1" name="isCorrect[]">
                    <label for="isCorrect1">Is Correct</label>
                </div>

                <div class="form-group">
                    <label for="answer2">Answer 2:</label>
                    <input type="text" id="answer2" name="answers[]">
                    <input type="checkbox" id="isCorrect2" name="isCorrect[]">
                    <label for="isCorrect2">Is Correct</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>


    </div>
</body>

</html>
