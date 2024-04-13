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

        // Xóa tất cả các bản ghi của người dùng hiện tại trong bảng 'records'
        Record::where('user_id', $userId)->where('room_id', $id)->delete();
        $room = Room::find($id);
        foreach ($room->quizCollection->quizzes as $quiz) {
            $record = new Record;
            $record->user_id = $userId;
            $record->room_id = $id;
            $record->quiz_id = $quiz->id;
            $record->answer_id = array_key_exists($quiz->id, $request->answers) ? $request->answers[$quiz->id] : null;
            $record->save();
        }
        // dd(Record::all());
        return Redirect::to('rooms/' . $id . '/result');
    }

    public function result($id)
    {
        $room = Room::find($id);
        $records = $room->records
            ->where('user_id', Auth::user()->id)
            ->values();
        $correctAnswerCount = $records->where('answer.is_correct', true)->count();
        $incorrectAnswerCount = $records->where('answer.is_correct', false)->count();
        $recordsByQuizId = $records->map(
            function ($record, $index) {
                return [
                    'answer' => $record->answer,
                    'quiz' => $record->quiz,
                    'correctAnswers' => $record->quiz->answers->where('is_correct', true)
                ];
            }
        )->keyBy(function ($item) {
            return $item['quiz']->id;
        });

        $recordViewModel = $records
            ->map(
                function ($record, $index) {
                    return [
                        'answer' => $record->answer,
                        'quiz' => $record->quiz,
                        'correctAnswers' => $record->quiz->answers->where('is_correct', true)->values()
                    ];
                }
            );
        // dd($records);
        return view('play.result')
            ->with([
                'room' => $room,
                'correctAnswerCount' => $correctAnswerCount,
                'incorrectAnswerCount' => $incorrectAnswerCount,
                'records' => $recordViewModel,
                'recordsByQuizId' => $recordsByQuizId
            ]);
    }
}
