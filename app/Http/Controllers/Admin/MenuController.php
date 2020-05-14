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
}
