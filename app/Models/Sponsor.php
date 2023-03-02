<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{

    protected $table = 'sponsors';

        protected $fillable = [
            'name',
            'price',
            'sponsor_duration'
        ];

    public function apartments(){

        return $this->belongsToMany('App\Models\Apartment');
    }
}
