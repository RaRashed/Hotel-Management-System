<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index',['services' =>Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('service.create');
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
            'small_desc' => 'required',
            'detail_desc' => 'required',
            'photo' => 'required'





        ]);

        $image =$request->photo->store('service');

        Service::create([

            'title' => $request->title,
            'small_desc' => $request->small_desc,
            'detail_desc' => $request->detail_desc,
            'photo' =>$image
        ]);


      return redirect(route('service.create'))->with('success', 'Service Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service=Service::find($id);
        return view('service.show',['service'=>$service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service =Service::find($id);
        return view('service.edit',['service' => $service]);
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
        $validated = $request->validate([
            'title' => 'required|unique:room_types|max:255',
            'small_desc' => 'required',
            'detail_desc' => 'required',





        ]);
        $service = Service::find($id);

        if($request->hasFile('photo')){
            Storage::delete($service->photo);


        $image =$request->file('photo')->store('service');
        }
        else
        {
            $image = $request->prev_photo;
        }
$service->title = $request->title;
$service->small_desc = $request->small_desc;
$service->detail_desc = $request->detail_desc;
$service->photo = $image;

$service->update();

return redirect(route('service.index'))->with('success', 'Service Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Service::find($id);

        Storage::delete($data->photo);
        $data->delete();

        return redirect(route('service.index'))->with('success', 'Service deleted Successfully');
    }
}
