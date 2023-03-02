<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $sponsors = [
        [
            'name' => 'Bronze',
            'price' => 2.99,
            'sponsor_duration' => 24
        ],
        [
            'name' => 'Silver',
            'price' => 5.99,
            'sponsor_duration' => 72
        ],
        [
            'name' => 'Gold',
            'price' => 9.99,
            'sponsor_duration' => 144
        ]
    ];

    public function run()
    {
        foreach($this->sponsors as $sponsor) { Sponsor::create($sponsor); }
        
    }
}
