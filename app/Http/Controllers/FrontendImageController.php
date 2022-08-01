<?php

namespace App\Http\Controllers;

use App\Models\FrontendImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     return view('frontend.frontend_image.index',['frontendimages' =>FrontendImage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.frontend_image.create');
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

            'photo' => 'required'




        ]);

        $image =$request->photo->store('frontendimgs');

        FrontendImage::create([
            'image' => $image
        ]);


      return redirect(route('frontendimage.create'))->with('success', 'Frontend Image Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frontendimage=FrontendImage::find($id);
        return view('frontend.frontend_image.show',['frontendimage'=>$frontendimage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frontendimage=FrontendImage::find($id);
        return view('frontend.frontend_image.edit',['frontendimage'=>$frontendimage]);
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

        $frontendimage = frontendimage::find($id);

        if($request->hasFile('photo')){
            Storage::delete($frontendimage->photo);


        $image =$request->file('photo')->store('frontendimgs');
        }
        else
        {
            $image = $request->prev_photo;

        }


      $frontendimage->photo = $image;

      $frontendimage->update();

return redirect(route('frontendimage.index'))->with('success', 'frontendimage Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=frontendimage::find($id);
        Storage::delete($data->image);
        $data->delete();

        return redirect(route('frontendimage.index'))->with('success', 'frontendimage deleted Successfully');

    }
}
