<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function apartment(){
        return $this->hasMany('App\Models\Appartment');
    }
}
