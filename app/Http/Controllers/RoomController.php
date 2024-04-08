<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\QuizCollection;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::where('is_closed', false)->get();

        return view('rooms.index')
            ->with('rooms', $rooms);

        return view('rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        $quizCollections = QuizCollection::all();
        return view('rooms.create')->with([
            'users' => $users,
            'quizCollections' => $quizCollections
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        //
        $rules = array(
            // 'code'       => 'required',
            'ownerId'      => 'required',
            // 'currentQuizId'      => 'required',
            'quizCollectionId'      => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('rooms/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $room = new Room();
            $room->code       = Room::generateCode();
            $room->owner_id      = $request->ownerId;
            $room->current_quiz_id      = $request->currentQuizId;
            $room->quiz_collection_id      = $request->quizCollectionId;
            $room->save();

            // redirect
            // Session::flash('message', 'Successfully created room!');
            return Redirect::to('rooms');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
