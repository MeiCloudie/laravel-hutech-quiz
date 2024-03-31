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
                <a class="navbar-brand" href="{{ URL::to('quizCollections') }}">quiz collection Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('quizCollections') }}">View All quiz collections</a></li>
                <li><a href="{{ URL::to('quizCollections/create') }}">Create a quiz collection</a>
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

        <form action="{{ url('quizCollections') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>


    </div>
</body>

</html>
