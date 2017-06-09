<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';

    protected $fillable = [
        'name', 'slug','description','content','is_active','hot','menu_main','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
	
}
