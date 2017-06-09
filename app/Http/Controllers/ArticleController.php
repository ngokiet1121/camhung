<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Article_menu;
use Auth;
class ArticleController extends Controller
{
    public function getListmenu(){
    	$article_menu = Article_menu::select()->orderBy('id','ASC')->get()->toArray();
		return view('admin.article.listmenu',compact('article_menu'));
	} 

	public function getAddmenu(){
		$article_menu = Article_menu::select('id','name', 'slug','parent','description','content','is_active','hot')->orderBy('id','ASC')->get()->toArray();
		return view('admin.article.addmenu',compact('article_menu'));
	} 

	public function postAddmenu(Request $request){
		
		$article_menu = new Article_menu;
		$article_menu->name = $request->name;
		$article_menu->slug = str_slug($request->name);
		$article_menu->content = $request->content;
		$article_menu->parent = $request->parent;
		$article_menu->is_active = $request->is_active;
		$article_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$article_menu->admin_id = $staff;		
		$article_menu->save();
		return redirect()->route('admin.article.getAddmenu')->with(['flash_message'=>'Thêm tin tức thành công']);	
	} 


	public function getEditmenu($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Article_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Article_menu::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					return view('admin.article.editmenu',compact('data','id'));
				}
			}
			else{
				return view('admin.article.editmenu',compact('data','id'));
			}
		}
		
		
	}

	public function postEditmenu(Request $request,$id)
	{
		$article_menu = Article_menu::findorFail($id);
		$article_menu->name = $request->name;
		$article_menu->slug = str_slug($request->name);
		$article_menu->content = $request->content;
		$article_menu->parent = $request->parent;
		$article_menu->is_active = $request->is_active;
		$article_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$article_menu->admin_id = $staff;	
		$article_menu->save();
		return redirect()->route('admin.article.getListmenu')->with(['flash_message'=>'Thay đổi thành công']);	
	}

//
	public function getDeletemenu($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Article_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Article_menu::findorFail($id);;
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					$data->delete($id);
					return redirect()->route('admin.article.getListmenu')->with(['flash_message'=>'Xóa thành công']);
				}
			}
			else{
				$data->delete($id);				
				return redirect()->route('admin.article.getListmenu')->with(['flash_message'=>'Xóa thành công']);
			}
		}
	}

	public function getListmenusm($id){
    	$article_menusm = article_menu::select()->where('parent',$id)->orderBy('id','ASC')->get()->toArray();
		return view('admin.article.listmenusm',compact('article_menusm'));
	}

	public function getDeletemenusm($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Article_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Article_menu::findorFail($id);;
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					$data->delete($id);
					return redirect()->route('admin.article.getListmenusm',$article_menu['parent'])->with(['flash_message'=>'Xóa thành công']);
				}
			}
			else{
				$data->delete($id);
				return redirect()->route('admin.article.getListmenusm',$article_menu['parent'])->with(['flash_message'=>'Xóa thành công']);
			}
		}
	}

	public function getEditmenusm($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Article_menu::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Article_menu::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					return view('admin.article.editmenu',compact('data','id'));
				}
			}
			else{
				return view('admin.article.editmenu',compact('data','id'));
			}
		}
	}

	public function postEditmenusm(Request $request,$id)
	{
		$article_menu = Article_menu::findorFail($id);
		$article_menu->name = $request->name;
		$article_menu->slug = str_slug($request->name);
		$article_menu->content = $request->content;
		$article_menu->parent = $request->parent;
		$article_menu->is_active = $request->is_active;
		$article_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$article_menu->admin_id = $staff;		
		$article_menu->save();
		return redirect()->route('admin.article.getListmenusm',$request->parent)->with(['flash_message'=>'Thay đổi thành công']);	
	}


	public function getAddmenusm(){
		$article_menu = Article_menu::select('id','name', 'slug','parent','description','content','is_active','hot')->orderBy('id','ASC')->get()->toArray();
		return view('admin.article.addmenu',compact('article_menu'));
	} 

	public function postAddmenusm(Request $request){
		
		$article_menu = new article_menu;
		$article_menu->name = $request->name;
		$article_menu->slug = str_slug($request->name);
		$article_menu->content = $request->content;
		$article_menu->parent = $request->parent;
		$article_menu->is_active = $request->is_active;
		$article_menu->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$article_menu->admin_id = $staff;	
		$article_menu->save();
		return redirect()->route('admin.article.getAddmenu')->with(['flash_message'=>'Thêm tin tức thành công']);	
	} 

	public function getListarticle(){
    	$article = Article::select()->orderBy('id','ASC')->get()->toArray();
		return view('admin.article.listarticle',compact('article'));
	}

	public function getAddarticle(){
    	$article_menu = Article_menu::select('id','name','parent','is_active','hot')->orderBy('id','ASC')->get()->toArray();
		return view('admin.article.addarticle',compact('article_menu'));
	}

	public function postAddarticle(Request $request)
	{
		$article = new Article;
		$now = time();
		$article->name = $request->name;
		$article->slug = str_slug($request->name);
		$article->article_menu_id = $request->article_menu_id;
		$article->description = $request->description;
		$article->content = $request->content;
		$article->is_active = $request->is_active;
		$article->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$article->admin_id = $staff;
		$article->save();
		return redirect()->route('admin.article.getListarticle')->with(['flash_message'=>'Thêm thành công']);	
	}

	public function getEditarticle($id){
		$admin = Auth::guard('admin')->user();
		$item = Article::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Article::findorFail($id);
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					return view('admin.article.editarticle',compact('data','id'));
				}
			}
			else{
				return view('admin.article.editarticle',compact('data','id'));
			}
		}		
	}

	public function postEditarticle(Request $request,$id)
	{
		$article = Article::findorFail($id);
		$now = time();
		$article->name = $request->name;
		$article->slug = str_slug($request->name);
		$article->article_menu_id = $request->article_menu_id;
		$article->description = $request->description;
		$article->content = $request->content;
		$article->is_active = $request->is_active;
		$article->hot = $request->hot;
		$staff = Auth::guard('admin')->id();
		$article->admin_id = $staff;	
		$article->save();
		return redirect()->route('admin.article.getListarticle')->with(['flash_message'=>'Thêm thành công']);	
	}


	public function getDeletearticle($id)
	{
		$admin = Auth::guard('admin')->user();
		$item = Article::select()->where('id',$id)->get()->first();
		if($item == null){
			return view('admin.nullpage');
		}
		else{				
			$data = Article::findorFail($id);;
			if($admin['id'] != $data['admin_id']){
				if($admin['role_id'] != 1)
				{
					return view('admin.limit');
				}
				else
				{
					$data->delete($id);
					return redirect()->route('admin.article.getListarticle')->with(['flash_message'=>'Xóa thành công']);
				}
			}
			else{
				$data->delete($id);
				return redirect()->route('admin.article.getListarticle')->with(['flash_message'=>'Xóa thành công']);
			}
		}
	}
}
