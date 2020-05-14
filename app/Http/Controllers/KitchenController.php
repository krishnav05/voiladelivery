<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kitchen;
use App\CategoryItem;
use Auth;
use DB;
use Session;
use App\SessionValue;
use Illuminate\Support\Str;
use Bitfumes\Multiauth\Model\Admin;
use App\Orders;

class KitchenController extends Controller
{
    
    public function getItems($slug)
    {   
        //check for valid url
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = Admin::where(Str::lower('url'),Str::lower($slug))->value('id');

    	$category_items = CategoryItem::where('business_id',$business_id)->get();
    	$kitchen = null;
    	//serial number counter
    	$count = 1;
        $total_price = 0;

    	if(Auth::guest())
    	{

            $id =  Session::get($slug.'uni_id');

            $kitchen = SessionValue::where('session_id',$id)->get();
            if(SessionValue::where('session_id',$id)->sum('item_quantity') == 0)
            {
                $kitchen = null;
            }
            else
            {
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
            }
    	}
    	else
    	{
            if(isset($_COOKIE[$slug.'uni_id']))
            {   //get cookie
                $val = $_COOKIE[$slug.'uni_id'];

                Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->delete();

                $session_value = SessionValue::where('session_id',$val)->get();

                foreach ($session_value as $key) {
                    # code...
                    $new = new Kitchen;
                    $new->user_id = Auth::user()->id;
                    $new->business_id = $business_id;
                    $new->item_id = $key['item_id'];
                    $new->item_quantity = $key['item_quantity'];
                    $new->save();

                    $key->delete();
                }

                //delete cookie
                setcookie($slug.'uni_id', '', time() - 3600);
            }


    		$kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->where('business_id',$business_id)->get();
    		if(Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->where('business_id',$business_id)->sum('item_quantity') == 0)
    		{
    			$kitchen = null;
    		}
            else
            {
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
            }
    		
    	}

    	return view('kitchen',['category_items' => $category_items,'kitchen' => $kitchen,'count' => $count,'total_price' => $total_price]);
    }

    public function updateItems($slug,Request $request)
    {
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = Admin::where(Str::lower('url'),Str::lower($slug))->value('id');



    	if($request->action == 'plus')
    	{   

            if(Auth::guest())
            {
                $id = Session::get($slug.'uni_id');

                SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->increment('item_quantity');

                $item_qty = SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->value('item_quantity');

            $item_price = CategoryItem::where('item_id',$request->item_id)->where('business_id',$business_id)->value('item_price');
            $item_price = $item_price * $item_qty;
            $total_price = 0;
            $category_items = CategoryItem::where('business_id',$business_id)->get();
            $kitchen = SessionValue::where('session_id',$id)->get();
            foreach ($kitchen as $key) {
                foreach ($category_items as $value) {
                    if($key['item_id'] == $value['item_id'])
                    {
                        $total_price += $key['item_quantity']*$value['item_price']; 
                    }
                }
            }

            $total_price*= 100;


                $response = array(
                    'status' => 'unauthorized',
                    'item_price' => $item_price,
                    'total' => $total_price,
                );

                return response()->json($response);

            }
            else{
                Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->where('business_id',$business_id)->increment('item_quantity');

            $item_qty = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->where('business_id',$business_id)->value('item_quantity');

            $item_price = CategoryItem::where('item_id',$request->item_id)->where('business_id',$business_id)->value('item_price');
            $item_price = $item_price * $item_qty;

            $category_items = CategoryItem::where('business_id',$business_id)->get();
            $kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->where('business_id',$business_id)->get();
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


                $response = array(
                    'status' => 'success',
                    'item_price' => $item_price,
                    'total' => $total_price,
                );

                return response()->json($response);
            }

    		
    	}

    	if($request->action == 'minus')
    	{
            if(Auth::guest())
            {
                $id = Session::get($slug.'uni_id');

                SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->decrement('item_quantity');

                if(SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->value('item_quantity') == 0)
                {
                    SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->delete();

                    $response = array(
                    'status' => 'delete',
                );

                return response()->json($response);
                }

            $item_qty = SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->value('item_quantity');

            $item_price = CategoryItem::where('item_id',$request->item_id)->where('business_id',$business_id)->value('item_price');
            $item_price = $item_price * $item_qty;
            $total_price = 0;
            $category_items = CategoryItem::where('business_id',$business_id)->get();
            $kitchen = SessionValue::where('session_id',$id)->get();
            foreach ($kitchen as $key) {
                foreach ($category_items as $value) {
                    if($key['item_id'] == $value['item_id'])
                    {
                        $total_price += $key['item_quantity']*$value['item_price']; 
                    }
                }
            }

            $total_price*= 100;


                $response = array(
                    'status' => 'unauthorized',
                    'item_price' => $item_price,
                    'total' => $total_price,
                );

                return response()->json($response);

            }
            else
            {
                Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->where('business_id',$business_id)->decrement('item_quantity');

                $to_delete = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->where('business_id',$business_id)->pluck('item_quantity');

                if($to_delete[0] == 0)
                {
                    Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->where('business_id',$business_id)->delete();
                    $response = array(
                    'status' => 'delete',
                );

                return response()->json($response); 
                }

                $category_items = CategoryItem::where('business_id',$business_id)->get();
                $kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->where('business_id',$business_id)->get();
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


                $item_qty = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->where('business_id',$business_id)->value('item_quantity');

                $item_price = CategoryItem::where('item_id',$request->item_id)->where('business_id',$business_id)->value('item_price');
                $item_price = $item_price * $item_qty;

                $response = array(
                    'status' => 'success',
                    'item_price' => $item_price,
                    'total' => $total_price,
                );

                return response()->json($response);
            }


    			
    	}

    }

