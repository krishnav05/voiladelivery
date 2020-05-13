<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bitfumes\Multiauth\Model\Admin;

class MenuController extends Controller
{
    //
    public function index()
    {
    	return view('admin.menu_upload');
    }
}
