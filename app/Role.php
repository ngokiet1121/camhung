<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table ='roles';

    protected $fillable = [
        'name','content'
    ];

    public function admin(){
		return $this->hasMany('App\Admin');
	}

}
