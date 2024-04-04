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
                <a class="navbar-brand" href="{{ URL::to('rooms') }}">room Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('rooms') }}">View All rooms</a></li>
                <li><a href="{{ URL::to('rooms/create') }}">Create a room</a>
            </ul>
        </nav>

        <h1>Create a room</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ url('rooms') }}" method="POST">
            @csrf

            <select id="ownerId" class="form-select @error('ownerId') is-invalid @enderror" name="ownerId" required
                autofocus>
                <option value="" selected disabled>Chọn chủ phòng</option>
                @foreach ($users as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->username }}</option>
                @endforeach
            </select>

            <select id="quizCollectionId" class="form-select @error('quizCollectionId') is-invalid @enderror" name="quizCollectionId" required
                autofocus>
                <option value="" selected disabled>Chọn tập câu hỏi</option>
                @foreach ($quizCollections as $quizCollection)
                    <option value="{{ $quizCollection->id }}">{{ $quizCollection->name }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="currentQuizId">Quiz Collection id</label>
                <input type="text" id="currentQuizId" name="currentQuizId"
                    value="{{ old('currentQuizId') }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>


    </div>
</body>

</html>
