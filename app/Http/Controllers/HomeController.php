<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Product_menu;
use App\Product;
use App\Cart;
use Session;
use App\Information;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->get()->toArray();
        $pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('hot','=',1)->orderBy('id','DESC')->paginate(9);
        $pros2 = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('sale','>',0)->orderBy('id','DESC')->paginate(6);
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        return view('frontend.index',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','pros','information','pros2'));
    }

    public function product($slug){
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->get()->toArray();
        $pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->paginate(8);
        $pros2 = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('sale','>',0)->orderBy('id','DESC')->paginate(6);
        $product_menu_one = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('slug',$slug)->get();
        $name = null;
        $id = 0;
        $parent = 0;
        foreach ($product_menu_one as $value) {
            $name = $value['name'];
            $id = $value['id'];
            $parent = $value['parent'];
        }
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        return view('frontend.listproduct',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','pros','id','name','parent','information','slug'));
    }
    public function productDetail($slug){
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->get()->toArray();
        $pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->paginate(9);
        $pros2 = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('sale','>',0)->orderBy('id','DESC')->paginate(6);
        $product_item_one = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('slug',$slug)->get();
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        return view('frontend.product',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','pros','product_item_one','information','slug'));
    }

    public function productHot(){
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->get()->toArray();
        $pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->paginate(9);

        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        $pros_hot = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('hot','=',1)->orderBy('id','DESC')->paginate(12);
        return view('frontend.listproducthot',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','pros','information','slug','pros_hot'));
    }

    public function productSale(){
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->get()->toArray();
        $pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->paginate(9);
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        $pros_sale = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('sale','>',0)->orderBy('id','DESC')->paginate(12);
        return view('frontend.listproductsale',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','pros','information','slug','pros_sale'));
    }

    public function contact()
    {   
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->get()->toArray();
        $pros = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('is_active','=',1)->orderBy('id','DESC')->paginate(8);
        $pros2 = Product::select('id','name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id')->where('sale','>',0)->orderBy('id','DESC')->paginate(6);
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        return view('frontend.back',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','pros','information','pros2'));
    }

}
