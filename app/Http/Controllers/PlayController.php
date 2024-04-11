<?php

namespace App\Http\Controllers;

use App\Models\QuizCollection;
use App\Models\Room;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    //
    public function index($id)
    {
        $room = Room::find($id);
        $quizCollections = QuizCollection::all();
        return view('play.index')
        ->with([
            'room' => $room,
            'quizCollections' => $quizCollections
        ]);
    }
}
