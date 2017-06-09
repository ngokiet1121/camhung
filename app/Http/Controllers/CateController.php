<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CateController extends Controller
{
    public function getList(){
    	$cates = Category::select('id','name', 'slug','description','content','is_active','hot','menu_main','admin_id')->orderBy('id','ASC')->get()->toArray();
		return view('admin.cate.list',compact($cates));
	} 

}
