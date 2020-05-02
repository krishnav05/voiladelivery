<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kitchen;
use App\CategoryItem;
use Auth;
use DB;

class KitchenController extends Controller
{
    
    public function getItems()
    {
    	$category_items = CategoryItem::all();
    	$kitchen = null;
    	//serial number counter
    	$count = 1;
        $total_price = 0;

    	if(Auth::guest())
    	{

    	}
    	else
    	{
    		$kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->get();
    		if(Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity') == 0)
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

    public function updateItems(Request $request)
    {

    	if($request->action == 'plus')
    	{
    		Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->increment('item_quantity');

    		$item_qty = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->value('item_quantity');

    		$item_price = CategoryItem::where('item_id',$request->item_id)->value('item_price');
    		$item_price = $item_price * $item_qty;

    		$category_items = CategoryItem::all();
    		$kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->get();
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

    	if($request->action == 'minus')
    	{
    		Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->decrement('item_quantity');

				$to_delete = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->pluck('item_quantity');

				if($to_delete[0] == 0)
				{
					Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->delete();
					$response = array(
					'status' => 'delete',
				);

				return response()->json($response);	
				}

				$category_items = CategoryItem::all();
	    		$kitchen = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->get();
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


				$item_qty = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->value('item_quantity');

	    		$item_price = CategoryItem::where('item_id',$request->item_id)->value('item_price');
	    		$item_price = $item_price * $item_qty;

				$response = array(
					'status' => 'success',
					'item_price' => $item_price,
					'total' => $total_price,
				);

				return response()->json($response);	
    	}

    }

    public function confirm()
    {   
        Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->update(['confirm_status' => 1]);


        $response = array(
                    'status' => 'success',
                );

        return response()->json($response); 
    }


}
