<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\QuizCollection;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quizzes = Quiz::all();

        return view('quizzes.index')
            ->with('quizzes', $quizzes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        //
        $rules = array(
            'content'       => 'required',
            'explaination'      => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('quizzes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $quiz = new Quiz();
            $quiz->content       = $request->content;
            $quiz->explaination      = $request->explaination;
            $quiz->save();

            foreach ($request->answers as $index => $answer) {
                $quiz->answers()->create([
                    'content' => $answer,
                    'is_correct' => isset($request->isCorrect[$index]),
                ]);
            }

            // redirect
            // Session::flash('message', 'Successfully created quiz!');
            return Redirect::to('quizzes');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $quiz = Quiz::find($id);

        // $quizCollection = new QuizCollection;
        // $quizCollection->name = "hi";
        // $quizCollection->save();
        // $quiz->quizCollections()->attach($quizCollection);

        // show the view and pass the quiz to it
        return view('quizzes.show')
            ->with('quiz', $quiz);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $quiz = Quiz::find($id);

        // show the view and pass the quiz to it
        return view('quizzes.edit')
            ->with('quiz', $quiz);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, $id)
    {
        //
        $rules = array(
            'content'       => 'required',
            'explaination'      => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('quizzes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $quiz = Quiz::find($id);
            $quiz->content       = $request->content;
            $quiz->explaination      = $request->explaination;
            $quiz->save();

            // redirect
            // Session::flash('message', 'Successfully updated quiz!');
            return Redirect::to('quizzes');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $quiz = Quiz::find($id);
        $quiz->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the quiz!');
        return Redirect::to('quizzes');
    }
}
