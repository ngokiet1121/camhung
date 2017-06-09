<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='contacts';

    protected $fillable = [
        'name', 'address','email','phone','content','is_active','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
}
