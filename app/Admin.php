<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table ='admins';

    protected $fillable = [
        'name', 'email', 'password','phone','img','address','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function article(){
        return $this->hasMany('App\Article');
    }
    public function article_menu(){
        return $this->hasMany('App\Article_menu');
    }
    public function category(){
        return $this->hasMany('App\Category');
    }
    public function contact(){
        return $this->hasMany('App\Contact');
    }
    public function gallery(){
        return $this->hasMany('App\Gallery');
    }
    public function information(){
        return $this->hasMany('App\Information');
    }
    public function order(){
        return $this->hasMany('App\Order');
    }
    public function orderdetail(){
        return $this->hasMany('App\OrderDetail');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
    public function product_menu(){
        return $this->hasMany('App\Product_menu');
    }
    public function role(){
        return $this->belongTo('App\Role');
    }
}