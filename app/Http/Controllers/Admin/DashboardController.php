<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kitchen;
use App\User;
use App\UserAddress;
use App\Orders;
use Auth;
use Bitfumes\Multiauth\Model\Admin;
use App\CategoryItem;
use App\TimeSlots;

class DashboardController extends Controller
{
    //
	public function fetch()
	{	
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}

		$orders = Orders::where('business_id',Auth::guard('admin')->user()->id)->where('completed',null)->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::where('business_id',Auth::guard('admin')->user()->id)->get();
		$itemnames = CategoryItem::where('business_id',Auth::guard('admin')->user()->id)->get();
		$timeslot = TimeSlots::where('business_id',Auth::guard('admin')->user()->id)->get();


		return view('admin.dashboard',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot]);
	}

	public function update($id,$status)
	{
		if($status == 'accept')
		{
			Orders::where('id',$id)->update(['order_status' => 'Accepted']);
		}
		else if($status == 'preparing')
		{
			Orders::where('id',$id)->update(['order_status' => 'Preparing']);
		}
		else if($status == 'out-deliv')
		{
			Orders::where('id',$id)->update(['order_status' => 'Out For Delivery']);
		}
		else if($status == 'delivered')
		{
			Orders::where('id',$id)->update(['order_status' => 'Delivered','completed' => 1]);
		}

		return redirect()->back();
	}

	public function profile()
	{
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}
		return view('admin.profile');
	}

	public function past_orders()
	{	
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}

		$orders = Orders::where('business_id',Auth::guard('admin')->user()->id)->where('completed','1')->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::where('business_id',Auth::guard('admin')->user()->id)->get();
		$itemnames = CategoryItem::where('business_id',Auth::guard('admin')->user()->id)->get();
		$timeslot = TimeSlots::where('business_id',Auth::guard('admin')->user()->id)->get();

		return view('admin.past_orders',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot]);
	}

	public function maindashboard()
	{	
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}

		return view('admin.maindashboard');
	}

	public function settings()
	{	
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}
		
		$tax = Auth::guard('admin')->user()->tax_applicable;
		return view('admin.settings',['tax'=>$tax]);
	}

	public function update_settings(Request $request)
	{	
		Auth::guard('admin')->user()->update(['tax_applicable' => $request->tax]);

		$tax = Auth::guard('admin')->user()->tax_applicable;
		return view('admin.settings',['tax'=>$tax]);
	}

}
