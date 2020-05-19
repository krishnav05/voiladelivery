<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Bitfumes\Multiauth\Model\Admin;
use App\Licenses;
use Keygen\Keygen;

class LicenseController extends Controller
{
    //
    public function index()
    {	
    	$status = 1;
    	$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		$status = 0;
    	}
    	return view('admin.license',['status'=>$status]);
    }

    public function update_license(Request $request)
    {	
    	$key = Licenses::where('key',$request->key)->where('user',null)->first();

    	if($key)
    	{
    		$id = Licenses::where('key',$request->key)->where('user',null)->value('id');
    		Licenses::where('key',$request->key)->where('user',null)->update(['user'=>Auth::guard('admin')->user()->id]);
    		Auth::guard('admin')->user()->update(['license_id'=>$id]);
    	}
    	return redirect()->back();
    }

    public function generatekey()
    {   
        $licenses = Licenses::all();
        return view('admin.generatekey',['licenses'=>$licenses]);
    }

    public function license_generate()
    {
        // generate new key here

        $key = Keygen::alphanum()->generate('strtoupper');

        $new  = new Licenses;
        $new->key = $key;
        $new->save(); 
        return redirect()->route('generatekey');
    }
}
