<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table ='galleries';

    protected $fillable = [
        'name', 'parent','parent','content','is_active','img','img_note','admin_id'
    ];


    public function admin(){
		return $this->belongTo('App\Admin');
	}
}
