<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table ='orderdetail';

    protected $fillable = [
        'name','quantity','img','img_note','price','sale','product_id','order_id','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
	public function order(){
		return $this->belongTo('App\Order');
	}
}
