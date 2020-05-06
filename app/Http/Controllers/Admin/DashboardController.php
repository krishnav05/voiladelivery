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

class DashboardController extends Controller
{
    //
	public function fetch()
	{
		$orders = Orders::where('business_id',Auth::guard('admin')->user()->id)->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::where('business_id',Auth::guard('admin')->user()->id)->get();
		$itemnames = CategoryItem::where('business_id',Auth::guard('admin')->user()->id)->get();
		$count = 1;


		return view('admin.dashboard',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'count' => $count]);
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

}
