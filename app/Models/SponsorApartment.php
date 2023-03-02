<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorApartment extends Model
{
    protected $fillable = [
        'apartment_id',
        'sponsor_id',
        'sponsor_duration',
    ];
}
