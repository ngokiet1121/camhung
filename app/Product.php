<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';

    protected $fillable = [
        'name','slug','img','img_note','description','content','quantity','price','sale','is_active','hot','views','product_menu_id','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
	public function product_menu(){
		return $this->belongTo('App\Product_menu');
	}
}
