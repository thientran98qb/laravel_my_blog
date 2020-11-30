<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=['id'];
    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }
}
