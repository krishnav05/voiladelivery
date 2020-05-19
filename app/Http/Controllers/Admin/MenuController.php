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
        $check = Auth::guard('admin')->user()->license_id;
        if($check == null)
        {
            return redirect()->route('license');
        }
        
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
            $new->item_description = $request->description;
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
            $change = null;
            if($request->value == 'yes')
            {
                $change = 1;
            }
            Category::where('category_id',$request->id)->update(['category_name'=>$request->name,'is_pure_veg'=>$change]);

    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);
    	}
    	if($request->action == 'category-item')
    	{
    		CategoryItem::where('item_id',$request->id)->update(['item_id'=>$request->id,'category_id'=>$request->cat_id,'item_name'=>$request->name,'item_price'=>$request->price,'item_vegetarian'=>$request->veg,'item_description'=>$request->description]);
    		
    		$response = array(
	                    'status' => 'success',
	                );

	        return response()->json($response);
    	}
    }
}
