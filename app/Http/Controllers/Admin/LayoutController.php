<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayoutController extends Controller
{
    //
    /**
     * 后台首页
     */
    public function index(Request $request)
    {
    	return view('admin.layout.index');
    }
}
