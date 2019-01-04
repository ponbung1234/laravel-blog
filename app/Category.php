<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

	//set up the relationship
	public function posts()
	{

		//This category has many post
		return $this->hasMany('App\Post');

	}
}
