<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Home Page
    public function home()
    {
        $roomtypes =RoomType::all();
        return view('home',['roomtypes'=>$roomtypes]);
    }
}
