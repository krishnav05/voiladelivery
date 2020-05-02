<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddress;
use Auth;
use App\Kitchen;
use App\CategoryItem;

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
        $kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->get();
        $category_items = CategoryItem::all();
        $total_price = 0;
        foreach ($kitchen as $key) {
                foreach ($category_items as $value) {
                    if($key['item_id'] == $value['item_id'])
                    {
                        $total_price += $key['item_quantity']*$value['item_price']; 
                    }
                }
            }

            $total_price*= 100;

    	return view('address',['all_address' => $all_address,'total_price'=>$total_price]);
    }
}
