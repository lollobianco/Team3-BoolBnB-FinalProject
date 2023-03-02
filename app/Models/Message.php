<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function apartment(){
        return $this->hasMany('App\Models\Appartment');
    }

    protected $fillable = [
        'name',
        'surname',
        'text',
        'email',
        'apartment_id'
    ];
}
