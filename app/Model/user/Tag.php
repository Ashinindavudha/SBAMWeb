<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = ['id'];
    public function posts()
    {
    	//return $this->belongsToMany('App\Model\user\Post', 'post_tags');
    	return $this->belongsToMany('App\Model\user\Post')->withTimestamps();

    }
}
