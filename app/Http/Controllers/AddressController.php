<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddress;
use Auth;
use App\Kitchen;
use App\CategoryItem;
use Illuminate\Support\Str;
use Bitfumes\Multiauth\Model\Admin;
use App\TimeSlots;

class AddressController extends Controller
{
    //add new address
    public function add($slug,Request $request)
    {
        //check for valid url
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = Admin::where(Str::lower('url'),Str::lower($slug))->value('id');


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


    public function getDetails($slug)
    {	
        //check for valid url
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = Admin::where(Str::lower('url'),Str::lower($slug))->value('id');

    	$all_address = UserAddress::where('user_id',Auth::user()->id)->get();
        $kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->where('business_id',$business_id)->get();
        $category_items = CategoryItem::where('business_id',$business_id)->get();
        $total_price = 0;
        foreach ($kitchen as $key) {
                foreach ($category_items as $value) {
                    if($key['item_id'] == $value['item_id'])
                    {
                        $total_price += $key['item_quantity']*$value['item_price']; 
                    }
                }
            }
            $tax = Admin::where('id',$business_id)->value('tax_applicable');
            $total_price = $total_price + (($tax)/100)*$total_price;
            $total_price*= 100;
             
            
        $timeslots = TimeSlots::where('business_id',$business_id)->get();

    	return view('address',['all_address' => $all_address,'total_price'=>$total_price,'timeslots' => $timeslots]);
    }
}
