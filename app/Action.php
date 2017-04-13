<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
	protected $guarded = [];
    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function actions(){
    	return $this->belongsTo(User::class);
    }
}

