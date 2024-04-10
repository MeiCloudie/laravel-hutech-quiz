<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\QuizCollection;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $rooms = Room::where('is_closed', false)->get();
        $rooms = Room::all();
        $quizCollections = QuizCollection::all();

        return view('rooms.index')
            ->with('rooms', $rooms)
            ->with('quizCollections', $quizCollections);
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
        return view('rooms.show')
            ->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $room = Room::find($id);
        $users = User::all();
        $quizCollections = QuizCollection::all();

        // show the view and pass the room to it
        return view('rooms.edit')
            ->with([
                'room' => $room,
                'users' => $users,
                'quizCollections' => $quizCollections
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, $id)
    {
        //
        $rules = array(
            'quizCollectionId'       => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('quizzes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $room = Room::find($id);
            $room->quiz_collection_id      = $request->quizCollectionId;
            $room->save();

            // redirect
            // Session::flash('message', 'Successfully updated room!');
            return Redirect::to('quizzes');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $room = Room::find($id);
        $room->delete();

        return Redirect::to('rooms');
    }

    public function find(Request $request)
    {
        $rooms = Room::where('code', $request->code)->get();
        if ($rooms->count() > 0) {
            $id = $rooms[0]->id;
            return redirect()->route('rooms.show', [$id]);
        }
        return redirect()->route('rooms.index')
            ->withErrors(['code' => 'Không tìm thấy phòng'])
            ->withInput();
    }

    public function close($id)
    {
        $room = Room::find($id);
        $room->is_closed = 1;
        $room->save();

        return redirect()->route('rooms.index');
    }

    public function open($id)
    {
        $room = Room::find($id);
        $room->is_closed = 0;

        $room->save();

        return redirect()->route('rooms.index');
    }

    public function join($id)
    {
        $room = Room::find($id);
        $ids = $room->users->map((function ($user, $key) {
            return $user->id;
        }));

        if (!$ids->contains(Auth::user()->id)) {
            $user = User::find(Auth::user()->id);
            $room->users()->attach($user);
        }

        return Redirect::to('rooms/' . $room->id);
    }

    public function leave($id)
    {
        $room = Room::find($id);
        $ids = $room->users->map((function ($user, $key) {
            return $user->id;
        }));

        if ($ids->contains(Auth::user()->id)) {
            $user = User::find(Auth::user()->id);
            $room->users()->detach($user);
        }

        return Redirect::to('rooms');
    }
}
