<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizCollectionRequest;
use App\Http\Requests\UpdateQuizCollectionRequest;
use App\Models\QuizCollection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class QuizCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quizCollections = QuizCollection::all();

        return view('quizCollections.index')
            ->with('quizCollections', $quizCollections);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('quizCollections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizCollectionRequest $request)
    {
        //
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('quizCollections/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $quizCollection = new QuizCollection();
            $quizCollection->name       = $request->name;
            $quizCollection->save();

            // redirect
            // Session::flash('message', 'Successfully created quizCollection!');
            return Redirect::to('quizCollections');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $quizCollection = QuizCollection::find($id);

        // show the view and pass the quiz collection to it
        return view('quizCollections.show')
            ->with('quizCollection', $quizCollection);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $quizCollection = QuizCollection::find($id);

        // show the view and pass the quiz collection to it
        return view('quizCollections.edit')
            ->with('quizCollection', $quizCollection);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizCollectionRequest $request, $id)
    {
        //
        $rules = array(
            'name'       => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('quizCollections/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $quizCollection = QuizCollection::find($id);
            $quizCollection->name       = $request->name;
            $quizCollection->save();

            // redirect
            // Session::flash('message', 'Successfully updated quiz collection!');
            return Redirect::to('quizCollections');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $quizCollection = QuizCollection::find($id);
        $quizCollection->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the quiz collection!');
        return Redirect::to('quizCollections');
    }
}
