<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded=['id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->morphMany('App\Models\Comment','post');
    }
}
