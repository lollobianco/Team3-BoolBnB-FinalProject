<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wi-Fi', 'Lavatrice', 'Cucina', 'Parcheggio', 'Tv', 'Climatizzatore', 'Piscina', 'Vista mare'];

        foreach ($services as $element) {

            $new_service = new Service;
            $new_service->name = $element['name'];
            $new_service->save();

        }
    }
}