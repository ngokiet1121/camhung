<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_menu extends Model
{
    protected $table ='product_menu';

    protected $fillable = [
        'name','slug','content','parent','is_active','hot','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
	public function product(){
		return $this->hasMany('App\Product');
	}
}
