<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function actions(){

    	return $this->hasMany(Action::class);
    }
}
