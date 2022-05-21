<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            [
                'name' => 'Club Room',
                'description' => 'Maximum Reservation Time:4 hrs
                Must be booked at least:2 Days in advance and no more than 60 Days in advance
                Individual Max Reservations Per Day:3
                Cleaning Fee:$100.00',
                'price' => 100,
            ],
            [
                'name' => 'Guest suite',
                'description' => 'Must be booked at least:5 Days in advance and no more than 60 Days in advance',
                'price' => 150,
            ]
        ];

        foreach ($amenities as $amenity) {

            $amenity['user_id'] = 5;

            $amenity['property_id'] = 1;

            Amenity::factory()->count(5)->create($amenity);
        }
    }
}
