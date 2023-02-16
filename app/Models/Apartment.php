<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // Relazione con User
    public function user(){
        return $this->hasMany('App\User');
    }

    public function messages(){
        return $this->belongsTo('App\Models\Message');
    }

    public function images(){
        return $this->belongsTo('App\Models\Image');
    }

    public function views(){
        return $this->belongsTo('App\Models\View');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }
}
