<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_menu extends Model
{
    protected $table ='article_menu';

    protected $fillable = [
        'name', 'slug','parent','description','content','is_active','hot','views','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
	
	public function article(){
		return $this->hasMany('App\Article');
	}

}
