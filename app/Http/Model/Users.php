<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = 'users';

    public function post()
    {
        return $this->hasMany('App\Http\Model\Post','user_id','id');
    }
}
