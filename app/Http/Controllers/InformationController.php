<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Information;
use Auth;
class InformationController extends Controller
{
    public function getEdit(){
        $admin = Auth::guard('admin')->user();           
        $data = Information::findorFail(1);
        if($admin['role_id'] != 1)
        {
            return view('admin.limit');
        }
        else
        {
            return view('admin.information.edit',compact('data'));
        }
            
    	
    }

    public function postEdit(Request $request){
    	$information = Information::findorFail(1);
    	$information->name = $request->name;
    	$information->phone = $request->phone;
    	$information->address = $request->address;
    	$information->email = $request->email;
    	$information->link = $request->link;
    	$information->fax = $request->fax;
    	$information->save();
    	return redirect()->route('admin.information.getEdit')->with(['flash_message'=>'Cập nhập thông tin thành công']);	
    }
}
