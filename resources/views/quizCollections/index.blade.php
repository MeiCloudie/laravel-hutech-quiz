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
        <a class="navbar-brand" href="{{ URL::to('quizCollections') }}">Quiz Collection Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('quizCollections') }}">View All quiz collections</a></li>
        <li><a href="{{ URL::to('quizCollections/create') }}">Create a quiz collection</a>
    </ul>
</nav>

<h1>All the quizCollections</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($quizCollections as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the quiz (uses the destroy method DESTROY /quizCollections/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the quiz (uses the show method found at GET /quizCollections/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('quizCollections/' . $value->id) }}">Show this quiz collection</a>

                <!-- edit this quiz (uses the edit method found at GET /quizCollections/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('quizCollections/' . $value->id . '/edit') }}">Edit this quiz collection</a>

                <!-- delete this quiz -->

                <form action="{{ url('quizCollections/' . $value->id) }}" method="POST" class="pull-right">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-small btn-danger">Delete this quiz collection</button>
              </form>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>