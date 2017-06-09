<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Cart;
use Session;
use Mail;
use App\Order;
use App\OrderDetail;
use App\Product_menu;
use App\Information;
class ShoppingController extends Controller
{
    //
    
    public function getAddToCart(Request $request,$id){
    	$product = Product::findorFail($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);
    	$request->session()->put('cart', $cart);
        $product = Product::findorFail($id);
        $slug = $product->slug;
    	return redirect()->route('home');
    }
    public function getSubToCart($id){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->sub($id);

        if(count($cart->items) > 0){
              Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function shoppingCart(){
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','ASC')->get()->toArray();
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
    	if(!Session::has('cart')){
    		return view('frontend.shoppingcart',compact('product_menu','information'));
    	}
    	$oldCart =Session::get('cart');
    	$cart  = new Cart($oldCart);
    	return view('frontend.shoppingcart',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','information'));
    }

    public function getCheckOut(){
    	$product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','ASC')->get()->toArray();
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        if(!Session::has('cart')){
            return view('frontend.shoppingcart',compact('product_menu','information'));
        }
    	$oldCart =Session::get('cart');
    	$cart  = new Cart($oldCart);
    	return view('frontend.pay',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('product_menu','information'));
    }

    public function postCheckOut(Request $request){
    	$this->validate($request,
            [   'name' => 'required',
                'phone' => 'required|min:11|numeric',
                'email' => 'required|email',
                'address' => 'required',
                'phone' => 'required',
                'city' => 'required',
                'district' => 'required',

            ],
            [
                'email.required' => 'Bạn phải nhập email',
                'email.email' => 'Sai định dạng email',
                'name.required' => 'Bạn phải nhập Họ và tên',
                'phone.required' => 'Bạn phải nhập số điện thoại',
                'phone.min' => 'Sai định dạng số điện thoại',
                'phone.numeric' => 'Sai định dạng số điện thoại',
                'address.required' => 'Bạn phải nhập địa chỉ',
                'city.required' => 'Bạn phải nhập thành phố',
                'district.required' => 'Bạn phải nhập quận huyện',
            ]);

        if(!Session::has('cart')){
            return view('frontend.shoppingcart');
        }
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $products = $cart->items;   

        $order = new Order;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city = $request->city;
        $order->district = $request->district;
        $order->address = $request->address;
        $order->content = $request->content;
        $order->status = 1;
        $order->admin_id = 1;
        if($request->email != null && $request->address != null && $request->city != null && $request->district != null && $order->save()){
            $data = array(
              'name' => $request->name,
              'phone' => $request->phone,
              'email' => $request->email,
              'address' => $request->address,
              'content' => $request->content,
              'order_id' => $order->id,
              'totalPrice' => $cart->totalPrice,
              'information' =>Information::select('name','phone','address','email','link','fax')->get()->toArray(),
            );
            
            foreach ($products as $val) {
                $product = Product::find($val['item']['id']);
                $detail = new OrderDetail;
                if($product->quantity >= $val['quantity']){
                $detail->name = $val['item']['name'];
                $detail->quantity =$val['quantity'];
                $detail->img = $val['item']['img'];
                $detail->img_note = $val['item']['img_note'];
                $detail->price = $val['price'];
                $detail->sale = $val['item']['sale'];
                $detail->product_id = $val['item']['id'];
                $detail->admin_id = 1;
                $detail->order_id = $order->id;
                $detail->save();
                $product->quantity = $product->quantity - $val['quantity'];
                $product->save();
                }else{
                   return redirect()->route('checkout')->with(['err_message'=>"Đặt hàng không thành công"]);
                }
            }
            Mail::send('frontend.mail.emailpay',$data ,function($message) use ($data){
                $message->from('camhungstore@gmail.com','Cẩm Hưng Store');
                $message->to($data['email']);
                $message->subject('CamHung');
            });
            $request->session()->forget('cart');
            return redirect()->route('success');

        }else{
            
            return redirect()->route('checkout')->with(['err_message'=>"Đặt hàng không thành công"]);

        }
    }
    public function success(){
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','ASC')->get()->toArray();
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        return view('frontend.success',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('information','product_menu'));
    } 

/*    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }*/


}
