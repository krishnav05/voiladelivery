<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bitfumes\Multiauth\Model\Admin;
use Auth;
use App\Category;
use App\CategoryItem;

class MenuController extends Controller
{
    //
    public function index()
    {
    	$category = Category::where('business_id',Auth::guard('admin')->user()->id)->get();
    	$category_items = CategoryItem::where('business_id',Auth::guard('admin')->user()->id)->get();

    	return view('admin.menu_upload',['category' => $category,'category_items' => $category_items]);
    }

    public function delete(Request $request)
    {
    	if($request->action == 'category')
    	{
    		Category::where('id',$request->id)->delete();

    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);	
    	}

    	if($request->action == 'category-item')
    	{
    		CategoryItem::where('id',$request->id)->delete();

    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);	
    	}

    }

    public function add(Request $request)
    {	

    	if($request->action == 'category')
    	{
	    	$value = null;
	    	if($request->option == 'yes')
	    	{
	    		$value = 1;
	    	}
	    	$new = new Category;
	    	$new->category_id = $request->id;
	    	$new->category_name = $request->name;
	    	$new->image = null;
	    	$new->is_pure_veg = $value;
	    	$new->business_id = Auth::guard('admin')->user()->id;
	    	$new->save();

	    	$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);	
    	}

    	if($request->action == 'category-item')
    	{
    		$new = new CategoryItem;
    		$new->item_id = $request->id;
    		$new->category_id = $request->itemcategory;
    		$new->item_name = $request->name;
    		$new->item_price = $request->price;
    		$new->item_vegetarian = $request->itemoption;
    		$new->business_id = Auth::guard('admin')->user()->id;
    		$new->save();

    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);
    	}
    	
    }

    public function edit(Request $request)
    {
    	if($request->action == 'category')
    	{


    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);
    	}
    	if($request->action == 'category-item')
    	{
    		
    		
    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);
    	}
    }
}
