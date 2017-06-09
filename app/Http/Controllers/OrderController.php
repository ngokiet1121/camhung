<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Http\Requests;
use App\Order;
use App\OrderDetail;
use Auth;
class OrderController extends Controller
{
    public function getList(){
    	$allOrders = Order::select('id','name','email','content','address','phone','status','admin_id','created_at')->orderBy('created_at','DESC')->get()->toArray();
    	$lastestOrders = Order::select('id','name','email','content','address','phone','status','admin_id','created_at')->where('status',1)->orderBy('created_at','DESC')->get()->toArray();
    	$confirmedOrders = Order::select('id','name','email','content','address','phone','status','admin_id','created_at')->where('status',2)->orderBy('created_at','DESC')->get()->toArray();
    	$deliveredOrders = Order::select('id','name','email','content','address','phone','status','admin_id','created_at')->where('status',3)->orderBy('created_at','DESC')->get()->toArray();
    	$canceledOrders = Order::select('id','name','email','content','address','phone','status','admin_id','created_at')->where('status',4)->orderBy('created_at','DESC')->get()->toArray();
		return view('admin.order.list',compact('allOrders','lastestOrders','confirmedOrders','deliveredOrders','canceledOrders'));
	}
	public function getListdetail($id){
		$orderdetail = OrderDetail::select('id','name','quantity','img','img_note','price','sale','order_id','admin_id')->where('order_id','=',$id)->orderBy('id','ASC')->get()->toArray();
		return view('admin.order.listdetail',compact('orderdetail'));
	}
 	public function getEdit($id){
    	$data = Order::findorFail($id);
		return view('admin.order.edit',compact('data'));
	}
	public function postEdit(Request $request,$id){
		$orderdetail = DB::table('orderdetail')->where('order_id',$id)->get();
		//$msg = "";

		$order = Order::findorFail($id);
		if($order->status == 4){
			foreach ($orderdetail as $val) {
				$product = Product::findorFail($val->product_id);
				$product->quantity = $product->quantity - $val->quantity;
				$product->save();
			}
		}
		$order->status = $request->status;
		$staff = Auth::guard('admin')->id();
		$order->admin_id = $staff;
		if($request->status == 4){
			foreach ($orderdetail as $val) {
				$product = Product::findorFail($val->product_id);
				$product->quantity = $product->quantity + $val->quantity;
				$product->save();
			}
		}
		$order->save();
		//return $msg;
		return redirect()->route('admin.order.getList')->with(['flash_message'=>'Thay đổi thành công']);
	}
}
