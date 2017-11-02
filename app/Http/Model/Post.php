<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'post';

	protected $dates = [
	        'created_at',
	        'updated_at'
	];
    
    public function users()
    {
        return $this->belongsTo('App\Http\Model\Users','id','id');
    }
    
    public function getUser($user_id)
    {
        $user = Users::where('id',$user_id)->first();
        
        return $user;
    }
    
    public function firstName($fullname)
    {
    	$explName = explode(" ", $fullname);
        $firsName = $explName[0];
    	
        return $firsName;
    }
}
