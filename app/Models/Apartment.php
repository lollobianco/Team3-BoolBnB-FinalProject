<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // Relazione con User
    public function user(){
        return $this->hasMany('App\User');
    }
}
