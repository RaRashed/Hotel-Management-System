<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //Login
    public function dashboard()
    {
        $bookings=Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels=[];
        $data=[];
        foreach($bookings as $booking)
        {
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }

        //For Pie Chart
        $rtbookings = DB::table('room_types as rt')
        ->join('rooms as r','r.room_type_id','=','rt.id')
        ->join('bookings as b','b.room_id','=','r.id')
             ->select('rt.*','r.*','b.*', DB::raw('count(b.id) as total_bookings'))

             ->groupBy('r.room_type_id')
             ->get();

             $plabels=[];
             $pdata=[];
             foreach($rtbookings as $rbooking)
             {
                 $plabels[]=$rbooking->detail;
                 $pdata[]=$rbooking->total_bookings;
             }


        return view('dashboard',['labels'=>$labels,'data'=>$data,'plabels'=>$plabels,'pdata'=>$pdata]);



    }
    public function login()
    {
        return view('login');
    }
    //Check Login
    public function check_login(Request $request)
    {
        $request->validate([
            'username' =>'required',
            'password'=>'required'
        ]);
        $admin =Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])
        ->count();
        if($admin>0)
        {
            $adminData =Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])
            ->get();
            session(['adminData'=> $adminData]);
            if($request->has('rememberme'))
            {
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);

            }
            return redirect('admin');



        }
        else{
            return redirect('admin/login')->with('success','Invalid Username/Password');
        }

    }
    //logout
    public function logout()
    {
        session()->forget(['adminData']);
        return redirect('admin/login');

    }

    public function testimonial()
    {
        $testimonials = Testimonial::all();
        return view('testimonial.index',['testimonials'=>$testimonials]);
    }
    public function destroy_testimonial($id)
    {
        $data=Testimonial::find($id);

        $data->delete();

        return redirect(url('testimonial/show'))->with('success', 'Testimonial deleted Successfully');
    }

}
