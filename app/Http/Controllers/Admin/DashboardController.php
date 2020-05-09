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
		$orders = Orders::where('business_id',Auth::guard('admin')->user()->id)->where('completed','!=','1')->get();
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

	public function settings()
	{
		return view('admin.settings');
	}

	public function past_orders()
	{	
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
		return view('admin.maindashboard');
	}

}
