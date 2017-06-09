<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product_menu;
use App\Product;
use App\Cart;
use Session;
use App\Information;
use Validator;
use DB;
class SearchController extends Controller
{
    public function portSearch(Request $request){

    	$oldCart =Session::get('cart');
    	$cart  = new Cart($oldCart);
    	$slug = str_slug($request->search);
    	$product_item_one = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('slug',$slug)->get();

        //$pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('slug',$slug)->get()->toArray();
        $pros = DB::table('products')->where('name','like',"%$request->search%")->get();
    	$information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
    	$product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','ASC')->get()->toArray();
        //return count($pros);
    	if(count($product_item_one) == 1){
			return view('frontend.search',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','product_item_one','information'));
		}else if(count($pros) > 1){
			return view('frontend.searchlist',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','information','pros'));
        }else{
            return view('frontend.searchlist',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','information','pros'));
        }
    }
}
