<?php

namespace Database\Seeders;

use App\Models\ServiceFee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = [
            [
                'name' => 'Application managing service',
                'note' => 'The fee is to pay the landlord’s cost of running a background check on a prospective tenant. Application fees are paid at the time of application and are generally nonrefundable',
                'price' => 50,
                'user_id' => 3
            ],
            [
                'name' => 'Pet fees',
                'note' => 'Because animals have the potential to cause damage, however, it’s also wise to plan ahead if you decide to allow pets in your rental. Charging a pet fee.',
                'price' => 20,
                'user_id' => 3
            ],
            [
                'name' => 'Pet violation',
                'note' => 'While both pet rent and pet deposits may be used to pay for damage caused by pets, it’s important to note that they are separate and handled differently in a rental agreement.',
                'price' => 100,
                'user_id' => 3
            ],
            [
                'name' => 'Pet inspection service',
                'note' => 'the landlord gives the tenant permission to live in the rental with a pet if they agree to be responsible for the pet and any potential pet-related damages.',
                'price' => 20,
                'user_id' => 3
            ],
            [
                'name' => 'Moving service',
                'note' => 'Weekend moving could resutl to extra charges.',
                'price' => 30,
                'user_id' => 3
            ],
            [
                'name' => 'Missed maintenance appointment',
                'note' => 'Missing appointment of maintemance could result to extra charges.',
                'price' => 30,
                'user_id' => 3
            ],
            [
                'name' => 'Appliance rental (washer and dryer)',
                'note' => 'Appliance Warehouse of America is North America\'s leading washer and dryer rental company.',
                'price' => 250,
                'user_id' => 3
            ],
            [
                'name' => 'Emergancy services',
                'note' => 'Calling tenants for emergancy could result to extra charges.',
                'price' => 3,
                'user_id' => 3
            ],
            [
                'name' => 'convinaince fees for online payment',
                'note' => 'Easy payment online could result to extra charges.',
                'price' => 25,
                'user_id' => 3
            ],
            [
                'name' => 'storage space fees',
                'note' => 'each storage available for tanent',
                'price' => 550,
                'user_id' => 3
            ],
            [
                'name' => 'Parking spot',
                'note' => 'Parking garage available for tanent',
                'price' => 50,
                'user_id' => 3
            ],
            [
                'name' => 'Cleaning fees if it\'s not clean',
                'note' => 'Cleaning fees if it\'s not clean',
                'price' => 150,
                'user_id' => 3
            ],
            [
                'name' => 'hold over time after leasing ends fees',
                'note' => 'holding the apartment after the lease is over could result into large charging expense.',
                'price' => 1050,
                'user_id' => 3
            ],
            [
                'name' => 'Pinalty',
                'note' => 'Pinalty for a violation of the rules.',
                'price' => 1050,
                'user_id' => 3
            ]
        ];

        foreach ($fees as $fee) {
            ServiceFee::create($fee);
        }
    }
}
