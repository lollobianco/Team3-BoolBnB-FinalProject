<?php

use Illuminate\Database\Seeder;
use App\Models\Apartment;

class apartments_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_apartments = config('apartment');

        foreach($array_apartments as $element){

        $new_apartment = new Apartment;

        $new_apartment -> name = $element['name'];
        $new_apartment -> description = $element['description'];
        $new_apartment -> cover_image = $element['cover_image'];
        $new_apartment -> rooms = $element['rooms'];
        $new_apartment -> beds = $element['beds'];
        $new_apartment -> bathrooms = $element['bathrooms'];
        $new_apartment -> mq = $element['mq'];
        $new_apartment -> accomodation = $element['accomodation'];
        $new_apartment -> lat = $element['lat'];
        $new_apartment -> long = $element['long'];
        $new_apartment -> address = $element['address'];
        $new_apartment -> available = $element['available'];
        $new_apartment -> price = $element['price'];
        
        $new_apartment -> save();

        }
    }
}
