<?php

namespace App\Http\Controllers;

use App\Models\FrontendImage;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Home Page
    public function home()
    {
        $services=Service::all();
        $frontendimage = FrontendImage::all();
        $roomtypes =RoomType::all();
        $testimonials =Testimonial::all();
        return view('home',['roomtypes'=>$roomtypes,'frontendimages'=>$frontendimage,'services' => $services,'testimonials'=>$testimonials]);
    }
    public function detail($id)
    {
        $service=Service::find($id);
        return view('frontend.service.detail',['service'=>$service]);
    }
    public function add_testimonial()
    {
        return view('frontend.add-testimonial');

    }
    public function save_testimonial(Request $request)
    {
        $validated = $request->validate([

            'testi_cont' => 'required'






        ]);



        Testimonial::create([

            'customer_id' => $request->customer_id,
            'testi_cont' => $request->testi_cont

        ]);


      return redirect(url('customer/add-testimonial'))->with('success', 'Testimonial Created Successfully');

    }
}
