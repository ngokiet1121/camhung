<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use App\Product;
use App\Cart;
use Session;
use Mail;
use App\Order;
use App\OrderDetail;
use App\Product_menu;
use App\Information;
class ContactController extends Controller
{
    //
    public function getList(){
    	$contacts = Contact::select('id','name','address','email','phone','content','is_active')->orderBy('id','ASC')->get()->toArray();
		return view('admin.contact.list',compact('contacts'));
	}

	public function postContact(Request $request){
		$this->validate($request,
            [   'name' => 'required',
                'phone' => 'required|min:11|numeric',
                'email' => 'required|email',
                'address' => 'required',
                'phone' => 'required',

            ],
            [
                'email.required' => 'Bạn phải nhập email',
                'email.email' => 'Sai định dạng email',
                'name.required' => 'Bạn phải nhập Họ và tên',
                'phone.required' => 'Bạn phải nhập số điện thoại',
                'phone.min' => 'Sai định dạng số điện thoại',
                'phone.numeric' => 'Sai định dạng số điện thoại',
                'address.required' => 'Bạn phải nhập địa chỉ',
            ]);
		$contact = new Contact;
		$contact->name = $request->name;
		$contact->address = $request->address;
		$contact->email = $request->email;
		$contact->phone = $request->phone;
		$contact->content = $request->content;
		$contact->is_active = 1;
		$contact->admin_id = 1;
		$contact->save();
		return redirect()->route('success_contact');
	}
	public function success_contact(){
        $oldCart =Session::get('cart');
        $cart  = new Cart($oldCart);
        $product_menu = Product_menu::select('id','name','slug','content','parent','is_active','hot','admin_id')->where('is_active','=',1)->orderBy('id','ASC')->get()->toArray();
        $information = Information::select('name','phone','address','email','link','fax')->get()->toArray();
        return view('frontend.success_contact',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],compact('information','product_menu'));
    } 

}
