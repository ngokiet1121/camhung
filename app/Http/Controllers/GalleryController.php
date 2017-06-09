<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gallery;
use Auth;
class GalleryController extends Controller
{
     public function getList(){
     	$galleries = Gallery::select('id','name','parent','content','is_active','img','img_note')->orderBy('id','ASC')->get()->toArray();
		return view('admin.gallery.list',compact('galleries'));
	} 

	public function getAdd(){
		return view('admin.gallery.add');
	}

	public function postAdd(Request $request){
		$gallery = new Gallery;
		$now = time();
		$gallery->name = $request->name;
		$gallery->parent = $request->parent;
		$gallery->content = $request->content;
		$gallery->is_active = $request->is_active;
		$file_name = ($request->file('fuImage')->getClientOriginalName());
		$name = "$now$file_name";
		$request->file('fuImage')->move("uploads/images/",$name);
		$gallery->img = "uploads/images/$name";                
		$gallery->img_note = $name;
		$staff = Auth::guard('admin')->id();
		$gallery->admin_id = $staff;
			
		$gallery->save();
		return redirect()->route('admin.gallery.getList')->with(['flash_message'=>'Thêm thành công']);
	}

	public function getEdit($id){
		$data = Gallery::findorFail($id);
		return view('admin.gallery.edit',compact('data','id'));
	}

	public function postEdit(Request $request,$id){
		$gallery = Gallery::findorFail($id);
		$now = time();
		$gallery->name = $request->name;
		$gallery->parent = $request->parent;
		$gallery->content = $request->content;
		$gallery->is_active = $request->is_active;
		if ($request->hasFile('fuImage')){
			$file_name = ($request->file('fuImage')->getClientOriginalName());
			$name = "$now$file_name";
			$request->file('fuImage')->move("uploads/images/",$name);
			$gallery->img = "uploads/images/$name";
		        $gallery->img_note = $name;
		}
		$staff = Auth::guard('admin')->id();
		$gallery->admin_id = $staff;
		$gallery->save();
		return redirect()->route('admin.gallery.getList')->with(['flash_message'=>'Cập nhập ảnh thành công']);
	}

	public function getDelete($id){
		$gallery = Gallery::findorFail($id);
		$gallery->delete($id);
		return redirect()->route('admin.gallery.getList')->with(['flash_message'=>'Xóa thành công']);
	}
}
