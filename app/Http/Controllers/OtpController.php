<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class OtpController extends Controller
{
    //
	public function sendotp(Request $request)
    {   
        $user = User::where('phone',$request->phone)->first();
        if($user)
        {	
        	$otp = rand(1000,9999);
            User::where('phone',$request->phone)->update(['otp'=>$otp]);
        return view('auth.otp',['number'=>$request->phone]);
        }
        else
        {
        	$user = new User;
        	$user->name = 'Default';
        	$user->password = bcrypt('Default');
        	$user->phone = $request->phone;
        	$user->save(); 

        	$otp = rand(1000,9999);

        	User::where('phone',$request->phone)->update(['otp'=>$otp]);
            // return redirect()->back();
            return view('auth.otp',['number'=>$request->phone]);
        }
    }

    public function verifyotp(Request $request)
    {   
        $pin = $request->pin1.$request->pin2.$request->pin3.$request->pin4;
        $user = User::where('phone',$request->phone)->where('otp',$pin)->first();
        if($user)
        {
            Auth::login($user);
            $check_if_verified = User::where('phone',$request->phone)->where('phone_verified',1)->first();
            if($check_if_verified){
            	User::where('phone',$request->phone)->update(['otp'=>null,'phone_verified'=>1]);	
            }
            else{
            	User::where('phone',$request->phone)->update(['otp'=>null]);
            }

            $slug = $_COOKIE['slug'];
            // $title = '/outlet/'.$title.'/kitchen';

            return redirect()->route('kitchen',['slug'=>$slug]);
            // return view('home');
        }
    }

}
