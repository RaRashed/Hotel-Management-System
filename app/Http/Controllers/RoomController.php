<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('room.index',['rooms' =>Room::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roomtype =RoomType::all();
     return view('room.create',['roomtypes' => $roomtype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:rooms|max:255',
            'room_type_id' => 'required'


        ]);

        Room::create([

            'title' => $request->title,
            'room_type_id' => $request->room_type_id
        ]);


      return redirect(route('rooms.create'))->with('success', 'Room Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room=Room::find($id);
        return view('room.show',['room'=>$room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtypes =RoomType::all();
        $room =Room::find($id);
        return view('room.edit',['room' => $room, 'roomtypes'=>$roomtypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

$room = Room::find($id);
$room->title = $request->title;
$room->room_type_id = $request->room_type_id;
$room->update();
return redirect(route('rooms.index'))->with('success', 'Room Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data=Room::find($id);
        $data->delete();

        return redirect(route('rooms.index'))->with('success', 'Room deleted Successfully');

    }
}
