<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    public function about_us()
    {
        return view('frontend.about_us');
    }
    public function contact_us()
    {
        return view('frontend.contact_us');
    }
    public function save_contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'msg' => 'required'
 ]);
            $data=array(
                'name' =>$request->name,
                'email' =>$request->email,
                'subject' =>$request->subject,
                'msg' =>$request->msg
            );

        Mail::send('mail',$data,function($messages)
        {
            $messages->to('1999ckb@gmail.com','Rashed')->subject(request()->subject);
            $messages->from('1999ckb@gmail.com',request()->name);
        });
        return redirect(url('contact_us'))->with('success','Send Message successfully');

    }
}
