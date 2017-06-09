<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Product_menu;
use Auth;
class ProductController extends Controller
{

    public function getListmenu(){
    	$product_menu = Product_menu::select()->orderBy('id','ASC')->get()->toArray();
		return view('admin.product.listmenu',compact('product_menu'));
	} 

	public function getAddmenu(){
		$product_menu = Product_menu::select('id','name','parent','is_active','hot')->orderBy('id','ASC')->get()->toArray();
		return view('admin.product.addmenu',compact('product_menu'));
	} 

	public function postAddmenu(Request $request){		

		$product_menu = new Product_menu;
		$product_menu->name = $request->name;
		$product_menu->slug = str_slug($request->name);
		$product_menu->content = $request->content;
		$product_menu->parent = $request->parent;
		$product_menu->is_active = $request->is_active;
		$product_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$product_menu->admin_id = $staff;	
		$product_menu->save();
		return redirect()->route('admin.product.getAddmenu')->with(['flash_message'=>'Thêm danh mục thành công']);	
	} 

	public function getNull()
	{
		
		return view('admin.nullpage');
		
	}

	public function getEditmenu($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Product_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Product_menu::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					return view('admin.product.editmenu',compact('data','id'));
				}
			}
			else{
				return view('admin.product.editmenu',compact('data','id'));
			}
		}
		
	}

	public function postEditmenu(Request $request,$id)
	{
		$product_menu = Product_menu::findorFail($id);
		$product_menu->name = $request->name;
		$product_menu->slug = str_slug($request->name);
		$product_menu->content = $request->content;
		$product_menu->parent = $request->parent;
		$product_menu->is_active = $request->is_active;
		$product_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$product_menu->admin_id = $staff;			
		$product_menu->save();
		return redirect()->route('admin.product.getListmenu')->with(['flash_message'=>'Thay đổi thành công']);	
	}


	public function getDeletemenu($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Product_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Product_menu::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					$data->delete($id);
					return redirect()->route('admin.product.getListmenu')->with(['flash_message'=>'Xóa thành công']);
				}
			}
			else{
				$data->delete($id);
				return redirect()->route('admin.product.getListmenu')->with(['flash_message'=>'Xóa thành công']);
			}
		}
		
	}

	public function getListmenusm($id){
    	$product_menusm = Product_menu::select()->where('parent',$id)->orderBy('id','ASC')->get()->toArray();
		return view('admin.product.listmenusm',compact('product_menusm'));
	}

	public function getDeletemenusm($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Product_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Product_menu::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					$data->delete($id);
					return redirect()->route('admin.product.getListmenusm',$item['parent'])->with(['flash_message'=>'Xóa thành công']);
				}
			}
			else{
				$data->delete($id);
				return redirect()->route('admin.product.getListmenusm',$item['parent'])->with(['flash_message'=>'Xóa thành công']);
			}
		}
		
	}

	public function getEditmenusm($id)
	{

		$admin = Auth::guard('admin')->user();
		$item = Product_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Product_menu::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					return view('admin.product.editmenu',compact('data','id'));
				}
			}
			else{
				return view('admin.product.editmenu',compact('data','id'));
			}
		}
		
	}

	public function postEditmenusm(Request $request,$id)
	{
		$product_menu = Product_menu::findorFail($id);
		$product_menu->name = $request->name;
		$product_menu->slug = str_slug($request->name);
		$product_menu->content = $request->content;
		$product_menu->parent = $request->parent;
		$product_menu->is_active = $request->is_active;
		$product_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$product_menu->admin_id = $staff;		
		$product_menu->save();
		return redirect()->route('admin.product.getListmenusm',$request->parent)->with(['flash_message'=>'Thay đổi thành công']);	
	}


	public function getAddmenusm(){
		$product_menu = Product_menu::select('id','name','parent','is_active','hot')->orderBy('id','ASC')->get()->toArray();
		return view('admin.product.addmenu',compact('product_menu'));
	} 

	public function postAddmenusm(Request $request){
		
		$product_menu = new Product_menu;
		$product_menu->name = $request->name;
		$product_menu->slug = str_slug($request->name);
		$product_menu->content = $request->content;
		$product_menu->parent = $request->parent;
		$product_menu->is_active = $request->is_active;
		$product_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$product_menu->admin_id = $staff;			
		$product_menu->save();
		return redirect()->route('admin.product.getAddmenu')->with(['flash_message'=>'Thêm sản phẩm thành công']);	
	} 


	public function getListproduct(){
    	$product = Product::select()->orderBy('id','ASC')->get()->toArray();
		return view('admin.product.listproduct',compact('product'));
	}


	public function getAddproduct(){
    	$product_menu = Product_menu::select('id','name','parent','is_active','hot')->orderBy('id','ASC')->get()->toArray();
		return view('admin.product.addproduct',compact('product_menu'));
	}

	public function postAddproduct(Request $request)
	{
		$product = new Product;
		$now = time();
		$product->name = $request->name;
		$product->slug = str_slug($request->name);
		$product->product_menu_id = $request->product_menu_id;
		$product->description = $request->description;
		$product->content = $request->content;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->sale = $request->sale;
		$product->is_active = $request->is_active;
		$product->hot = $request->hot;
		$product->img_note = $request->name;


		if ($request->hasFile('fuImage')) {				
			$files = $request->file('fuImage');
			$arr='';
		    foreach($files as $file){
		        $filename = $file->getClientOriginalName();
		        $picture = "$now$filename";
		        $destinationPath = base_path() . '/uploads/images/';
		        $file->move($destinationPath, $picture);
		        $arr = "$picture|$arr"; //chuỗi tên ảnh ngăn cách bằng dấu |
		    }
		    $imgs = substr($arr, 0, -1); //cắt kí tự / cuối chuỗi //
			
			$product->img = $imgs; // cắt xong lưu csdl
		}
		$staff = Auth::guard('admin')->id();
		$product->admin_id = $staff;			
		$product->save();
		return redirect()->route('admin.product.getListproduct')->with(['flash_message'=>'Thêm thành công']);	
	}

	public function getEditproduct($id){
		$admin = Auth::guard('admin')->user();
		$item = Product::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
    		$data = Product::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					return view('admin.product.editproduct',compact('data','id'));
				}
			}
			else{
				return view('admin.product.editproduct',compact('data','id'));
			}
		}
		
	}

	public function postEditproduct(Request $request,$id)
	{
		$product = Product::findorFail($id);
		$now = time();
		$product->name = $request->name;
		$product->slug = str_slug($request->name);
		$product->product_menu_id = $request->product_menu_id;
		$product->description = $request->description;
		$product->content = $request->content;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->sale = $request->sale;
		$product->is_active = $request->is_active;
		$product->hot = $request->hot;
		$product->img_note = $request->name;

		if ($request->hasFile('fuImage')) {				
			$files = $request->file('fuImage');
			$arr='';
		    foreach($files as $file){
		        $filename = $file->getClientOriginalName();
		        $picture = "$now$filename";
		        $destinationPath = base_path() . '/uploads/images/';
		        $file->move($destinationPath, $picture);
		        $arr = "$picture|$arr"; //chuỗi tên ảnh ngăn cách bằng dấu |
		    }
		    $imgs = substr($arr, 0, -1); //cắt kí tự / cuối chuỗi //
			
			$product->img = $imgs; // cắt xong lưu csdl
		}
		$staff = Auth::guard('admin')->id();
		$product->admin_id = $staff;		
		$product->save();
		return redirect()->route('admin.product.getListproduct')->with(['flash_message'=>'Thêm thành công']);	
	}


	public function getDeleteproduct($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Product::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Product::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					$data->delete($id);
					return redirect()->route('admin.product.getListproduct')->with(['flash_message'=>'Xóa thành công']);
				}
			}
			else{
				$data->delete($id);
				return redirect()->route('admin.product.getListproduct')->with(['flash_message'=>'Xóa thành công']);
			}
		}
	}
}
