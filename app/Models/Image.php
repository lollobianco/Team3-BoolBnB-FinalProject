<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function apartment(){
        return $this->hasMany('App\Models\Appartment');
    }
}
