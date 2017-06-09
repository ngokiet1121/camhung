<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table ='infomation';

    protected $fillable = [
        'name','phone','address','email','link','fax','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
}
