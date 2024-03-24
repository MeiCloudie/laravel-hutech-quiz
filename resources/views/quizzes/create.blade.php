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
                <a class="navbar-brand" href="{{ URL::to('quizzes') }}">shark Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('quizzes') }}">View All quizzes</a></li>
                <li><a href="{{ URL::to('quizzes/create') }}">Create a shark</a>
            </ul>
        </nav>

        <h1>Create a shark</h1>

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

            <button type="submit" class="btn btn-primary">Create</button>
        </form>


    </div>
</body>

</html>
