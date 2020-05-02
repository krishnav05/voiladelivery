<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryItem;
use App\Kitchen;
use App\HindiCategory;
use App\HindiCategoryItems;
use Auth;
use Session;

class MenuController extends Controller
{
	public function getItems()
	{	
		if (app()->getLocale() == 'en') {

    	//get category list and respective items
			$category = Category::all();
			$category_items = CategoryItem::all();

			if(Auth::guest())
			{
				$total_quantity = 0;
			}
			else
			{
				$total_quantity = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity');

				$kitchen_status = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->get();

				foreach ($category_items as $key) {
				# code...
				$key['item_quantity'] = '';
				foreach ($kitchen_status as $keys) {
					# code...
					if ($key['item_id'] == $keys['item_id']) {
						# code...
						$key['item_quantity'] = $keys['item_quantity'];
					}
				}

			}

			}	
			

			return view('restaurant_menu',['category' => $category,'category_items' => $category_items,'total_quantity' => $total_quantity]);

		}

		else if (app()->getLocale() == 'hi') {
			
			$category = Category::all();
			$category_items = CategoryItem::all();
			$hindi_category = HindiCategory::all();
			$hindi_category_items = HindiCategoryItems::all();

			foreach ($category as $key) {
    
				foreach ($hindi_category as $value) {
    	
					if ($key['category_id'] == $value['category_id']) {
    			
						$key->category_name = $value->category_name; 
					}

				}
			}

			foreach ($category_items as $key) {
				foreach ($hindi_category_items as $value) {
					if($key['item_id'] == $value['item_id']){
						$key->item_name = $value->item_name;
						$key->item_description = $value->item_description;
					}
				}
			}


			if(Auth::guest())
			{
				$total_quantity = 0;
			}
			else
			{
				$total_quantity = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity');

				$kitchen_status = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->get();

				foreach ($category_items as $key) {
				# code...
				$key['item_quantity'] = '';
				foreach ($kitchen_status as $keys) {
					# code...
					if ($key['item_id'] == $keys['item_id']) {
						# code...
						$key['item_quantity'] = $keys['item_quantity'];
					}
				}

			}

			}	
			

			return view('restaurant_menu',['category' => $category,'category_items' => $category_items,'total_quantity' => $total_quantity]);
		}

	}

	public function addItem(Request $request)
	{
		if(Auth::guest()){
			$response = array(
            'status' => 'unauthorized',
          	);
        	return response()->json($response);
		}
		else
		{
			if($request->action == 'add')
			{
				$new_item = new Kitchen;
				$new_item->item_id = $request->item_id;
				$new_item->item_quantity = '1';
				$new_item->user_id = Auth::user()->id; 
				$new_item->save();

				$total_quantity = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity');

				$response = array(
					'status' => 'success',
					'total_quantity' => $total_quantity,
				);
				return response()->json($response); 
			}
			else if($request->action == 'plus')
			{
				Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->increment('item_quantity');
				$total_quantity = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity');

				$response = array(
					'status' => 'success',
					'total_quantity' => $total_quantity,
				);

				return response()->json($response);
			}
			else if($request->action == 'minus')
			{
				Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->decrement('item_quantity');

				$to_delete = Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->pluck('item_quantity');

				if($to_delete[0] == 0)
				{
					Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->delete();
				}

				$total_quantity = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity');

				$response = array(
					'status' => 'success',
					'total_quantity' => $total_quantity,
				);

				return response()->json($response);
			}	
		}
	}
}
