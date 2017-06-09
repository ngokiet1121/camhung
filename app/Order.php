<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

    protected $fillable = [
        'name', 'email','content','city','district','address','phone','status','admin_id'
        ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
	public function orderdetail(){
		return $this->hasMany('App\OrderDetail');
	}
}
