<?php

namespace App\Http\Controllers;

use App\Models\QuizCollection;
use App\Models\Record;
use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function submit($id,FormRequest $request) {
        $userId = Auth::user()->id;
        foreach ($request->answers as $quizId => $answerId) {
            Record::create([
                'user_id' => $userId,
                'room_id' => $id,
                'quiz_id' => $quizId,
                'answer_id' => $answerId
            ]);
        }
        // dd(Record::all());
        return redirect('rooms/'.$id. '/result');
    }

    public function result($id)
    {
        $room = Room::find($id);
        $quizCollections = QuizCollection::all();
        $records = $room->records
        ->where('user_id', Auth::user()->id);
        return view('play.result')
            ->with([
                'room' => $room,
                'quizCollections' => $quizCollections,
                'records' => $records
            ]);
    }
}
