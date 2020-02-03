<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tickets(){
        return $this->hasMany("App\Ticket");
    }

    public function users(){
        return $this->hasMany("App\User");
    }

    public function sessions(){
        return $this->hasMany("App\Session");
    }
}
