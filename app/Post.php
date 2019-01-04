<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

	public function category()
	{

		//This line tell the relationship (1 post can have only one category)
		return $this->belongsTo('App\category');

	}
}
