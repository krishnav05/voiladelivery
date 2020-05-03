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
use App\SessionId;
use App\SessionValue;

class MenuController extends Controller
{
	public function getItems()
	{	
		if (app()->getLocale() == 'en') {

    	//get category list and respective items
			$category = Category::all();
			$category_items = CategoryItem::all();

			 if(!Session::has('uni_id'))
			 {	
			 	$newid = new SessionId;
			 	$newid->save();
			 	$id = $newid->id;
			 	Session::put('uni_id',$id);
			 	Session::save();
			 	
				setcookie('uni_id',$id);
			 }

			if(Auth::guest())
			{
				// $total_quantity = 0;

				$id =  Session::get('uni_id');
				$total_quantity = SessionValue::where('session_id',$id)->sum('item_quantity');

				$session_items = SessionValue::where('session_id',$id)->get();

				foreach ($category_items as $key) {
				# code...
				$key['item_quantity'] = '';
				foreach ($session_items as $keys) {
					# code...
					if ($key['item_id'] == $keys['item_id']) {
						# code...
						$key['item_quantity'] = $keys['item_quantity'];
					}
				}

			}


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

			if(!Session::has('uni_id'))
			 {	
			 	$newid = new SessionId;
			 	$newid->save();
			 	$id = $newid->id;
			 	Session::put('uni_id',$id);
			 	Session::save();
			 }

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
		// if(Auth::guest()){

		// 	//session
		// 	$id =  Session::get('uni_id');

		// 	$new = new SessionValue;
		// 	$new->session_id = $id;
		// 	$new->item_id = $request->item_id;
		// 	$new->item_quantity = 1;
		// 	$new->save()

		// 	$response = array(
  //           'status' => 'unauthorized',
  //           'id'	=> $id,
  //         	);
  //       	return response()->json($response);
		// }
		// else
		// {
			if($request->action == 'add')
			{


				if(Auth::guest())
				{
						$id =  Session::get('uni_id');

						$new = new SessionValue;
						$new->session_id = $id;
						$new->item_id = $request->item_id;
						$new->item_quantity = 1;
						$new->save();

						$total_quantity = SessionValue::where('session_id',$id)->sum('item_quantity');

						$response = array(
			            'status' => 'unauthorized',
			            'total'	=> $total_quantity,
			          	);
			        	return response()->json($response);


				}
				else
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
				
			}
			else if($request->action == 'plus')
			{

				if(Auth::guest())
				{
					$id =  Session::get('uni_id');

					SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->increment('item_quantity');

						$total_quantity = SessionValue::where('session_id',$id)->sum('item_quantity');

						$response = array(
			            'status' => 'unauthorized',
			            'total'	=> $total_quantity,
			          	);
			        	return response()->json($response);
				}
				else
				{
					Kitchen::where('user_id',Auth::user()->id)->where('item_id',$request->item_id)->where('confirm_status',null)->increment('item_quantity');
					$total_quantity = Kitchen::where('user_id',Auth::user()->id)->where('confirm_status',null)->sum('item_quantity');

					$response = array(
						'status' => 'success',
						'total_quantity' => $total_quantity,
					);

					return response()->json($response);
				}

				
			}
			else if($request->action == 'minus')
			{

				if(Auth::guest())
				{
					$id =  Session::get('uni_id');

					SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->decrement('item_quantity');

					if(SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->value('item_quantity') == 0)
					{
						SessionValue::where('session_id',$id)->where('item_id',$request->item_id)->delete();
					}

						$total_quantity = SessionValue::where('session_id',$id)->sum('item_quantity');

						$response = array(
			            'status' => 'unauthorized',
			            'total'	=> $total_quantity,
			          	);
			        	return response()->json($response);
				}
				else
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
		// }
	}
}
