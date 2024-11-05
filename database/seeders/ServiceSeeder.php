<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'name' => 'Light Package',
            'description' => 'Basisreiniging van uw voertuig.',
            'price' => 99.99
        ]);

        Service::create([
            'name' => 'Light Plus',
            'description' => 'Uitgebreide basisreiniging met raamreiniging.',
            'price' => 119.99
        ]);

        Service::create([
            'name' => 'Premium Package',
            'description' => 'Basisreiniging met extra aandacht voor details en interieur deodorizing.',
            'price' => 139.99
        ]);
    }
}