    public function confirm($slug,Request $request)
    {  
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = Admin::where(Str::lower('url'),Str::lower($slug))->value('id');

        $order = new Orders;
        $order->razorpay_payment_id = $request->id;
        $order->amount = $request->amount;
        $order->time_slot = $request->timeid;
        $order->date = $request->date;
        $order->business_id = $business_id;
        $order->user_id = Auth::user()->id;
        $order->address_id = $request->address;
        $order->save();
        $id = $order->id;

        setcookie('orderid',$id);
        Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->where('business_id',$business_id)->update(['confirm_status' => 1,'order_id' => $id]);


        $response = array(
                    'status' => 'success',
                );

        return response()->json($response); 
    }


    public function check_status($slug)
    {
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = Admin::where(Str::lower('url'),Str::lower($slug))->value('id');


        if(Orders::where('id',$_COOKIE['orderid'])->value('order_status') == 'Accepted')
        {
            $response = array(
                    'status' => 'accept',
                );
        }
        else if(Orders::where('id',$_COOKIE['orderid'])->value('order_status') == 'Preparing')
        {
            $response = array(
                    'status' => 'preparing',
                );
        }
        else if(Orders::where('id',$_COOKIE['orderid'])->value('order_status') == 'Out For Delivery')
        {
            $response = array(
                    'status' => 'outfor',
                );
        }
        else if(Orders::where('id',$_COOKIE['orderid'])->value('order_status') == 'Delivered')
        {
            $response = array(
                    'status' => 'delivered',
                );
        }

        return response()->json($response); 

    }


    public function ordersentkitchen()
    {
        $cookie = $_COOKIE['orderid'];

        return view('order_sent_kitchen',['cookie'=>$cookie]);
    }


    public function checkminimumprice($slug,Request $request)
    {
        $ifexist = Admin::where(Str::lower('url'),Str::lower($slug))->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $minimum_price = Admin::where(Str::lower('url'),Str::lower($slug))->value('minimum_price');

        if(($request->price/100) >= $minimum_price)
        {
            $response = array(
                    'status' => 'okay',
                );
        }
        else{
            $response = array(
                    'status' => 'more',
                );
        }
        
        return response()->json($response); 
    }
}
