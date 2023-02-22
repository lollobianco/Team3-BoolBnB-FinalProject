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
        $services = [
            [
                'name' => 'Wi-Fi',
                'icon' => 'fa-solid fa-wifi'
            ],
            [
                'name' => 'Lavatrice',
                'icon' => 'fa-solid fa-soap'
            ],
            [
                'name' => 'Cucina',
                'icon' => 'fa-solid fa-kitchen-set'
            ],
            [
                'name' => 'Parcheggio',
                'icon' => 'fa-solid fa-car'
            ],
            [
                'name' => 'Tv',
                'icon' => 'fa-solid fa-tv'
            ],
            [
                'name' => 'Climatizzatore',
                'icon' => 'fa-solid fa-fan'
            ],
            [
                'name' => 'Piscina',
                'icon' => 'fa-solid fa-person-swimming'
            ],
            [
                'name' => 'Vista Mare',
                'icon' => 'fa-solid fa-water'
            ]
        ];



        foreach ($services as $element) {

            $new_service = new Service;
            $new_service->name = $element['name'];
            $new_service->icon = $element['icon'];
            $new_service->save();
        }
    }
}
