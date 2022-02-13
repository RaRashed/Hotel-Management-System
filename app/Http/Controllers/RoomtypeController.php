<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roomtype.index',['roomtypes' =>RoomType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('roomtype.create');
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
            'title' => 'required|unique:room_types|max:255',
            'price' => 'required',
            'detail' => 'required'

        ]);

      $data = new RoomType;
      $data->title =$request->title;
      $data->price =$request->price;
      $data->detail =$request->detail;
      $data->save();

        foreach($request->file('imgs') as $img)
        {

        $imgPath =$img->store('imgs');
        $imgData = new Roomtypeimage;
        $imgData->room_type_id = $data->id;
        $imgData->image_src = $imgPath;
        $imgData->image_alt = $request->title;
        $imgData->save();


        }



      return redirect(route('roomtype.create'))->with('success', 'Roomtype Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomtype=RoomType::find($id);
        return view('roomtype.show',['roomtype'=>$roomtype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype =RoomType::find($id);
        return view('roomtype.edit',['roomtype' => $roomtype]);
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

$room = RoomType::find($id);
$room->title = $request->title;
$room->price = $request->price;

$room->detail= $request->detail;
$room->update();
return redirect(route('roomtype.index'))->with('success', 'Roomtype Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data=RoomType::find($id);
        $data->delete();

        return redirect(route('roomtype.index'))->with('success', 'Roomtype deleted Successfully');

    }

    public function destroy_image($img_id)
    {
        $data=Roomtypeimage::where('id',$img_id)->first();
       // dd($data->image_src);
        Storage::delete($data->image_src);
        Roomtypeimage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);

    }
}
