@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $room->id }}</h1>
        <p>{{ $room->quizCollection->name }}</p>
    </div>
@endsection
