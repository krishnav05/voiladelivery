<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Bitfumes\Multiauth\Model\Admin;
use App\Orders;
use App\Kitchen;
use App\CategoryItem;

class AnalyticsController extends Controller
{
    //
	public function index()
	{	
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}

    	$total_orders = Orders::where('business_id',Auth::guard('admin')->user()->id)->count();
    	$total_revenue = Orders::where('business_id',Auth::guard('admin')->user()->id)->sum('amount');
    	$total_revenue /= 100;

    	$analytics = Kitchen::where('business_id',Auth::guard('admin')->user()->id)->groupBy('item_id')->selectRaw('sum(item_quantity) as sum,item_id')->orderBy('sum','DESC')->take(5)->get('sum','item_id');

    	$category_items = CategoryItem::all();
    	$count = 1;
		return view('admin.analytics',['total_orders'=>$total_orders,'total_revenue'=>$total_revenue,'analytics'=>$analytics,'category_items'=>$category_items,'count'=>$count]);
	}

}
