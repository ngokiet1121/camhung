<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ='article';

    protected $fillable = [
        'name', 'slug', 'description','content','is_active','hot','views','article_menu_id','admin_id'
    ];
    public function admin(){
		return $this->belongTo('App\Admin');
	}
	public function article_menu(){
		return $this->belongTo('App\Article_menu');
	}
}
