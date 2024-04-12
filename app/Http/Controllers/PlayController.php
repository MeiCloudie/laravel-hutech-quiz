<?php

namespace App\Http\Controllers;

use App\Models\QuizCollection;
use App\Models\Record;
use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function submit($id, FormRequest $request)
    {
        $userId = Auth::user()->id;
        foreach ($request->answers as $quizId => $answerId) {
            $record = new Record;
            $record->user_id = $userId;
            $record->room_id = $id;
            $record->quiz_id = $quizId;
            $record->answer_id = $answerId;
            $record->save();
        }
        // dd(Record::all());
        return Redirect::to('rooms/' . $id . '/result');
    }

    public function result($id)
    {
        $room = Room::find($id);
        $quizCollections = QuizCollection::all();
        $records = $room->records
            ->where('user_id', Auth::user()->id)
            ->values();
        $correctAnswerCount = $records->where('answer.is_correct', true)->count();
        $incorrectAnswerCount = $records->where('answer.is_correct', false)->count();
        $recordViewModel = $records
            ->map(
                function ($record, $index) {
                    return [
                        'answer' => $record->answer,
                        'quiz' => $record->quiz,
                        'correctAnswers' => $record->quiz->answers->where('is_correct', true)
                    ];
                }
            );
            // dd($records);
        return view('play.result')
            ->with([
                'room' => $room,
                'quizCollections' => $quizCollections,
                'correctAnswerCount' => $correctAnswerCount,
                'incorrectAnswerCount' => $incorrectAnswerCount,
                'records' => $recordViewModel
            ]);
    }
}
