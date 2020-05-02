<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddress;
use Auth;

class AddressController extends Controller
{
    //add new address
    public function add(Request $request)
    {
    	$data = $request->data;

    	$address = new UserAddress;
    	$address->user_id = Auth::user()->id;
    	$address->name = $data['name'];
    	$address->flat_number = $data['flat'];
    	$address->society = $data['society'];
    	$address->pincode = $data['pincode'];
    	$address->landmark = $data['landmark'];
    	$address->save();

    	$response = array(
            'status' => 'success',
          );
        return response()->json($response); 

    }


    public function getDetails()
    {	
    	$all_address = UserAddress::where('user_id',Auth::user()->id)->get();

    	return view('address',['all_address' => $all_address]);
    }
}
