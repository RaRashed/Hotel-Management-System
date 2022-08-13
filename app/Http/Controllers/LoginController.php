<?php

namespace App\Http\Controllers;
use Hash;
use Str;
use App\Models\Customer;
//use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;

use Socialite;
use Auth;

class LoginController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();

    }
    public function githubredirect()
    {

        $user = Socialite::driver('github')->user();
        //dd($user);
        $user = Customer::firstOrCreate([
            'email' => $user->email

        ],[
            'full_name' => $user->name,
            'password' => sha1(Str::random(24)),


        ]);
        //Auth::login($user,true);

        return redirect('/');


    }
}
